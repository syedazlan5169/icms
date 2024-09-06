<x-app-layout>
    <x-slot name="heading">
        Manage Subscription Plan
    </x-slot>

    <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        <div class="px-4 py-24 sm:py-32">
              <!-- Pricing section -->
    <div class="mx-auto mt-6 max-w-7xl px-6 sm:mt-12 lg:px-8">
        <div class="mx-auto max-w-4xl text-center">
          <h1 class="text-base font-semibold leading-7 text-indigo-600">Pricing</h1>
          <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Pricing plans for&nbsp;all&nbsp;need</p>
        </div>
        <p class="mx-auto mt-6 max-w-2xl text-center text-lg leading-8 text-gray-600">Choose an affordable plan that’s packed with the best features that suite&nbsp;your&nbsp;need.</p>
        <div class="mt-16 flex justify-center">
          <fieldset aria-label="Payment frequency">
            <div x-data="{ monthly: true, yearly: false }" class="grid grid-cols-2 gap-x-1 rounded-full p-1 text-center text-xs font-semibold leading-5 ring-1 ring-inset ring-gray-200">
              <!-- Checked: "bg-indigo-600 text-white", Not Checked: "text-gray-500" -->
              <label class="cursor-pointer rounded-full px-2.5 py-1" :class="{ 'bg-indigo-600 text-white': monthly, 'text-gray-500': !monthly}">
                <input type="radio" name="frequency" value="monthly" class="sr-only" @click="monthly = !monthly; yearly = !yearly">
                <span>Monthly</span>
              </label>
              <!-- Checked: "bg-indigo-600 text-white", Not Checked: "text-gray-500" -->
              <label class="cursor-pointer rounded-full px-2.5 py-1" :class="{ 'bg-indigo-600 text-white': yearly, 'text-gray-500': !yearly}">
                <input type="radio" name="frequency" value="annually" class="sr-only" @click="monthly = !monthly; yearly = !yearly">
                <span>Annually</span>
              </label>
            </div>
          </fieldset>
        </div>
        <div x-data="{ currentPlan: {{ $loggedInUser->subscription_id }}}" class="isolate mx-auto mt-10 grid max-w-md grid-cols-1 gap-8 md:max-w-2xl md:grid-cols-2 lg:max-w-4xl xl:mx-0 xl:max-w-none xl:grid-cols-4">
          <div class="rounded-3xl p-8 ring-1 ring-gray-200" :class="{ 'ring-indigo-600 ring-2': currentPlan == 2}">
            <h2 id="tier-hobby" class="text-lg font-semibold leading-8 text-gray-900" :class="{ 'text-indigo-600': currentPlan == 2}">{{ $subscriptions->where('id',2)->first()->toArray()['name'] }}</h2>
            <p class="mt-4 text-sm leading-6 text-gray-600">{{ $subscriptions->where('id',2)->first()->toArray()['description'] }}</p>
            <p class="mt-6 flex items-baseline gap-x-1">
              <!-- Price, update based on frequency toggle state -->
              <span class="text-4xl font-bold tracking-tight text-gray-900">RM {{ $subscriptions->where('id',2)->first()->toArray()['price'] }}</span>
            </p>
            <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                5 products
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Up to 1,000 subscribers
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Basic analytics
              </li>
            </ul>
          </div>
          <div class="rounded-3xl p-8 ring-1 ring-gray-200" :class="{ 'ring-indigo-600 ring-2': currentPlan == 3}">
            <h2 id="tier-freelancer" class="text-lg font-semibold leading-8 text-gray-900" :class="{ 'text-indigo-600': currentPlan == 3}">{{ $subscriptions->where('id',3)->first()->toArray()['name'] }}</h2>
            <p class="mt-4 text-sm leading-6 text-gray-600">{{ $subscriptions->where('id',3)->first()->toArray()['description'] }}</p>
            <p class="mt-6 flex items-baseline gap-x-1">
              <!-- Price, update based on frequency toggle state -->
              <span class="text-4xl font-bold tracking-tight text-gray-900">RM {{ $subscriptions->where('id',3)->first()->toArray()['price'] }}</span>
              <!-- Payment frequency, update based on frequency toggle state -->
              <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
            </p>
            <a href="change/3" aria-describedby="tier-freelancer" class="mt-6 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:bg-indigo-600 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" x-text="(currentPlan == 3) ? 'Renew' : 'Choose Plan'"></a>
            <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                5 products
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Up to 1,000 subscribers
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Basic analytics
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                48-hour support response time
              </li>
            </ul>
          </div>
          <div class="rounded-3xl p-8 ring-1 ring-gray-200" :class="{ 'ring-indigo-600 ring-2': currentPlan == 4}">
            <h2 id="tier-startup" class="text-lg font-semibold leading-8 text-indigo-600" :class="{ 'text-indigo-600': currentPlan == 4 }">{{ $subscriptions->where('id',4)->first()->toArray()['name'] }}</h2>
            <p class="mt-4 text-sm leading-6 text-gray-600">{{ $subscriptions->where('id',4)->first()->toArray()['description'] }}</p>
            <p class="mt-6 flex items-baseline gap-x-1">
              <!-- Price, update based on frequency toggle state -->
              <span class="text-4xl font-bold tracking-tight text-gray-900">RM {{ $subscriptions->where('id',4)->first()->toArray()['price'] }}</span>
              <!-- Payment frequency, update based on frequency toggle state -->
              <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
            </p>
            <a href="/change/4" aria-describedby="tier-startup" class="mt-6 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:bg-indigo-600 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" x-text="(currentPlan == 4) ? 'Renew' : 'Choose Plan'"></a>
            <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                25 products
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Up to 10,000 subscribers
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Advanced analytics
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                24-hour support response time
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Marketing automations
              </li>
            </ul>
          </div>
          <div class="rounded-3xl p-8 ring-1 ring-gray-200" :class="{ 'ring-indigo-600 ring-2': currentPlan == 5}">
            <h2 id="tier-enterprise" class="text-lg font-semibold leading-8 text-gray-900" :class="{ 'text-indigo-600': currentPlan == 5 }">{{ $subscriptions->where('id',5)->first()->toArray()['name'] }}</h2>
            <p class="mt-4 text-sm leading-6 text-gray-600">{{ $subscriptions->where('id',5)->first()->toArray()['description'] }}</p>
            <p class="mt-6 flex items-baseline gap-x-1">
              <!-- Price, update based on frequency toggle state -->
              <span class="text-4xl font-bold tracking-tight text-gray-900">RM {{ $subscriptions->where('id',5)->first()->toArray()['price'] }}</span>
              <!-- Payment frequency, update based on frequency toggle state -->
              <span class="text-sm font-semibold leading-6 text-gray-600">/month</span>
            </p>
            <a href="/change/5" aria-describedby="tier-enterprise" class="mt-6 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:bg-indigo-600 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" x-text="(currentPlan == 5) ? 'Renew' : 'Choose Plan'"></a>
            <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Unlimited products
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Unlimited subscribers
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Advanced analytics
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                1-hour, dedicated support response time
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Marketing automations
              </li>
              <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                </svg>
                Custom reporting tools
              </li>
            </ul>
          </div>
        </div>
      </div> 
        </div>
    </div>
</x-app-layout>

