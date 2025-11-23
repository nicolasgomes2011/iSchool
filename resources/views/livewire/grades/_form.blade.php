<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Student *</label>
    <select wire:model="student_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('student_id') border-red-500 @enderror">
        <option value="">Select Student</option>
        @foreach($students as $student)<option value="{{ $student->id }}">{{ $student->name }}</option>@endforeach
    </select>
    @error('student_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Class *</label>
    <select wire:model="class_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('class_id') border-red-500 @enderror">
        <option value="">Select Class</option>
        @foreach($classes as $class)<option value="{{ $class->id }}">{{ $class->name }}</option>@endforeach
    </select>
    @error('class_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Grade *</label>
    <input type="number" step="0.01" wire:model="grade" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('grade') border-red-500 @enderror">
    @error('grade') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Notes</label>
    <textarea wire:model="notes" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"></textarea>
</div>
