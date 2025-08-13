<x-admin>
    <x-slot:title>Forgot Password</x-slot:title>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="mx-auto h-20 w-auto"/>
            <h2 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-white">Forgot your password</h2>
            @if (session('success'))
                <div class="mt-2 bg-teal-700 text-sm text-white rounded-lg p-4" role="alert" tabindex="-1">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <p class="mt-5 text-sm/6 text-gray-400">Please enter the email address you'd like your password reset information sent to</p>

            <form action="{{ route('admin.password.email') }}" method="POST" class="space-y-6">
                @csrf

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
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                       Request reset link
                    </button>
                    <a href="{{ route('admin.login') }}"
                       class="mt-2 flex w-full justify-center text-sm/6 font-semibold text-white">
                        Back to Login
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-admin>
