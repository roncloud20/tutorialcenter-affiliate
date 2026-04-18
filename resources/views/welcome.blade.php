<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | TC Affiliates</title>
    <link rel="icon" type="image/png" href="{{ asset('images/tc-icon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f2f2f2] text-gray-800">

    <div class="min-h-screen flex items-center justify-center px-4 py-10">
        <div class="max-w-6xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2 border border-gray-200">

            <!-- Left Brand Panel -->
            <div class="bg-[#0b3a67] text-white p-10 md:p-14 flex flex-col justify-center">
                <div class="mb-6">
                    <img src="{{ asset('images/tc-logo.png') }}" alt="TC Tutorial Center Logo" class="h-20 mb-6">
                    <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                        Welcome to <span class="text-[#ed1c24]">TC Affiliates</span>
                    </h1>
                </div>

                <p class="text-lg text-gray-100 leading-relaxed mb-8">
                    Join the TC affiliate community and start sharing your referral code with new learners.
                    Help others discover Tutorial Center while growing your rewards.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="w-3 h-3 mt-2 rounded-full bg-[#ed1c24]"></div>
                        <p class="text-base text-gray-100">Get your unique affiliate referral code</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-3 h-3 mt-2 rounded-full bg-[#ed1c24]"></div>
                        <p class="text-base text-gray-100">Invite new users to register through your code</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="w-3 h-3 mt-2 rounded-full bg-[#ed1c24]"></div>
                        <p class="text-base text-gray-100">Track referrals and grow with the TC brand</p>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-white/20">
                    <p class="text-sm uppercase tracking-widest text-gray-200">
                        Empowering Minds. Achieving Excellence.
                    </p>
                </div>
            </div>

            <!-- Right Action Panel -->
            <div class="p-10 md:p-14 flex flex-col justify-center bg-[#f9f9f9]">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-[#0b3a67] mb-3">
                        Start Your Affiliate Journey
                    </h2>
                    <p class="text-[#7a7a7a] text-base leading-relaxed">
                        Become part of the TC affiliate network. Share your code, introduce new users,
                        and represent a brand committed to academic excellence.
                    </p>
                </div>

                <div class="space-y-4">
                    <a href="{{ route('register') }}"
                       class="block w-full text-center bg-[#ed1c24] text-white py-3.5 rounded-xl font-semibold text-lg hover:opacity-90 transition">
                        Become an Affiliate
                    </a>

                    <a href="{{ route('login') }}"
                       class="block w-full text-center border-2 border-[#0b3a67] text-[#0b3a67] py-3.5 rounded-xl font-semibold text-lg hover:bg-[#0b3a67] hover:text-white transition">
                        Login
                    </a>
                </div>

                <div class="mt-8 p-5 rounded-2xl bg-white border border-gray-200 shadow-sm">
                    <h3 class="text-lg font-semibold text-[#0b3a67] mb-2">Why Join TC Affiliates?</h3>
                    <p class="text-[#7a7a7a] text-sm leading-relaxed">
                        Promote a trusted learning brand, encourage educational growth, and build a strong referral network with TC.
                    </p>
                </div>

                <div class="mt-8 flex items-center gap-3">
                    <div class="h-1 w-12 bg-[#0b3a67] rounded"></div>
                    <div class="h-1 w-20 bg-[#ed1c24] rounded"></div>
                    <div class="h-1 flex-1 bg-gray-300 rounded"></div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>