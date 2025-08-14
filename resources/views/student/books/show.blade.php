<x-student-dashboard>
    <x-slot:title>Show Book</x-slot:title>
    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg overflow-hidden">

        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $book->title }}</h2>

            <p class="text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd"/>
                </svg>
                {{ $book->author }}
            </p>

            <p class="text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7H3v12a2 2 0 002 2z" />
                </svg>
                {{ $book->published_year }}
            </p>

            <p class="text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-6-8h6m2 12H7a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v10a2 2 0 01-2 2z" />
                </svg>
                ISBN: {{ $book->isbn }}
            </p>

            <p class="text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                Copies: {{ $book->copies }}
            </p>

            <div class="flex gap-2 mt-4">
                @if($borrowedBook && $borrowedBook->returned_at === null)
                    <form action="{{ route('student.borrowed.return', $borrowedBook) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                                class="w-full py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-md">
                            Return
                        </button>
                    </form>
                @else
                    <form action="{{ route('student.books.borrow', $book) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                                class="w-full py-2.5 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg shadow-md">
                            Borrow
                        </button>
                    </form>
                @endif
            </div>

        </div>
    </div>
</x-student-dashboard>
