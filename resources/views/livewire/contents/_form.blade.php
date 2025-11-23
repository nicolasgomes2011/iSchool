<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Class *</label>
    <select wire:model="class_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('class_id') border-red-500 @enderror">
        <option value="">Select Class</option>
        @foreach($classes as $class)<option value="{{ $class->id }}">{{ $class->name }}</option>@endforeach
    </select>
    @error('class_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Title *</label>
    <input type="text" wire:model="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('title') border-red-500 @enderror">
    @error('title') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Description</label>
    <textarea wire:model="description" rows="2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"></textarea>
</div>
<div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Body</label>
    <textarea wire:model="body" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700"></textarea>
</div>
