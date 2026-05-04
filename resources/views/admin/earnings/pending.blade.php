<x-dashboard-layout title="Pending Earnings">

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#0b3a67] dark:text-white">
            Pending Earnings
        </h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-slate-400">
            Review affiliate earnings and approve or decline them.
        </p>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <div class="rounded-2xl border border-gray-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900 sm:p-6">

        <div class="space-y-4 md:hidden">
            @forelse($earnings as $earning)
                <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4 dark:border-slate-800 dark:bg-slate-950">
                    <p class="font-bold text-[#0b3a67] dark:text-white">
                        {{ $earning->user->firstname ?? '' }} {{ $earning->user->surname ?? '' }}
                    </p>

                    <p class="mt-1 text-sm text-gray-500 dark:text-slate-400">
                        Referral: {{ $earning->referral->name ?? 'N/A' }}
                    </p>

                    <p class="mt-3 text-2xl font-extrabold text-[#ed1c24]">
                        ₦{{ number_format($earning->amount, 2) }}
                    </p>

                    <p class="mt-2 text-sm text-gray-500 dark:text-slate-400">
                        {{ $earning->description ?? '-' }}
                    </p>

                    <div class="mt-4 flex gap-3">
                        <form method="POST" action="{{ route('admin.earnings.approve', $earning) }}" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button class="w-full rounded-xl bg-green-600 px-4 py-3 text-sm font-semibold text-white">
                                Approve
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.earnings.decline', $earning) }}" class="flex-1">
                            @csrf
                            @method('PATCH')
                            <button class="w-full rounded-xl bg-red-600 px-4 py-3 text-sm font-semibold text-white">
                                Decline
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="py-8 text-center text-sm text-gray-500 dark:text-slate-400">
                    No pending earnings.
                </p>
            @endforelse
        </div>

        <div class="hidden overflow-x-auto md:block">
            <table class="w-full min-w-[70rem] text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-200 text-gray-500 dark:border-slate-800 dark:text-slate-400">
                        <th class="py-3 pr-4">Affiliate</th>
                        <th class="py-3 pr-4">Referral</th>
                        <th class="py-3 pr-4">Amount</th>
                        <th class="py-3 pr-4">Description</th>
                        <th class="py-3 pr-4">Date</th>
                        <th class="py-3">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($earnings as $earning)
                        <tr class="border-b border-gray-100 dark:border-slate-800">
                            <td class="py-4 pr-4 font-medium text-[#0b3a67] dark:text-white">
                                {{ $earning->user->firstname ?? '' }} {{ $earning->user->surname ?? '' }}
                            </td>

                            <td class="py-4 pr-4 text-gray-500 dark:text-slate-400">
                                {{ $earning->referral->name ?? 'N/A' }}
                            </td>

                            <td class="py-4 pr-4 font-bold text-[#ed1c24]">
                                ₦{{ number_format($earning->amount, 2) }}
                            </td>

                            <td class="py-4 pr-4 text-gray-500 dark:text-slate-400">
                                {{ $earning->description ?? '-' }}
                            </td>

                            <td class="py-4 pr-4 text-gray-500 dark:text-slate-400">
                                {{ $earning->created_at->format('d M, Y') }}
                            </td>

                            <td class="py-4">
                                <div class="flex gap-2">
                                    <form method="POST" action="{{ route('admin.earnings.approve', $earning) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="rounded-lg bg-green-600 px-4 py-2 text-xs font-semibold text-white">
                                            Approve
                                        </button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.earnings.decline', $earning) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button class="rounded-lg bg-red-600 px-4 py-2 text-xs font-semibold text-white">
                                            Decline
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-gray-500 dark:text-slate-400">
                                No pending earnings.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $earnings->links() }}
        </div>
    </div>

</x-dashboard-layout>