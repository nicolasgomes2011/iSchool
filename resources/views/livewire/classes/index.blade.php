<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Classes</h1>
        <a href="{{ route('classes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Class</a>
    </div>
    <div class="mb-4"><input type="text" wire:model.live="search" placeholder="Search classes..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50"><tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">School</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Teacher</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Grade Level</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr></thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($classes as $class)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $class->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $class->school->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $class->teacher ? $class->teacher->name : 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $class->grade_level }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('classes.edit', $class->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <button wire:click="confirmDelete({{ $class->id }})" x-data @click="$dispatch('open-modal', 'confirm-delete')" class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">No classes found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $classes->links() }}</div>
</div>
