<x-admin-dashboard>
    <x-slot:title>Show Student</x-slot:title>

    <div class="max-w-lg mx-auto mt-10 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ $student->name }}</h2>

            <p class="text-gray-700 dark:text-gray-300 mb-2 flex items-center">
                <svg class="w-5 h-5 me-1 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6h8m-8 4h12M6 14h8m-8 4h12"/>
                </svg>
                {{ $student->email }}
            </p>

            <p class="text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                <svg class="w-5 h-5 me-1 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                Joined at: {{ $student->created_at->format('M d, Y h:i A') }}
            </p>
        </div>
    </div>
</x-admin-dashboard>
