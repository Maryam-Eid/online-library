<x-student-dashboard>
    <x-slot:title>Profile</x-slot:title>
    <div class="mt-10">
        <form action="{{ route('student.profile.update') }}" method="post" class="space-y-8 bg-gray-800 p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
            @csrf
            @method('PUT')
            <section class="border-b border-white/20 pb-8">
                <h2 class="text-2xl font-semibold text-white mb-2">Personal Information</h2>
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-6 mt-8">
                    <div class="sm:col-span-3">
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                        <input id="name" name="name" type="text" autocomplete="name" value="{{ $user->name }}"
                               class="w-full rounded-md bg-gray-700 px-4 py-2 text-white placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                        @error('name')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email address</label>
                        <input id="email" name="email" type="email" autocomplete="email" value="{{ $user->email }}"
                               class="w-full rounded-md bg-gray-700 px-4 py-2 text-white placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                    </div>
                    @error('email')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </section>

            <div class="flex">
                <button type="submit"
                        class="w-full px-5 py-2 rounded-md bg-indigo-600 text-white font-semibold hover:bg-indigo-700
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                       focus:ring-offset-gray-800 transition">
                    Save
                </button>
            </div>
        </form>
    </div>

    <div class="mt-10">
        <form action="{{ route('student.password.update') }}" method="post" class="space-y-8 bg-gray-800 p-8 rounded-lg shadow-lg max-w-3xl mx-auto">
            @csrf
            @method('PUT')
            <section class="border-b border-white/20 pb-8">
                <h2 class="text-2xl font-semibold text-white mb-2">Update Password</h2>
                <div class="grid grid-cols-1 sm:grid-cols-6 gap-6 mt-8">
                    <div class="sm:col-span-3">
                        <label for="current_password" class="block text-sm font-medium text-gray-300 mb-1">Current password</label>
                        <input id="current_password" name="current_password" type="password"
                               class="w-full rounded-md bg-gray-700 px-4 py-2 text-white placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                        @error('current_password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-1">New password</label>
                        <input id="password" name="password" type="password"
                               class="w-full rounded-md bg-gray-700 px-4 py-2 text-white placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                        @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Confirm new password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                               class="w-full rounded-md bg-gray-700 px-4 py-2 text-white placeholder-gray-400
                               focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" />
                        @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </section>

            <div class="flex">
                <button type="submit"
                        class="w-full px-5 py-2 rounded-md bg-indigo-600 text-white font-semibold hover:bg-indigo-700
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2
                       focus:ring-offset-gray-800 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</x-student-dashboard>
