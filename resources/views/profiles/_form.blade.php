@csrf

<div class="grid md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-semibold text-slate-700">Full Name</label>
        <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name ?? '') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        @error('full_name')
            <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700">Job Title</label>
        <input type="text" name="job_title" value="{{ old('job_title', $profile->job_title ?? '') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700">Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700">Address</label>
        <input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700">LinkedIn</label>
        <input type="text" name="linkedin" value="{{ old('linkedin', $profile->linkedin ?? '') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div>
        <label class="block text-sm font-semibold text-slate-700">GitHub</label>
        <input type="text" name="github" value="{{ old('github', $profile->github ?? '') }}"
               class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>
</div>

<div class="mt-4">
    <label class="block text-sm font-semibold text-slate-700">Summary</label>
    <textarea name="summary" rows="3"
              class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('summary', $profile->summary ?? '') }}</textarea>
</div>

<div class="mt-4 grid md:grid-cols-3 gap-4">
    <div>
        <label class="block text-sm font-semibold text-slate-700">Skills</label>
        <textarea name="skills" rows="6"
                  class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                  placeholder="Laravel, PHP, MySQL, JavaScript, ...">{{ old('skills', $profile->skills ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">Experience</label>
        <textarea name="experience" rows="6"
                  class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                  placeholder="Jelaskan pengalaman kerja secara detail">{{ old('experience', $profile->experience ?? '') }}</textarea>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">Education</label>
        <textarea name="education" rows="6"
                  class="mt-1 w-full border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                  placeholder="Riwayat pendidikan">{{ old('education', $profile->education ?? '') }}</textarea>
    </div>
</div>

<div class="mt-6 flex justify-end gap-2">
    <a href="{{ route('profiles.index') }}"
       class="px-4 py-2 rounded-lg border text-sm text-slate-600 hover:bg-slate-100">
        Cancel
    </a>
    <button type="submit"
            class="px-4 py-2 rounded-lg bg-indigo-600 text-white text-sm font-semibold hover:bg-indigo-700">
        Save
    </button>
</div>
