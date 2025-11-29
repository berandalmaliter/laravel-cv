<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::latest()->paginate(10);
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('profiles.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        Profile::create($data);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    public function show(Profile $profile)
    {
        return view('profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $data = $this->validateData($request);
        $profile->update($data);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }

    /**
     * Export PDF dengan desain premium
     */
    public function exportPdf(Profile $profile)
    {
        $pdf = Pdf::loadView('profiles.export_pdf', compact('profile'))->setPaper('A4', 'portrait');

        $fileName = 'CV_' . str_replace(' ', '_', $profile->full_name) . '.pdf';
        return $pdf->download($fileName);
    }

    /**
     * Export Word (docx)
     */
    public function exportWord(Profile $profile)
    {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        // Styling basic premium (judul besar, warna, dsb)
        $titleStyle = ['bold' => true, 'size' => 20];
        $subTitleStyle = ['bold' => true, 'size' => 14];
        $textStyle = ['size' => 11];

        $section->addText($profile->full_name, $titleStyle);
        $section->addText($profile->job_title ?? '', ['italic' => true, 'size' => 12]);
        $section->addTextBreak(1);

        $section->addText('Contact', $subTitleStyle);
        $section->addText($profile->email ?? '', $textStyle);
        $section->addText($profile->phone ?? '', $textStyle);
        $section->addText($profile->address ?? '', $textStyle);
        if ($profile->linkedin) {
            $section->addText('LinkedIn: ' . $profile->linkedin, $textStyle);
        }
        if ($profile->github) {
            $section->addText('GitHub: ' . $profile->github, $textStyle);
        }
        $section->addTextBreak(1);

        if ($profile->summary) {
            $section->addText('Summary', $subTitleStyle);
            $section->addText($profile->summary, $textStyle);
            $section->addTextBreak(1);
        }

        if ($profile->skills) {
            $section->addText('Skills', $subTitleStyle);
            $section->addText($profile->skills, $textStyle);
            $section->addTextBreak(1);
        }

        if ($profile->experience) {
            $section->addText('Experience', $subTitleStyle);
            $section->addText($profile->experience, $textStyle);
            $section->addTextBreak(1);
        }

        if ($profile->education) {
            $section->addText('Education', $subTitleStyle);
            $section->addText($profile->education, $textStyle);
        }

        $fileName = 'CV_' . str_replace(' ', '_', $profile->full_name) . '.docx';
        $tempFile = tempnam(sys_get_temp_dir(), 'word');
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'full_name'  => 'required|string|max:255',
            'job_title'  => 'nullable|string|max:255',
            'summary'    => 'nullable|string',
            'email'      => 'nullable|email|max:255',
            'phone'      => 'nullable|string|max:50',
            'address'    => 'nullable|string|max:255',
            'linkedin'   => 'nullable|string|max:255',
            'github'     => 'nullable|string|max:255',
            'skills'     => 'nullable|string',
            'experience' => 'nullable|string',
            'education'  => 'nullable|string',
        ]);
    }
}
