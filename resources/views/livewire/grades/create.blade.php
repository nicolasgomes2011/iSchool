<div>
    <div class="mb-6"><h1 class="text-3xl font-bold text-gray-800">Create Grade</h1></div>
    <div class="bg-white shadow-md rounded-lg p-6">
        <form wire:submit.prevent="save">
            @include('livewire.grades._form')
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                <a href="{{ route('grades.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancel</a>
            </div>
        </form>
    </div>
</div>
