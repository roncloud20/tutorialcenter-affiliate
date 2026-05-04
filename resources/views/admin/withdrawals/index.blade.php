<x-dashboard-layout title="Withdrawal Requests">

    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#0b3a67] dark:text-white">
            Withdrawal Requests
        </h1>
        <p class="mt-1 text-sm text-gray-500 dark:text-slate-400">
            View all affiliate withdrawal requests.
        </p>
    </div>

    <div class="rounded-2xl border border-gray-200 bg-white p-4 shadow-sm dark:border-slate-800 dark:bg-slate-900 sm:p-6">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[60rem] text-left text-sm">
                <thead>
                    <tr class="border-b border-gray-200 text-gray-500 dark:border-slate-800">
                        <th class="py-3 pr-4">Affiliate</th>
                        <th class="py-3 pr-4">Amount</th>
                        <th class="py-3 pr-4">Bank</th>
                        <th class="py-3 pr-4">Account Number</th>
                        <th class="py-3 pr-4">Status</th>
                        <th class="py-3">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($withdrawals as $withdrawal)
                    <tr class="border-b border-gray-100 dark:border-slate-800">
                        <td class="py-4 pr-4 font-medium text-[#0b3a67] dark:text-white">
                            {{ $withdrawal->user->firstname ?? '' }} {{ $withdrawal->user->surname ?? '' }}
                        </td>
                        <td class="py-4 pr-4 font-bold text-[#ed1c24]">
                            ₦{{ number_format($withdrawal->amount, 2) }}
                        </td>
                        <td class="py-4 pr-4 text-gray-500 dark:text-slate-400">
                            {{ $withdrawal->bankAccount->bank_name ?? 'N/A' }}
                        </td>
                        <td class="py-4 pr-4 text-gray-500 dark:text-slate-400">
                            {{ $withdrawal->bankAccount->account_number ?? 'N/A' }}
                        </td>
                        <td class="py-4 pr-4">
                            <!-- <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-700">
                                {{ ucfirst($withdrawal->status) }}
                            </span> -->
                            <span class="rounded-full px-3 py-1 text-xs font-semibold
                                @if($withdrawal->status === 'paid')
                                    bg-green-100 text-green-700
                                @elseif($withdrawal->status === 'approved')
                                    bg-blue-100 text-blue-700
                                @elseif($withdrawal->status === 'rejected')
                                    bg-red-100 text-red-700
                                @else
                                    bg-yellow-100 text-yellow-700
                                @endif">
                                {{ ucfirst($withdrawal->status) }}
                            </span>
                        </td>
                        <td class="py-4 text-gray-500 dark:text-slate-400">
                            {{ $withdrawal->created_at->format('d M, Y') }}
                        </td>

                        <td class="py-4">
                            <div class="flex flex-wrap gap-2">

                                @if($withdrawal->status === 'pending')

                                <form method="POST" action="{{ route('admin.withdrawals.approve', $withdrawal) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="rounded-lg bg-green-600 px-3 py-2 text-xs font-semibold text-white">
                                        Approve
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.withdrawals.reject', $withdrawal) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="rounded-lg bg-red-600 px-3 py-2 text-xs font-semibold text-white">
                                        Reject
                                    </button>
                                </form>

                                @elseif($withdrawal->status === 'approved')

                                <form method="POST" action="{{ route('admin.withdrawals.sent', $withdrawal) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="rounded-lg bg-blue-600 px-3 py-2 text-xs font-semibold text-white">
                                        Mark Sent
                                    </button>
                                </form>

                                @endif

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-gray-500 dark:text-slate-400">
                            No withdrawals found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $withdrawals->links() }}
        </div>
    </div>

</x-dashboard-layout>