<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-5">
                <h1 class="text-xl text-center mb-2">I am </h1>
                    <div class="flex justify-around items-center space-x-3">
                        <label for="job_seeker" class="role_radio text-center py-5 rounded-md bg-blue-100 hover:bg-blue-200 cursor-pointer flex-1">
                            <input type="radio" name="role" value="job_seeker" id="job_seeker" class="mr-2" required>
                            <span>job seeker</span>
                        </label>
                        <label for="recruiter" class="role_radio text-center py-5 rounded-md bg-yellow-100 hover:bg-yellow-200 cursor-pointer flex-1">
                            <input type="radio" name="role" value="recruiter" id="recruiter" class="mr-2" required>
                            <span>recruiter</span>
                        </label>
                    </div>
            </div>
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <!-- DOB -->
            <div class="mt-4">
                <x-label for="date_of_birth" :value="__('Date of birth')" />

                <x-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
            </div>

            <!-- Gender -->
            <div class="mt-4">
                <x-label :value="__('Gender')" />
                <div>
                    <input class="mr-1" type="radio" id="male" name="gender" value="male"><label class="text-sm" for="male">Male</label>
                </div>
                <div>
                    <input class="mr-1" type="radio" id="female" name="gender" value="female"><label class="text-sm" for="female">Female</label>
                </div>
                <div>
                    <input class="mr-1" type="radio" id="other" name="gender" value="other"><label class="text-sm" for="other">Other</label>
                </div>

            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
