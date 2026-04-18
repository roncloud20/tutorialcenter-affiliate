<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Dashboard | TC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f2f2f2] text-gray-800">

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:w-72 bg-[#0b3a67] text-white flex-col">
            <div class="px-8 py-8 border-b border-white/10">
                <img src="{{ asset('images/tc-logo.png') }}" alt="TC Logo" class="w-32 mb-4">
                <h1 class="text-2xl font-bold">TC Affiliates</h1>
                <p class="text-sm text-gray-200 mt-1">Affiliate Partner Dashboard</p>
            </div>

            <nav class="flex-1 px-6 py-8 space-y-3">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-xl bg-white/10 px-4 py-3 font-medium">
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-gray-200 hover:bg-white/10 transition">
                    <span>Referrals</span>
                </a>
                <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-gray-200 hover:bg-white/10 transition">
                    <span>Earnings</span>
                </a>
                <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-gray-200 hover:bg-white/10 transition">
                    <span>Withdrawals</span>
                </a>
                <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-gray-200 hover:bg-white/10 transition">
                    <span>Profile</span>
                </a>
            </nav>

            <div class="p-6 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-[#ed1c24] py-3 font-semibold text-white hover:opacity-90 transition"
                    >
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1">

            <!-- Topbar -->
            <header class="bg-white border-b border-gray-200 px-6 lg:px-10 py-5 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-[#0b3a67]">Dashboard</h2>
                    <p class="text-sm text-[#7a7a7a]">Welcome back, {{ auth()->user()->firstname }} {{ auth()->user()->surname }}</p>
                </div>

                <div class="text-right">
                    <p class="text-sm text-[#7a7a7a]">Referral Code</p>
                    <p class="text-lg font-bold text-[#ed1c24]">{{ auth()->user()->referral_code }}</p>
                </div>
            </header>

            <div class="p-6 lg:p-10 space-y-8">

                <!-- Welcome Banner -->
                <section class="bg-gradient-to-r from-[#0b3a67] to-[#174d82] rounded-3xl p-8 text-white shadow-lg">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div>
                            <h3 class="text-3xl font-bold mb-2">
                                Hello, {{ auth()->user()->firstname }}
                            </h3>
                            <p class="text-gray-100 max-w-2xl">
                                Manage your affiliate account, monitor your growth, track your referral performance, and request withdrawals from one place.
                            </p>
                        </div>

                        <div class="bg-white/10 rounded-2xl px-6 py-4 min-w-[220px]">
                            <p class="text-sm text-gray-200 mb-1">Your Referral Code</p>
                            <p class="text-2xl font-extrabold tracking-wide text-[#ed1c24]">
                                {{ auth()->user()->referral_code }}
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Stats -->
                <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <p class="text-sm text-[#7a7a7a] mb-2">Total Referrals</p>
                        <h3 class="text-3xl font-bold text-[#0b3a67]">{{ $totalReferrals ?? 0 }}</h3>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <p class="text-sm text-[#7a7a7a] mb-2">Account Growth</p>
                        <h3 class="text-3xl font-bold text-[#0b3a67]">{{ $accountGrowth ?? '0%' }}</h3>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <p class="text-sm text-[#7a7a7a] mb-2">Available Balance</p>
                        <h3 class="text-3xl font-bold text-[#0b3a67]">₦{{ number_format($availableBalance ?? 0, 2) }}</h3>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <p class="text-sm text-[#7a7a7a] mb-2">Total Withdrawn</p>
                        <h3 class="text-3xl font-bold text-[#0b3a67]">₦{{ number_format($totalWithdrawn ?? 0, 2) }}</h3>
                    </div>
                </section>

                <!-- Main Grid -->
                <section class="grid grid-cols-1 xl:grid-cols-3 gap-6">

                    <!-- Referral Summary -->
                    <div class="xl:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h3 class="text-xl font-bold text-[#0b3a67]">Referral Performance</h3>
                                <p class="text-sm text-[#7a7a7a]">Overview of your affiliate activity</p>
                            </div>
                        </div>

                        <div class="grid sm:grid-cols-3 gap-4">
                            <div class="rounded-2xl bg-[#f2f6fb] p-5">
                                <p class="text-sm text-[#7a7a7a]">Clicks</p>
                                <h4 class="text-2xl font-bold text-[#0b3a67] mt-2">{{ $totalClicks ?? 0 }}</h4>
                            </div>

                            <div class="rounded-2xl bg-[#fff4f4] p-5">
                                <p class="text-sm text-[#7a7a7a]">Conversions</p>
                                <h4 class="text-2xl font-bold text-[#ed1c24] mt-2">{{ $totalConversions ?? 0 }}</h4>
                            </div>

                            <div class="rounded-2xl bg-[#f7f7f7] p-5">
                                <p class="text-sm text-[#7a7a7a]">Conversion Rate</p>
                                <h4 class="text-2xl font-bold text-[#0b3a67] mt-2">{{ $conversionRate ?? '0%' }}</h4>
                            </div>
                        </div>

                        <div class="mt-6">
                            <h4 class="text-lg font-semibold text-[#0b3a67] mb-3">Recent Referral Activity</h4>

                            <div class="overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead>
                                        <tr class="border-b border-gray-200 text-left text-[#7a7a7a]">
                                            <th class="py-3 pr-4">Name</th>
                                            <th class="py-3 pr-4">Email</th>
                                            <th class="py-3 pr-4">Status</th>
                                            <th class="py-3">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentReferrals ?? [] as $referral)
                                            <tr class="border-b border-gray-100">
                                                <td class="py-4 pr-4 font-medium">
                                                    {{ $referral->name ?? ($referral->firstname . ' ' . $referral->surname) }}
                                                </td>
                                                <td class="py-4 pr-4 text-[#7a7a7a]">{{ $referral->email }}</td>
                                                <td class="py-4 pr-4">
                                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold
                                                        {{ ($referral->status ?? '') === 'completed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                                        {{ ucfirst($referral->status ?? 'pending') }}
                                                    </span>
                                                </td>
                                                <td class="py-4 text-[#7a7a7a]">
                                                    {{ isset($referral->created_at) ? $referral->created_at->format('d M, Y') : '-' }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="py-6 text-center text-[#7a7a7a]">
                                                    No referral activity yet.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Withdrawal Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <h3 class="text-xl font-bold text-[#0b3a67] mb-2">Withdraw Funds</h3>
                        <p class="text-sm text-[#7a7a7a] mb-6">
                            Request a withdrawal from your available affiliate earnings.
                        </p>

                        <div class="rounded-2xl bg-[#f9f9f9] p-5 mb-6 border border-gray-200">
                            <p class="text-sm text-[#7a7a7a] mb-1">Available Balance</p>
                            <p class="text-3xl font-extrabold text-[#ed1c24]">
                                ₦{{ number_format($availableBalance ?? 0, 2) }}
                            </p>
                        </div>

                        <form action="{{ route('withdraw.store') }}" method="POST" class="space-y-4">
                            @csrf

                            <div>
                                <label for="amount" class="block text-sm font-semibold text-[#0b3a67] mb-2">
                                    Amount
                                </label>
                                <input
                                    type="number"
                                    name="amount"
                                    id="amount"
                                    min="0"
                                    step="0.01"
                                    class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#0b3a67]"
                                    placeholder="Enter amount"
                                >
                            </div>

                            <button
                                type="submit"
                                class="w-full rounded-xl bg-[#ed1c24] py-3 font-semibold text-white hover:opacity-90 transition"
                            >
                                Request Withdrawal
                            </button>
                        </form>

                        <div class="mt-6">
                            <h4 class="text-base font-semibold text-[#0b3a67] mb-3">Last Withdrawals</h4>
                            <div class="space-y-3">
                                @forelse($recentWithdrawals ?? [] as $withdrawal)
                                    <div class="flex items-center justify-between rounded-xl bg-[#f9f9f9] px-4 py-3 border border-gray-200">
                                        <div>
                                            <p class="font-medium text-[#0b3a67]">₦{{ number_format($withdrawal->amount, 2) }}</p>
                                            <p class="text-xs text-[#7a7a7a]">{{ $withdrawal->created_at->format('d M, Y') }}</p>
                                        </div>
                                        <span class="text-xs font-semibold px-3 py-1 rounded-full
                                            {{ $withdrawal->status === 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ ucfirst($withdrawal->status) }}
                                        </span>
                                    </div>
                                @empty
                                    <p class="text-sm text-[#7a7a7a]">No withdrawals yet.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>

</body>
</html>