<x-app-layout>
    <x-slot name="heading">
        Dashboard
    </x-slot>

    <div x-data="{
        totalClients: {{ $loggedInUser->clients()->count() }}, 
        expiringClients: {{ $loggedInUser->clients()->where('status', 'Expiring')->count() }}, 
        totalExpiring: '{{ $totalExpiringFormatted }}' 
    }">
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-indigo-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
            </div>
            <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Clients</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900" x-text="totalClients"></p>
            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm">
                <a href="/clients/index" class="font-medium text-indigo-600 hover:text-indigo-500">View all</a>
            </div>
            </div>
        </dd>
        </div>
        <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-yellow-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            </div>
            <p class="ml-16 truncate text-sm font-medium text-gray-500">Expiring Clients</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900" x-text="expiringClients"></p>
            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm">
                <a href="/clients/expired" class="font-medium text-indigo-600 hover:text-indigo-500">View all</a>
            </div>
            </div>
        </dd>
        </div>
        <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-green-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>
            </div>
            <p class="ml-16 truncate text-sm font-medium text-gray-500">Total Expiring</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
            <p class="text-2xl font-semibold text-gray-900" x-text="totalExpiring"></p>
            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm">
                <a href="/clients/expired" class="font-medium text-indigo-600 hover:text-indigo-500">View all</a>
            </div>
            </div>
        </dd>
        </div>
    </dl>


    <?php
        $isExpired = $loggedInUser->subscription_end_date < now();
    ?>
    <dl x-data="dataForId({{ $loggedInUser->subscription_id }}, {{ $isExpired }})" class="mt-24 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <script>
            function dataForId(subscriptionId, isExpired) {
                if (isExpired) {
                    return {
                        status1: 'Inactive',
                        status2: 'Inactive',
                        status3: 'Inactive'
                    };
                }
                switch(subscriptionId) {
                    case 1:
                        return {
                            status1: 'Active',
                            status2: 'Active',
                            status3: 'Active'
                        };
                    case 2:
                        return {
                            status1: 'Active',
                            status2: 'Active',
                            status3: 'Active'
                        };
                    case 3:
                        return {
                            status1: 'Active',
                            status2: 'Inactive',
                            status3: 'Inactive'
                        };
                    case 4:
                        return {
                            status1: 'Active',
                            status2: 'Active',
                            status3: 'Inactive'
                        };
                    case 5:
                        return {
                            status1: 'Active',
                            status2: 'Active',
                            status3: 'Active'
                        };
                    default:
                        return {
                            status1: 'Unknown',
                            status2: 'Unknown',
                            status3: 'Unknown'
                        };
                }
            }
        </script>

        <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-indigo-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
            </div>
            <p class="ml-16 truncate text-xl font-medium text-gray-500">Basic</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm flex justify-center">
                <p class="text-2xl font-semibold" :class="{'text-green-500': status1 === 'Active', 'text-red-500': status1 === 'Inactive'}"  x-text="status1"></p>
            </div>
            </div>
        </dd>
        </div>
        <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
        <dt>
            <div class="absolute rounded-md bg-yellow-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            </div>
            <p class="ml-16 truncate text-xl font-medium text-gray-500">Pro</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm flex justify-center">
                <p class="text-2xl font-semibold" :class="{'text-green-500': status2 === 'Active', 'text-red-500': status2 === 'Inactive'}" x-text="status2"></p>
            </div>
            </div>
        </dd>
        </div>
        <div class="relative overflow-hidden rounded-lg bg-white px-4 pb-12 pt-5 shadow sm:px-6 sm:pt-6">
        <dt class="mb-5">
            <div class="absolute rounded-md bg-green-500 p-3">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>
            </div>
            <p class="ml-16 truncate text-xl font-medium text-gray-500">Premium</p>
        </dt>
        <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
            <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
            <div class="text-sm flex justify-center">
                <p class="text-2xl font-semibold" :class="{'text-green-500': status3 === 'Active', 'text-red-500': status3 === 'Inactive'}" x-text="status3"></p>
            </div>
            </div>
        </dd>
        </div>

    </dl>
    </div>
 
</x-app-layout>
