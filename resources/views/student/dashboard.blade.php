<x-student-dashboard>
    <x-slot:title>Dashboard</x-slot:title>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Book Title</th>
                <th class="px-6 py-3">Borrowed At</th>
                <th class="px-6 py-3">Returned At</th>
                <th class="px-6 py-3">Returned</th>
                <th class="px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($borrowedBooks as $borrow)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{ $borrow->book->title }}</td>
                    <td class="px-6 py-4">{{ $borrow->borrowed_at->format('d M, Y - h:i A') }}</td>
                    <td class="px-6 py-4">{{ $borrow->returned_at?->format('d M, Y - h:i A') ?? '-' }}</td>
                    <td class="px-6 py-4">
                        @if($borrow->returned)
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">Yes</span>
                        @else
                            <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">No</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('student.books.show', [$borrow->book, $borrow]) }}"
                           class="flex items-center gap-x-1 font-medium text-cyan-600 dark:text-cyan-500 hover:underline me-2">
                            Show
                        </a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No borrowed books found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="p-3 bg-gray-700">
            {{ $borrowedBooks->links('pagination::tailwind') }}
        </div>
    </div>
</x-student-dashboard>
