<x-guest-layout>

    <div class="grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
        <div class="xl:block lg:block md:block sm:hidden">
            <img alt="img" src="{{ asset('assets/images/login.png') }}" class="w-full" />
        </div>
        <div class="flex px-6 items-center">
            <main class="border border-line-base rounded px-8 py-6 w-full">
                <h3 class="font-semibold text-[28px] font-body text-word-title">SIGN IN</h3>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('login') }}" class="mt-5 grid grid-cols-6 gap-3">
                    @csrf
                    <div class="col-span-6 sm:col-span-3">
                        <a href="#" class="flex justify-center items-center gap-1 border border-line-base rounded-lg h-[40px]">
                            <img src="{{ asset('assets/images/google.png') }}" alt="google">
                            <span class="text-paragraph">Sign in with Google</span>
                        </a>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <a href="#" class="flex justify-center items-center gap-2 border border-line-base rounded-lg h-[40px]">
                            <img src="{{ asset('assets/images/fb.png') }}" alt="facebook">
                            <span class="text-paragraph">Sign in with Facebook</span>
                        </a>
                    </div>

                    <p class="col-span-6 text-paragraph text-center w-full">
                        <span>Or Email</span>
                    </p>

                    <div class="col-span-6">
                        <div class="col-span-6">
                            <x-forms.text-input-icon type="email" name="email" placeholder="Email Address" :value="old('email')" dir="start">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_1_4773)">
                                        <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M22 6L12 13L2 6" stroke="#666666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1_4773">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </x-forms.text-input-icon>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-forms.password type="password" id="passTypeChange" name="password" placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="col-span-6 flex justify-between">
                        <p class="flex gap-2">
                            <x-forms.checkbox-input name="remember" />
                            <span class="text-paragraph">
                                {{ __('Remember me') }}
                            </span>
                        </p>
                        <p class="flex">
                            <span class="text-paragraph">
                                <a href="{{ route('password.request') }}">{{ __('Forget Password ?') }}</a>
                            </span>
                        </p>
                    </div>

                    <div class="col-span-6 mt-2">
                        <x-buttons.primary class="w-full">
                            SIGN IN
                        </x-buttons.primary>
                    </div>

                    <div class="col-span-6">
                        <p class="text-paragraph sm:mt-0">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-primary-400 font-bold">Sign Up</a>
                        </p>
                    </div>
                </form>
            </main>
        </div>
    </div>
</x-guest-layout>
