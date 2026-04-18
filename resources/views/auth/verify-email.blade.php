<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification | TC</title>
    <link rel="icon" type="image/png" href="{{ asset('images/tc-icon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-[#f2f2f2] text-gray-800">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="w-full max-w-2xl bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200">

            <div class="bg-[#0b3a67] text-white p-10 text-center">
                <img src="{{ asset('images/tc-logo.png') }}" alt="TC Logo" class="w-32 mx-auto mb-6">
                <h1 class="text-3xl font-bold mb-2">Verify Your Email</h1>
                <p class="text-gray-200">Please check your email and click the verification link to complete your registration.</p>
            </div>

            <div class="p-8 text-center">
                <div class="mb-6">
                    <svg class="w-16 h-16 text-[#0b3a67] mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <h2 class="text-2xl font-semibold text-[#0b3a67] mb-2">Check Your Email</h2>
                    <p class="text-gray-600 mb-4">
                        We've sent a verification link to <strong>{{ auth()->user()->email }}</strong>
                    </p>
                    <p class="text-sm text-gray-500 mb-6">
                        If you don't see the email, check your spam folder or click the button below to resend.
                    </p>
                </div>

                <form method="POST" action="{{ route('verification.send') }}" class="inline-block">
                    @csrf
                    <button
                        type="submit"
                        class="bg-[#0b3a67] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#0a2d55] transition duration-200"
                    >
                        Resend Verification Email
                    </button>
                </form>

                <div class="mt-6">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="text-[#0b3a67] hover:underline text-sm">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>

                @if (session('success'))
                    <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-xl">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('resent'))
                    <div class="mt-4 p-4 bg-blue-100 border border-blue-400 text-blue-700 rounded-xl">
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif
            </div>
        </div>
    </div>

</body>
</html>