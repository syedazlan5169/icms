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
                     <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Premium Price</th>
                     <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                     <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                       <span class="sr-only">Edit</span>
                     </th>
                     <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                      <span class="sr-only">Whatsapp</span>
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
                           <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ 'RM ' . number_format($client->premium, 2, '.', ',') }}</td>
                           <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                             <span x-data="{ status: '{{ $client->status }}'}"
                               :class="{
                                 'inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20 w-16 justify-center': status === 'Active',
                                 'inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/20 w-16 justify-center': status === 'Expiring',
                                 'inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20 w-16 justify-center': status === 'Done'
                               }">
                               {{ $client->status }}</span>
                           </td>
                           <td class="relative whitespace-nowrap py-4 pl-3 text-right text-sm font-medium sm:pr-3">
                             <button class="text-indigo-600 hover:text-indigo-900" x-on:click="edit = ! edit; selectedClientId = '{{ $client->id }}'" form="edit-form">Edit</button>
                           </td>
                           <td class="relative whitespace-nowrap py-4 pl-3 text-right text-sm font-medium sm:pr-3">
                             <a href="https://api.whatsapp.com/send/?phone={{ $client->phone }}&text=%0A++++++++++++%0A++++++++++++Tuan%2FPuan+%2A{{ $client->name }}%2A.+Roadtax+dan+Insurans%2FTakaful+bagi+kenderaan+anda+seperti+berikut+%2AHAMPIR+TAMAT%2A%3B%0A%0APlat+No++%3A++%2{{ $client->plate }}%2A%0AExpiry++++%3A++%2A{{ \Carbon\Carbon::parse($client->expiry_date)->format('d/m/Y') }}%2A%0A++++++++++++%0AHANYA+4+MINGGU+DARI+SEKARANG%0A%0AUntuk+renewal+Insurans%2FTakaful+serta+roadtax+Tuan%2FPuan%2C+sila+hubungi%2Fwhatssap%3B%0A%0ATerima+Kasih%0A%0AKEPUASAN+ANDA+ADALAH+MATLAMAT+UTAMA+KAMI.&type=phone_number&app_absent=0" 
                                class="flex justify-center text-green-500 hover:text-green-900" >
                              <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path d="M 12.011719 2 C 6.5057187 2 2.0234844 6.478375 2.0214844 11.984375 C 2.0204844 13.744375 2.4814687 15.462563 3.3554688 16.976562 L 2 22 L 7.2324219 20.763672 C 8.6914219 21.559672 10.333859 21.977516 12.005859 21.978516 L 12.009766 21.978516 C 17.514766 21.978516 21.995047 17.499141 21.998047 11.994141 C 22.000047 9.3251406 20.962172 6.8157344 19.076172 4.9277344 C 17.190172 3.0407344 14.683719 2.001 12.011719 2 z M 12.009766 4 C 14.145766 4.001 16.153109 4.8337969 17.662109 6.3417969 C 19.171109 7.8517969 20.000047 9.8581875 19.998047 11.992188 C 19.996047 16.396187 16.413812 19.978516 12.007812 19.978516 C 10.674812 19.977516 9.3544062 19.642812 8.1914062 19.007812 L 7.5175781 18.640625 L 6.7734375 18.816406 L 4.8046875 19.28125 L 5.2851562 17.496094 L 5.5019531 16.695312 L 5.0878906 15.976562 C 4.3898906 14.768562 4.0204844 13.387375 4.0214844 11.984375 C 4.0234844 7.582375 7.6067656 4 12.009766 4 z M 8.4765625 7.375 C 8.3095625 7.375 8.0395469 7.4375 7.8105469 7.6875 C 7.5815469 7.9365 6.9355469 8.5395781 6.9355469 9.7675781 C 6.9355469 10.995578 7.8300781 12.182609 7.9550781 12.349609 C 8.0790781 12.515609 9.68175 15.115234 12.21875 16.115234 C 14.32675 16.946234 14.754891 16.782234 15.212891 16.740234 C 15.670891 16.699234 16.690438 16.137687 16.898438 15.554688 C 17.106437 14.971687 17.106922 14.470187 17.044922 14.367188 C 16.982922 14.263188 16.816406 14.201172 16.566406 14.076172 C 16.317406 13.951172 15.090328 13.348625 14.861328 13.265625 C 14.632328 13.182625 14.464828 13.140625 14.298828 13.390625 C 14.132828 13.640625 13.655766 14.201187 13.509766 14.367188 C 13.363766 14.534188 13.21875 14.556641 12.96875 14.431641 C 12.71875 14.305641 11.914938 14.041406 10.960938 13.191406 C 10.218937 12.530406 9.7182656 11.714844 9.5722656 11.464844 C 9.4272656 11.215844 9.5585938 11.079078 9.6835938 10.955078 C 9.7955938 10.843078 9.9316406 10.663578 10.056641 10.517578 C 10.180641 10.371578 10.223641 10.267562 10.306641 10.101562 C 10.389641 9.9355625 10.347156 9.7890625 10.285156 9.6640625 C 10.223156 9.5390625 9.737625 8.3065 9.515625 7.8125 C 9.328625 7.3975 9.131125 7.3878594 8.953125 7.3808594 C 8.808125 7.3748594 8.6425625 7.375 8.4765625 7.375 z"></path>
                              </svg>
                             </a>
                           </td>
                           <td class="relative whitespace-nowrap py-4 pl-3 text-left text-sm font-medium sm:pl-0 sm:pr-3">
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
         class="relative z-10" 
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