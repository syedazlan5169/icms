<x-app-layout>
    <x-slot name="heading">
       Edit Client 
    </x-slot>

   <form method="POST" action="{{ $client->id }}" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
      @csrf
      @method('PATCH')
      <div class="px-4 py-6 sm:p-8">
         @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
               <span class="block sm:inline">{{ session('success') }}</span>
            </div>
         @endif
         <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
               <h2 class="text-xl font-semibold leading-7 text-gray-900">Client Information</h2>
               <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Client Name</label>
                  <div class="mt-2">
                     <input type="text" name="name" id="name" value="{{ $client->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
         
                  <div class="sm:col-span-1">
                  <label for="mykad_ssm" class="block text-sm font-medium leading-6 text-gray-900">MyKad or SSM</label>
                  <div class="mt-2">
                     <input type="text" name="mykad_ssm" id="mykad_ssm" value="{{ $client->mykad_ssm }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required
                            oninput="formatMyKadSSM(this)">
                  </div>
                  </div>
                  <script>
                     function formatMyKadSSM(input) {
                         input.value = input.value
                             .replace(/\D/g, '') // Remove non-digit characters
                             .replace(/(\d{6})(\d{2})(\d{0,4})/, '$1-$2-$3') // Add hyphens
                             .substr(0, 14); // Limit to 14 characters
                     }
                  </script>
                 

                  <div class="sm:col-span-1">
                  <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone Number</label>
                  <div class="mt-2">
                     <input type="text" name="phone" id="phone" value="{{ $client->phone }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
          
                  <div class="col-span-full">
                  <label for="address1" class="block text-sm font-medium leading-6 text-gray-900">Address 1</label>
                  <div class="mt-2">
                     <input type="text" name="address1" id="address1" value="{{ $client->address1 }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
           
                  <div class="col-span-full">
                  <label for="address2" class="block text-sm font-medium leading-6 text-gray-900">Address 2</label>
                  <div class="mt-2">
                     <input type="text" name="address2" id="address2" value="{{ $client->address2 }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>

                  <div class="sm:col-span-2 sm:col-start-1">
                  <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                  <div class="mt-2">
                     <input type="text" name="city" id="city" value="{{ $client->city }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
         
                  <div class="sm:col-span-2">
                  <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                  <div x-data:{ state = {{ $client->state }}} class="mt-2">
                     <select id="state" name="state" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="WP Kuala Lumpur" {{ $client->state == 'WP Kuala Lumpur' ? 'selected' : '' }}>WP Kuala Lumpur</option>
                        <option value="WP Labuan" {{ $client->state == 'WP Labuan' ? 'selected' : '' }}>WP Labuan</option>
                        <option value="WP Putrajaya" {{ $client->state == 'WP Putrajaya' ? 'selected' : '' }}>WP Putrajaya</option>
                        <option value="Johor" {{ $client->state == 'Johor' ? 'selected' : '' }}>Johor</option>
                        <option value="Kedah" {{ $client->state == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                        <option value="Kelantan" {{ $client->state == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                        <option value="Melaka" {{ $client->state == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                        <option value="Negeri Sembilan" {{ $client->state == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                        <option value="Pahang" {{ $client->state == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                        <option value="Perak" {{ $client->state == 'Perak' ? 'selected' : '' }}>Perak</option>
                        <option value="Perlis" {{ $client->state == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                        <option value="Penang" {{ $client->state == 'Penang' ? 'selected' : '' }}>Penang</option>
                        <option value="Sabah" {{ $client->state == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                        <option value="Sarawak" {{ $client->state == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                        <option value="Selangor" {{ $client->state == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                        <option value="Terengganu" {{ $client->state == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
                  </select>
                  </div>
                  </div>
         
                  <div class="sm:col-span-2">
                  <label for="postcode" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal Code</label>
                  <div class="mt-2">
                     <input type="text" name="postcode" id="postcode" value="{{ $client->postcode }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
               </div>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
               <h2 class="text-xl font-semibold leading-7 text-gray-900">Insurance Details</h2>
               <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-2">
                  <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                  <div class="mt-2">
                     <select id="category" name="category" autocomplete="category" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="Kereta" {{ $client->category == 'Kereta' ? 'selected' : '' }}>Kereta</option>
                        <option value="Motor" {{ $client->category == 'Motor' ? 'selected' : '' }}>Motor</option>
                        <option value="Foreign Worker" {{ $client->category == 'Foreign Worker' ? 'selected' : '' }}>Foreign Worker (Pekerja Asing)</option>
                        <option value="Fire (Kebakaran Rumah & Kedai)" {{ $client->category == 'Fire (Kebakaran Rumah & Kedai)' ? 'selected' : '' }}>Fire (Kebakaran Rumah & Kedai)</option>
                        <option value="Personal Accident" {{ $client->category == 'Personal Accident' ? 'selected' : '' }}>Personal Accident</option>
                        <option value="Medical Card" {{ $client->category == 'Medical Card' ? 'selected' : '' }}>Medical Card</option>
                        <option value="Hibah Takaful" {{ $client->category == 'Hibah Takaful' ? 'selected' : '' }}>Hibah Takaful</option>
                        <option value="Haji, Umrah, & Travel" {{ $client->category == 'Haji, Umrah, & Travel' ? 'selected' : '' }}>Haji, Umrah, & Travel</option>
                        <option value="Kontraktor" {{ $client->category == 'Kontraktor' ? 'selected' : '' }}>Kontraktor</option>
                     </select>
                  </div>
                  </div>
         
                  <div class="sm:col-span-2">
                  <label for="vehicle_model" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Model</label>
                  <div class="mt-2">
                     <input type="text" name="vehicle_model" value="{{ $client->vehicle_model }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>

                  <div class="sm:col-span-2">
                  <label for="plate" class="block text-sm font-medium leading-6 text-gray-900">Plate</label>
                  <div class="mt-2">
                     <input type="text" name="plate" id="plate" value="{{ $client->plate }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>
          
                  <div class="sm:col-span-4">
                     <label for="insurance_company" class="block text-sm font-medium leading-6 text-gray-900">Insurance Company</label>
                     <div class="mt-2">
                        <input list="insurance_companies" id="insurance_company" name="insurance_company" value="{{ $client->insurance_company }}"
                                 class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Select or type insurance company">
                        <datalist id="insurance_companies">
                              <option value="AIA General Berhad">
                              <option value="AIG Malaysia Insurance Berhad">
                              <option value="Allianz General Insurance Company (Malaysia) Berhad">
                              <option value="Berjaya Sompo Insurance Berhad">
                              <option value="Chubb Insurance Malaysia Berhad">
                              <option value="Etiqa General Insurance Berhad">
                              <option value="Generali Insurance Malaysia Berhad">
                              <option value="Great Eastern General Insurance (Malaysia) Berhad">
                              <option value="Liberty General Insurance Berhad (formerly known as AmGeneral Insurance Berhad)">
                              <option value="Lonpac Insurance Berhad">
                              <option value="MSIG Insurance (Malaysia) Bhd">
                              <option value="Pacific & Orient Insurance Co. Berhad">
                              <option value="Pacific Insurance Berhad">
                              <option value="Progressive Insurance Berhad">
                              <option value="QBE Insurance (Malaysia) Berhad">
                              <option value="RHB Insurance Berhad">
                              <option value="Tokio Marine Insurance (Malaysia) Berhad">
                              <option value="Tune Insurance Malaysia Berhad">
                              <option value="Zurich General Insurance Malaysia Berhad">
                              <option value="Syarikat Takaful Malaysia Am Berhad">
                              <option value="Takaful Ikhlas General Berhad">
                              <option value="Zurich General Takaful Malaysia Berhad">
                              <option value="Etiqa General Takaful Berhad">
                        </datalist>
                     </div>
                  </div>

         
                  <div class="sm:col-span-2">
                     <label for="premium" class="block text-sm font-medium leading-6 text-gray-900">Premium Price</label>
                     <div class="mt-2">
                        <input type="text" name="premium" id="premium" value="{{ $client->premium }}"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                     </div>
                 </div>

               <div class="col-span-6 flex justify-between gap-4">
                  <div class="w-1/4">
                  <label for="inception_date" class="block text-sm font-medium leading-6 text-gray-900">Inception Date</label>
                  <div class="mt-2">
                     <input type="date" name="inception_date" id="inception_date" value="{{ $client->inception_date }}"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                  </div>
                  </div>
                  <div class="w-1/4">
                  <label for="expiry_date" class="block text-sm font-medium leading-6 text-gray-900">Expiry Date</label>
                  <div class="mt-2">
                     <input type="date" name="expiry_date" id="expiry_date" value="{{ $client->expiry_date }}"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                  </div>
                  </div>
                  <div class="w-1/4">
                  <label for="renewal_date" class="block text-sm font-medium leading-6 text-gray-900">Renewal Date</label>
                  <div class="mt-2">
                     <input type="date" name="renewal_date" id="renewal_date" value="{{ $client->renewal_date }}"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                  </div>
                  </div>
                  <div class="w-1/4">
                  <label for="reminder_date" class="block text-sm font-medium leading-6 text-gray-900">Reminder Date</label>
                  <div class="mt-2">
                     <input type="date" name="reminder_date" id="reminder_date" value="{{ $client->reminder_date }}"
                              class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" readonly>
                  </div>
                  </div>
               </div>

               
               </div>
            </div>
      
         <div class="mt-6 flex items-center justify-end gap-x-6">
         <x-primary-button type="submit">Update</x-primary-button> 
         <x-primary-button type="button" class="bg-green-700 hover:bg-green-900">Renew</x-primary-button> 
         </div>
   
      </div>
   </form>
 
</x-app-layout> 