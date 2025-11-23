<div>
    <div class="mb-6"><h1 class="text-3xl font-bold text-gray-800">Edit Student</h1></div>
    <div class="bg-white shadow-md rounded-lg p-6">
        <form wire:submit.prevent="update">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">School *</label>
                <select wire:model="school_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('school_id') border-red-500 @enderror">
                    <option value="">Select School</option>
                    @foreach($schools as $school)<option value="{{ $school->id }}">{{ $school->name }}</option>@endforeach
                </select>
                @error('school_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Name *</label>
                <input type="text" wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('name') border-red-500 @enderror">
                @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email *</label>
                <input type="email" wire:model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                <input type="text" wire:model="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Date of Birth</label>
                <input type="date" wire:model="date_of_birth" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Student</button>
                <a href="{{ route('students.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancel</a>
            </div>
        </form>
    </div>
</div>