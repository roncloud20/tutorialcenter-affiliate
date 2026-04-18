<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Login | TC</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-[#f2f2f2] text-gray-800">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-6xl grid lg:grid-cols-2 bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200">

            <div class="bg-[#0b3a67] text-white p-10 lg:p-14 flex flex-col justify-center">
                <img src="{{ asset('images/tc-logo.png') }}" alt="TC Logo" class="w-40 mb-8">

                <h1 class="text-4xl lg:text-5xl font-extrabold leading-tight mb-4">
                    Welcome Back to <span class="text-[#ed1c24]">TC Affiliates</span>
                </h1>

                <p class="text-lg leading-relaxed text-gray-100 mb-8">
                    Sign in to monitor your affiliate growth, review performance, and manage your earnings from your dashboard.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <span class="mt-2 w-3 h-3 rounded-full bg-[#ed1c24]"></span>
                        <p>Track your affiliate account growth</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="mt-2 w-3 h-3 rounded-full bg-[#ed1c24]"></span>
                        <p>Review your earnings and activity</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="mt-2 w-3 h-3 rounded-full bg-[#ed1c24]"></span>
                        <p>Manage withdrawals from your dashboard</p>
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
                    <h2 class="text-3xl font-bold text-[#0b3a67] mb-2">Sign In</h2>
                    <p class="text-[#7a7a7a]">
                        Enter your login details to access your affiliate account.
                    </p>
                </div>

                <div id="successMessage" class="hidden mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700"></div>
                <div id="errorMessage" class="hidden mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700"></div>

                <form id="loginForm" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                            Email Address
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                            placeholder="Enter your email"
                        >
                        <p class="text-sm text-red-600 mt-2 error-text" data-error="email"></p>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                            Password
                        </label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                            placeholder="Enter your password"
                        >
                        <p class="text-sm text-red-600 mt-2 error-text" data-error="password"></p>
                    </div>

                    <div class="flex items-center justify-between gap-4">
                        <label class="inline-flex items-center gap-2 text-sm text-[#7a7a7a]">
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                class="rounded border-gray-300 text-[#0b3a67] focus:ring-[#0b3a67]"
                            >
                            <span>Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-semibold text-[#0b3a67] hover:underline">
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <button
                        type="submit"
                        id="submitBtn"
                        class="w-full rounded-xl bg-[#ed1c24] py-3.5 text-lg font-semibold text-white hover:opacity-90 transition"
                    >
                        Sign In
                    </button>

                    <p class="text-sm text-center text-[#7a7a7a]">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="font-semibold text-[#0b3a67] hover:underline">
                            Create one here
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        const loginForm = document.getElementById('loginForm');
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

        loginForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            clearErrors();

            submitBtn.disabled = true;
            submitBtn.textContent = 'Signing In...';

            const formData = new FormData(loginForm);

            try {
                const response = await fetch(`{{ route('login.store') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin',
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    successMessage.textContent = data.message || 'Login successful.';
                    successMessage.classList.remove('hidden');

                    setTimeout(() => {
                        window.location.href = data.redirect || `{{ route('dashboard') }}`;
                    }, 800);
                } else if (response.status === 422) {
                    errorMessage.textContent = data.message || 'Validation failed.';
                    errorMessage.classList.remove('hidden');
                    showErrors(data.errors || {});
                } else if (response.status === 401) {
                    errorMessage.textContent = data.message || 'Invalid login credentials.';
                    errorMessage.classList.remove('hidden');
                } else {
                    errorMessage.textContent = data.message || 'Something went wrong.';
                    errorMessage.classList.remove('hidden');
                }
            } catch (error) {
                errorMessage.textContent = 'Unable to login right now. Please try again.';
                errorMessage.classList.remove('hidden');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Sign In';
            }
        });
    </script>

</body>
</html>