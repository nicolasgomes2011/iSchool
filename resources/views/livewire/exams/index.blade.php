<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Exams</h1>
        <a href="{{ route('exams.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Exam</a>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50"><tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Details</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr></thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($exams as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->id }}</td>
                        <td class="px-6 py-4">{{ $item->title ?? $item->grade ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('exams.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Edit</a>
                            <button wire:click="confirmDelete({{ $item->id }})" x-data @click="$dispatch('open-modal', 'confirm-delete')" class="text-red-600 hover:text-red-900">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-6 py-4 text-center text-gray-500">No exams found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $exams->links() }}</div>
</div>
