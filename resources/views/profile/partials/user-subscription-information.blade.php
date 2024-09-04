<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Subscription Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Manage your subscription plan.") }}
        </p>
    </header>

    <form method="GET" action="{{ route('manage-subscription') }}" class="mt-6 space-y-6">

        <div x-data="{ subscription_id: {{ $user->subscription_id }}, subscription_name: '' }" x-init="
            subscription_name = (() => {
                if (subscription_id == 1) return 'Admin';
                if (subscription_id == 2) return 'Trial';
                if (subscription_id == 3) return 'Basic';
                if (subscription_id == 4) return 'Pro';
                if (subscription_id == 5) return 'Premium';
                return 'Unknown';
            })()
        ">
            <x-input-label for="plan" :value="__('Plan')" />
            <x-text-input id="plan" name="plan" type="text" class="mt-1 block w-full" x-model="subscription_name" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        
        <div>
            <x-input-label for="subscription_end_date" :value="__('Subscription End')" />
            <x-text-input id="subscription_end_date" name="subscription_end_date" type="text" class="mt-1 block w-full" value="{{ \Carbon\Carbon::parse($user->subscription_end_date)->format('d-m-Y') }}" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <div>
            @php
            use Carbon\Carbon;
            $endDate = Carbon::parse($user->subscription_end_date);
            $differenceInDays = round(now()->diffInDays($endDate, false)); 
            @endphp
            <x-input-label for="remaining_days" :value="__('Remaining Days')" />
            <x-text-input id="remaining_days" name="remaining_days" type="text" class="mt-1 block w-full" value="{{ $differenceInDays }}" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>   

        <div class="flex items-center gap-4">
            <x-primary-button  type="submit" form="renew-form">{{ __('Renew') }}</x-primary-button>
            <x-primary-button class="bg-green-600">{{ __('Upgrade') }}</x-primary-button>
        </div>
    </form>
    <form id="renew-form" method="GET" action="{{ route('renewSubscription', ['id' => $user->subscription_id]) }}">
    </form>
</section>
