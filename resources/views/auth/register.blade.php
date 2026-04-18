<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Signup | TC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @csrf
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-[#f2f2f2] text-gray-800">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div
            class="w-full max-w-6xl grid lg:grid-cols-2 bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200">

            <div class="bg-[#0b3a67] text-white p-10 lg:p-14 flex flex-col justify-center">
                <img src="{{ asset('images/tc-logo.png') }}" alt="TC Logo" class="w-40 mb-8">

                <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight mb-4">
                    Join <span class="text-[#ed1c24]">TC Affiliates</span>
                </h1>

                <p class="text-lg leading-relaxed text-gray-100 mb-8">
                    Register as a TC affiliate, create your personal referral code, track your growth, and manage your
                    earnings from one place.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="mt-2 w-3 h-3 rounded-full bg-[#ed1c24]"></span>
                        <p>Create your affiliate account</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="mt-2 w-3 h-3 rounded-full bg-[#ed1c24]"></span>
                        <p>Choose your own referral code</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="mt-2 w-3 h-3 rounded-full bg-[#ed1c24]"></span>
                        <p>Track your account growth</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="mt-2 w-3 h-3 rounded-full bg-[#ed1c24]"></span>
                        <p>Withdraw your funds easily</p>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-white/20">
                    <p class="text-sm uppercase tracking-widest text-gray-200">
                        Empowering Minds. Achieving Excellence.
                    </p>
                </div>
            </div>

            <div class="p-8 lg:p-14 bg-white">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-[#0b3a67] mb-2">Create Affiliate Account</h2>
                    <p class="text-[#7a7a7a]">
                        Fill in your details below to join the TC affiliate platform.
                    </p>
                </div>

                <div id="successMessage"
                    class="hidden mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700"></div>
                <div id="errorMessage"
                    class="hidden mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700"></div>

                <form id="registerForm" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label for="firstname" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                                First Name
                            </label>
                            <input type="text" name="firstname" id="firstname"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                                placeholder="Enter your first name">
                            <p class="text-sm text-red-600 mt-2 error-text" data-error="firstname"></p>
                        </div>

                        <div>
                            <label for="surname" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                                Surname
                            </label>
                            <input type="text" name="surname" id="surname"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                                placeholder="Enter your surname">
                            <p class="text-sm text-red-600 mt-2 error-text" data-error="surname"></p>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                            Email Address
                        </label>
                        <input type="email" name="email" id="email"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                            placeholder="Enter your email">
                        <p class="text-sm text-red-600 mt-2 error-text" data-error="email"></p>
                    </div>

                    <div>
                        <label for="phone_number" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                            Phone Number
                        </label>
                        <input type="text" name="phone_number" id="phone_number" maxlength="11"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                            placeholder="Enter 11-digit phone number">
                        <p class="mt-2 text-sm text-[#7a7a7a]">
                            Optional. Must be exactly 11 digits.
                        </p>
                        <p class="text-sm text-red-600 mt-2 error-text" data-error="phone_number"></p>
                    </div>

                    <div>
                        <label for="referral_code" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                            Referral Code
                        </label>
                        <input type="text" name="referral_code" id="referral_code"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                            placeholder="Create your referral code">
                        <p class="mt-2 text-sm text-[#7a7a7a]">
                            Choose a unique referral code. If it already exists, you will be asked to use another one.
                        </p>
                        <p class="text-sm text-red-600 mt-2 error-text" data-error="referral_code"></p>
                    </div>

                    <div>
                        <label for="profile_picture" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                            Profile Picture
                        </label>
                        <input type="file" name="profile_picture" id="profile_picture" accept=".jpg,.jpeg,.png,.gif"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white focus:outline-none focus:ring-2 focus:ring-[#0b3a67]">
                        <p class="mt-2 text-sm text-[#7a7a7a]">
                            Optional. Accepted formats: jpeg, png, jpg, gif. Maximum size: 2MB.
                        </p>
                        <p class="text-sm text-red-600 mt-2 error-text" data-error="profile_picture"></p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <input type="password" name="password" id="password"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                                    placeholder="Enter password">
                                <button type="button" id="togglePassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-sm text-red-600 mt-2 error-text" data-error="password"></p>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3 pr-12 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                                    placeholder="Confirm password">
                                <button type="button" id="toggleConfirmPassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="role" value="affiliate">

                    <button type="submit" id="submitBtn"
                        class="w-full rounded-xl bg-[#ed1c24] py-3.5 text-lg font-semibold text-white hover:opacity-90 transition">
                        Create Affiliate Account
                    </button>

                    <p class="text-sm text-center text-[#7a7a7a]">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-semibold text-[#0b3a67] hover:underline">
                            Login here
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        const registerForm = document.getElementById('registerForm');
        const submitBtn = document.getElementById('submitBtn');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        function clearErrors() {
            document.querySelectorAll('.error-text').forEach(el => el.textContent = '');
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
            errorMessage.textContent = '';
        }

        function showErrors(errors) {
            Object.keys(errors).forEach(key => {
                const errorField = document.querySelector(`[data-error="${key}"]`);
                if (errorField) {
                    errorField.textContent = errors[key][0];
                }
            });
        }

        registerForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            clearErrors();

            submitBtn.disabled = true;
            submitBtn.textContent = 'Creating Account...';

            const formData = new FormData(registerForm);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            try {
                const response = await fetch(`{{ route('register.store') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();

                if (response.status === 201) {
                    successMessage.textContent = data.message || 'Account created successfully.';
                    successMessage.classList.remove('hidden');
                    registerForm.reset();
                } else if (response.status === 422) {
                    errorMessage.textContent = data.message || 'Validation failed.';
                    errorMessage.classList.remove('hidden');
                    showErrors(data.errors || {});
                } else {
                    errorMessage.textContent = data.message || data.error || 'Something went wrong.';
                    errorMessage.classList.remove('hidden');
                }
            } catch (error) {
                errorMessage.textContent = 'Unable to submit the form right now. Please try again.';
                errorMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Create Affiliate Account';
            }
        });

        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordInput = document.getElementById('password_confirmation');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ?
                `<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>` :
                `<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                </svg>`;
        });

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ?
                `<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>` :
                `<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                </svg>`;
        });
    </script>

    <!-- <script>
        const registerForm = document.getElementById('registerForm');
        const submitBtn = document.getElementById('submitBtn');
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        function clearErrors() {
            document.querySelectorAll('.error-text').forEach(el => el.textContent = '');
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
            errorMessage.textContent = '';
        }

        function showErrors(errors) {
            Object.keys(errors).forEach(key => {
                const errorField = document.querySelector(`[data-error="${key}"]`);
                if (errorField) {
                    errorField.textContent = errors[key][0];
                }
            });
        }

        registerForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            clearErrors();

            submitBtn.disabled = true;
            submitBtn.textContent = 'Creating Account...';

            const formData = new FormData(registerForm);

            try {
                // const response = await fetch(`{{ route('register') }}`, {
                //     method: 'POST',
                //         headers: {
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                //             'Accept': 'application/json',
                //         },
                //     body: formData
                // });

                const response = await fetch(`{{ route('register.store') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.status === 201) {
                    successMessage.textContent = data.message || 'Account created successfully.';
                    successMessage.classList.remove('hidden');
                    registerForm.reset();
                } else if (response.status === 422) {
                    errorMessage.textContent = data.message || 'Validation failed.';
                    errorMessage.classList.remove('hidden');
                    showErrors(data.errors || {});
                } else {
                    errorMessage.textContent = data.message || data.error || 'Something went wrong.';
                    errorMessage.classList.remove('hidden');
                }
            } catch (error) {
                errorMessage.textContent = 'Unable to submit the form right now. Please try again.';
                errorMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Create Affiliate Account';
            }
        });

        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordInput = document.getElementById('password_confirmation');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ?
                `<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>` :
                `<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                </svg>`;
        });

        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ?
                `<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>` :
                `<svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21" />
                </svg>`;
        });
    </script> -->

</body>

</html>