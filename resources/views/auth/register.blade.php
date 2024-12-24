<x-guest-layout>

    <div class="grid xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
        <div class="xl:block lg:block md:block sm:hidden">
            <img alt="img" src="{{ asset('assets/images/login.png') }}" class="w-full" />
        </div>
        <div class="flex px-6 items-center">
            <main class="border border-line-base rounded px-8 py-6 w-full">
                <h3 class="font-semibold text-[28px] font-body text-word-title">SIGN UP</h3>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <form method="POST" action="{{ route('register') }}" class="mt-5 grid grid-cols-6 gap-3">
                    @csrf
                    <div class="col-span-6 sm:col-span-3">
                        <a href="#" class="flex justify-center items-center gap-1 border border-line-base rounded-lg h-[40px]">
                            <img src="{{ asset('assets/images/google.png') }}" alt="google">
                            <span class="text-paragraph">Sign up with Google</span>
                        </a>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <a href="#" class="flex justify-center items-center gap-2 border border-line-base rounded-lg h-[40px]">
                            <img src="{{ asset('assets/images/fb.png') }}" alt="facebook">
                            <span class="text-paragraph">Sign up with Facebook</span>
                        </a>
                    </div>

                    <p class="col-span-6 text-paragraph text-center w-full">
                        <span>Or Email</span>
                    </p>

                    <div class="col-span-6">
                        <x-forms.text-input-icon type="text" name="name" placeholder="User Name" dir="start">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z" stroke="#5C5C5C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" stroke="#5C5C5C" stroke-width="1.5" />
                            </svg>
                        </x-forms.text-input-icon>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-forms.text-input-icon type="email" name="email" placeholder="Email Address" dir="start">
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
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-forms.password type="password" id="passTypeChange" name="password" placeholder="Password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <x-forms.confirm-password type="password" id="passTypeChangeConfirm" name="password_confirmation" placeholder="Confirm Password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="col-span-6">
                        <div class="custom-select-wrapper">
                            <div class="custom-select">
                                <div class="custom-select-trigger">
                                    <input id="valueContent" name="role" type="text" hidden />
                                    <span class="text-paragraph">Select User Type</span>
                                    <svg
                                        class="hover-svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6 9L12 15L18 9"
                                            stroke="#5C5C5C"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <ul class="custom-options">
                                    <li class="custom-option" data-value="1">
                                        <div>
                                            <svg
                                                class="icon"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12.5 22H6.59087C5.04549 22 3.81631 21.248 2.71266 20.1966C0.453366 18.0441 4.1628 16.324 5.57757 15.4816C7.67837 14.2307 10.1368 13.7719 12.5 14.1052C13.3575 14.2261 14.1926 14.4514 15 14.7809"
                                                    class="path"
                                                    stroke="#5C5C5C"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"
                                                    class="path"
                                                    stroke="#5C5C5C"
                                                    stroke-width="1.5" />
                                                <path
                                                    d="M18.5 22V15M15 18.5H22"
                                                    class="path"
                                                    stroke="#5C5C5C"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round" />
                                            </svg>
                                        </div>
                                        <div>Organizer</div>
                                    </li>
                                    <li class="custom-option" data-value="2">
                                        <div>
                                            <svg
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M14 18C14 18 15 18 16 20C16 20 19.1765 15 22 14"
                                                    class="path"
                                                    stroke="#5C5C5C"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M13 22H6.59087C5.04549 22 3.81631 21.248 2.71266 20.1966C0.453366 18.0441 4.1628 16.324 5.57757 15.4816C8.75591 13.5891 12.7529 13.5096 16 15.2432"
                                                    class="path"
                                                    stroke="#5C5C5C"
                                                    stroke-width="1.5"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"
                                                    class="path"
                                                    stroke="#5C5C5C"
                                                    stroke-width="1.5" />
                                            </svg>
                                        </div>
                                        <div>Attendee</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-6 flex justify-between">
                        <p class="flex gap-2">
                            <x-forms.checkbox-input name="remember" />
                            <span class="text-paragraph">
                                {{ __('I accept terms and conditions') }}
                            </span>
                        </p>
                    </div>

                    <div class="col-span-6">
                        <x-buttons.primary class="w-full">
                            SIGN UP
                        </x-buttons.primary>
                    </div>

                    <div class="col-span-6">
                        <p class="mt-4 text-paragraph sm:mt-0">
                            {{ __('Already have an account ?') }}
                            <a href="{{ route('login') }}" class="text-primary-400 font-bold">Sign In</a>
                        </p>
                    </div>
                </form>
            </main>
        </div>
    </div>

    @push('script')
    <script>
        const valueContent = document.querySelector('#valueContent');

        document.querySelectorAll('.custom-select').forEach((select) => {
            const trigger = select.querySelector('.custom-select-trigger');
            const options = select.querySelectorAll('.custom-option');

            trigger.addEventListener('click', () => {
                select.classList.toggle('open');
            });


            options.forEach((option) => {
                option.addEventListener('click', () => {
                    const value = option.getAttribute('data-value');
                    const text = option.textContent;
                    valueContent.value = value;
                    trigger.querySelector('span').textContent = text;
                    select.classList.remove('open');

                    // Optionally trigger a custom event
                    select.dispatchEvent(new CustomEvent('change', {
                        detail: {
                            value
                        }
                    }));
                });
            });
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.custom-select')) {
                document.querySelectorAll('.custom-select').forEach((select) => {
                    select.classList.remove('open');
                });
            }
        });
    </script>
    @endpush

    @push('css')
    <style>
        .custom-select-wrapper {
            position: relative;
            width: 430px;
            height: 40px;
        }

        .custom-select {
            position: relative;
            user-select: none;
            cursor: pointer;
        }

        .custom-select-trigger {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            height: 40px;
            padding: 0 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .custom-select-trigger .arrow {
            border: solid #333;
            border-width: 0 2px 2px 0;
            display: inline-block;
            padding: 5px;
            transform: rotate(45deg);
        }

        .custom-options {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fff;
            border-radius: 4px;
            z-index: 10;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .custom-option {
            display: flex;
            gap: 8px;
            align-items: center;
            padding: 4px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .custom-option:last-child {
            border-bottom: none;
        }

        .custom-option:hover {
            background: #fff;
            color: #6D4DFF;
        }

        .custom-select.open .custom-options {
            display: block;
        }

        .custom-option .path {
            stroke: #5C5C5C;
            transition: stroke 0.3s ease;
        }

        .custom-option:hover .path {
            stroke: #6D4DFF;
        }
    </style>
    @endpush
</x-guest-layout>