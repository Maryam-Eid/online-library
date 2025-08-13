<x-student>
    <x-slot:title>Register</x-slot:title>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="mx-auto h-20 w-auto"/>
            <h2 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-white">Register new account</h2>
        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ route('student.register') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm/6 font-medium text-gray-100">Name</label>
                    <div class="mt-2">
                        <input value="{{ old('name') }}" id="name" type="text" name="name" required
                               autocomplete="name"
                               class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"/>
                    </div>
                    @error('name')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
                    <div class="mt-2">
                        <input value="{{ old('email') }}" id="email" type="email" name="email" required
                               autocomplete="email"
                               class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"/>
                    </div>
                    @error('email')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" type="password" name="password" required
                               class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"/>
                    </div>
                    @error('password')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-100">Password confirmation</label>
                    </div>
                    <div class="mt-2">
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"/>
                    </div>
                    @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-student>
