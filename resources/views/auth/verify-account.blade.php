<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Account | TC Affiliates</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-[#f2f2f2] text-gray-800">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-3xl bg-white rounded-3xl shadow-2xl border border-gray-200 overflow-hidden">
            <div class="bg-[#0b3a67] text-white px-8 py-10 text-center">
                <img src="{{ asset('images/tc-logo.png') }}" alt="TC Logo" class="w-28 mx-auto mb-4">
                <h1 class="text-3xl font-extrabold">Verify Your Account</h1>
                <p class="mt-2 text-gray-100">
                    Enter the verification token sent to your email.
                </p>
            </div>

            <div class="p-8 lg:p-10">
                <div id="successMessage" class="hidden mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700"></div>
                <div id="errorMessage" class="hidden mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700"></div>

                <div class="mb-6 rounded-xl bg-[#f9f9f9] border border-gray-200 px-4 py-3">
                    <p class="text-sm text-[#7a7a7a]">Verification email sent to</p>
                    <p class="font-semibold text-[#0b3a67]">{{ request('email') }}</p>
                </div>

                <form id="verifyForm" class="space-y-5">
                    @csrf

                    <div>
                        <label for="token" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                            Verification Token
                        </label>
                        <input type="text" name="token" id="token"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                            placeholder="Enter your token">
                        <p class="text-sm text-red-600 mt-2 error-text" data-error="token"></p>
                    </div>

                    <button type="submit" id="verifyBtn"
                        class="w-full rounded-xl bg-[#ed1c24] py-3.5 text-lg font-semibold text-white hover:opacity-90 transition">
                        Verify Account
                    </button>
                </form>

                <div class="mt-8 border-t border-gray-200 pt-6">
                    <h2 class="text-lg font-bold text-[#0b3a67] mb-2">Didn’t receive the email?</h2>
                    <p class="text-sm text-[#7a7a7a] mb-4">
                        Request a new verification token using your registered email address.
                    </p>

                    <form id="resendForm" class="space-y-4">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                                Email Address
                            </label>
                            <input type="email" name="email" id="email" value="{{ request('email') }}"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                                placeholder="Enter your email">
                            <p class="text-sm text-red-600 mt-2 error-text" data-error="email"></p>
                        </div>

                        <button type="submit" id="resendBtn"
                            class="w-full rounded-xl border border-[#0b3a67] text-[#0b3a67] py-3.5 text-lg font-semibold hover:bg-[#0b3a67] hover:text-white transition">
                            Resend Verification
                        </button>
                    </form>
                </div>

                <p class="mt-6 text-sm text-center text-[#7a7a7a]">
                    Already verified?
                    <a href="{{ route('login') }}" class="font-semibold text-[#0b3a67] hover:underline">Login here</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        function clearErrors() {
            document.querySelectorAll('.error-text').forEach(el => el.textContent = '');
            successMessage.classList.add('hidden');
            errorMessage.classList.add('hidden');
            successMessage.textContent = '';
            errorMessage.textContent = '';
        }

        function showErrors(errors) {
            Object.keys(errors).forEach(key => {
                const field = document.querySelector(`[data-error="${key}"]`);
                if (field) field.textContent = errors[key][0];
            });
        }

        document.getElementById('verifyForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            clearErrors();

            const btn = document.getElementById('verifyBtn');
            btn.disabled = true;
            btn.textContent = 'Verifying...';

            try {
                const response = await fetch(`{{ route('verification.token.verify') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin',
                    body: new FormData(this)
                });

                const data = await response.json();

                if (response.ok) {
                    successMessage.textContent = data.message || 'Account verified successfully.';
                    successMessage.classList.remove('hidden');

                    setTimeout(() => {
                        window.location.href = data.redirect || `{{ route('login') }}`;
                    }, 1200);
                } else if (response.status === 422) {
                    errorMessage.textContent = data.message || 'Validation failed.';
                    errorMessage.classList.remove('hidden');
                    showErrors(data.errors || {});
                } else {
                    errorMessage.textContent = data.message || 'Verification failed.';
                    errorMessage.classList.remove('hidden');
                }
            } catch (error) {
                errorMessage.textContent = 'Unable to verify right now. Please try again.';
                errorMessage.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.textContent = 'Verify Account';
            }
        });

        document.getElementById('resendForm').addEventListener('submit', async function (e) {
            e.preventDefault();
            clearErrors();

            const btn = document.getElementById('resendBtn');
            btn.disabled = true;
            btn.textContent = 'Sending...';

            try {
                const response = await fetch(`{{ route('verification.resend') }}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    credentials: 'same-origin',
                    body: new FormData(this)
                });

                const data = await response.json();

                if (response.ok) {
                    successMessage.textContent = data.message || 'Verification token resent successfully.';
                    successMessage.classList.remove('hidden');
                } else if (response.status === 422) {
                    errorMessage.textContent = data.message || 'Validation failed.';
                    errorMessage.classList.remove('hidden');
                    showErrors(data.errors || {});
                } else {
                    errorMessage.textContent = data.message || 'Unable to resend verification.';
                    errorMessage.classList.remove('hidden');
                }
            } catch (error) {
                errorMessage.textContent = 'Unable to resend verification right now.';
                errorMessage.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.textContent = 'Resend Verification';
            }
        });
    </script>
</body>
</html>