<x-admin-dashboard>
    <x-slot:title>Borrowed Books</x-slot:title>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Book Title</th>
                <th class="px-6 py-3">Student Name</th>
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
                    <td class="px-6 py-4">{{ $borrow->student->name }}</td>
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
                        <a href="{{ route('admin.books.show', $borrow->book) }}"
                           class="flex items-center gap-x-1 font-medium text-cyan-600 dark:text-cyan-500 hover:underline me-2">
                            <svg class="w-5 h-5 text-cyan-800 dark:text-cyan-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z" clip-rule="evenodd"/>
                            </svg>
                            Show book
                        </a>

                        <a href="{{ route('admin.students.show', $borrow->student) }}"
                           class="mt-1 flex items-center gap-x-1 font-medium text-violet-600 dark:text-violet-500 hover:underline">
                            <svg class="w-5 h-5 text-violet-800 dark:text-violet-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                            </svg>
                            Show student
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
</x-admin-dashboard>
