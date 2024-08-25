<x-app-layout>
    <x-slot name="heading">
        All Clients
    </x-slot>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="mt-8 flow-root">
          <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
              <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Name</th>
                      <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Mykad/SSM</th>
                      <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Category</th>
                      <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                      <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Edit</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($clients as $client)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $client->name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->mykad_ssm }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->category }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm font-bold" x-data="{ status: '{{ $client->status }}' }" 
                                :class="{
                                    'text-green-600': status === 'Active',
                                    'text-yellow-500': status === 'Expiring',
                                    'text-red-600': status === 'Done'
                                }">
                                {{ $client->status }}
                            </td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span class="sr-only">, {{ $client->id }}</span></a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div class="mt-3">{{ $clients->links() }}</div>
            </div>
          </div>
        </div>
      </div>

</x-app-layout>