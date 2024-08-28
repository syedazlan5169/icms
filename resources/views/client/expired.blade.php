<x-app-layout>
   <x-slot name="heading">
       Expiring Clients
   </x-slot>

   <div x-data="{ edit: false, selectedClientId: null, selectedClientName:null, deleteModal: false }" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 p-5">
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
                             <button x-on:click="deleteModal = true; selectedClientId='{{ $client->id }}'; selectedClientName='{{ $client->name }}'" class="text-red-600 hover:text-red-900">Delete</button>
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
     <!--Delete Modal-->
     <div x-show="deleteModal" 
         x-transition:enter="ease-out duration-300" 
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
         x-transition:leave="ease-in duration-200" 
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
         class="relative z-10 hidden" 
         aria-labelledby="modal-title" 
         role="dialog" 
         aria-modal="true">
         
         <!-- Background backdrop -->
         <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

         <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
             <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                 <!-- Modal panel -->
                 <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                     <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                         <div class="sm:flex sm:items-start">
                             <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                 <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                 </svg>
                             </div>
                             <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                 <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Delete Client</h3>
                                 <div class="mt-2">
                                     <p class="text-sm text-gray-500">Are you sure you want to delete <span class="font-bold text-red-500" x-text="selectedClientName"></span>? This action cannot be undone.</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                         <x-primary-button form="delete-form" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Delete</x-primary-button>
                         <button type="button" @click="deleteModal = false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-xs uppercase font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">CANCEL</button> </div>
                 </div>
             </div>
         </div>
     </div>
     <form method="POST" :action="`/client/${selectedClientId}`" id="delete-form" class="hidden">
         @csrf
         @method('DELETE')    
     </form>
     <!-- End Delete Modal -->
     <form method="GET" :action="`/client/${selectedClientId}`" id="edit-form" class="hidden"></form>
   </div>
</x-app-layout>