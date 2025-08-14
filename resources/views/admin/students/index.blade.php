<x-admin-dashboard>
    <x-slot:title>All Students</x-slot:title>

    <form class="max-w-md mx-auto" action="{{ route('admin.students.index') }}" method="GET">
        <label for="student_id" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="student_id" name="student_id" value="{{ request('student_id') }}" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500" placeholder="Search by ID" />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Search</button>
        </div>
    </form>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th class="px-6 py-3">Name</th>
                <th class="px-6 py-3">Email</th>
                <th class="px-6 py-3">Borrowed Books</th>
                <th class="px-6 py-3">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($students as $student)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $student->name }}</td>
                    <td class="px-6 py-4">{{ $student->email }}</td>
                    <td class="px-6 py-4">
                    @if($student->borrowedBooks->count())
                            <span class="bg-green-100 text-green-800 text-s font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300"> {{ $student->borrowedBooks->count() }}</span>
                        @else
                            <span class="bg-red-100 text-red-800 text-s font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300"> {{ $student->borrowedBooks->count() }}</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('admin.students.show', $student) }}"
                           class="font-medium text-cyan-600 dark:text-cyan-500 hover:underline flex items-center gap-1">
                            Show
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                        No students found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="p-3 bg-gray-700">
            {{ $students->links('pagination::tailwind') }}
        </div>
    </div>
</x-admin-dashboard>
