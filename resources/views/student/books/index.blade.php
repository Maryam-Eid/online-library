<x-student-dashboard>
    <x-slot:title>All Books</x-slot:title>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Author</th>
                <th class="px-6 py-3">ISBN</th>
                <th class="px-6 py-3">Published Year</th>
                <th class="px-6 py-3">Copies</th>
                <th class="px-6 py-3">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($books as $book)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $book->title }}
                    </th>
                    <td class="px-6 py-4">{{ $book->author }}</td>
                    <td class="px-6 py-4">{{ $book->isbn }}</td>
                    <td class="px-6 py-4">{{ $book->published_year }}</td>
                    <td class="px-6 py-4">
                        <span class="bg-green-100 text-green-800 text-s font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">{{ $book->copies }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('student.books.show', $book) }}" class="font-medium text-cyan-600 dark:text-cyan-500 hover:underline me-2">Show</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No books found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="p-3 bg-gray-700">
            {{ $books->links('pagination::tailwind') }}
        </div>
    </div>
</x-student-dashboard>
