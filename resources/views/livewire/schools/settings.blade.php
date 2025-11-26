<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">School Settings</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label for="theme" class="block text-gray-700 text-sm font-bold mb-2">Theme</label>
                <input type="text" wire:model="settings.theme" id="theme" placeholder="e.g., blue, green" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="timezone" class="block text-gray-700 text-sm font-bold mb-2">Timezone</label>
                <input type="text" wire:model="settings.timezone" id="timezone" placeholder="e.g., UTC, America/New_York" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="language" class="block text-gray-700 text-sm font-bold mb-2">Language</label>
                <input type="text" wire:model="settings.language" id="language" placeholder="e.g., en, pt" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="academic_year" class="block text-gray-700 text-sm font-bold mb-2">Academic Year</label>
                <input type="text" wire:model="settings.academic_year" id="academic_year" placeholder="e.g., 2023-2024" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Save Settings
                </button>
                <a href="{{ route('schools.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
