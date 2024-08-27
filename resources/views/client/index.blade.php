<x-app-layout>
    <x-slot name="heading">
        All Clients
    </x-slot>

    <div x-data="{ edit: false, selectedClientId: null }" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 p-5">
    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
          <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif
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
                      <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                        <span class="sr-only">Delete</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach ($clients as $client)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $client->name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->mykad_ssm }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $client->category }}</td>
                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                              <span x-data="{ status: '{{ $client->status }}'}"
                                :class="{
                                  'inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 w-16 justify-center': status === 'Active',
                                  'inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/20 w-16 justify-center': status === 'Expiring',
                                  'inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20 w-16 justify-center': status === 'Done'
                                }">
                                {{ $client->status }}</span>
                            </td>
                            <td class="relative whitespace-nowrap py-4 pl-3 text-right text-sm font-medium sm:pr-6">
                              <button class="text-indigo-600 hover:text-indigo-900" x-on:click="edit = ! edit; selectedClientId = '{{ $client->id }}'" form="edit-form">Edit</button>
                            </td>
                            <td class="relative whitespace-nowrap py-4 pl-3 text-left text-sm font-medium sm:pl-0 sm:pr-6">
                              <form method="POST" action="{{ $client->id }}" id="delete-form-{{ $client->id }}" class="hidden">
                                @csrf
                                @method('DELETE')    
                              </form>
                              <button class="text-red-600 hover:text-red-900" form="delete-form-{{ $client->id }}">Delete</button>
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
      <form method="GET" :action="`/client/${selectedClientId}`" id="edit-form" class="hidden"></form>
      <div x-show="edit" id="edit_form" class="flex justify-center pt-10 text-4xl">
        <p>Editing Here <span x-text="selectedClientId"></span></p>
      </div>
      <div id="target" class="flex justify-center mt-10 text-red-500 text-5xl"><h1>Target Area</h1></div>
    </div>

</x-app-layout>