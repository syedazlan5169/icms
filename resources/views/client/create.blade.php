<x-app-layout>
    <x-slot name="heading">
       Add Client 
    </x-slot>

   <form method="POST" action="/client/create" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
      @csrf
      <div class="px-4 py-6 sm:p-8">
         @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
               <span class="block sm:inline">{{ session('success') }}</span>
            </div>
         @elseif(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
               <span class="block sm:inline">{{ session('error') }}</span>
            </div>
         @endif
         <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
               <h2 class="text-xl font-semibold leading-7 text-gray-900">Client Information</h2>
               <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Client Name</label>
                  <div class="mt-2">
                     <input type="text" name="name" id="name" autocomplete="given-name" placeholder="Muhammad Abu Bin Ali" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
         
                  <div class="sm:col-span-1">
                  <label for="mykad_ssm" class="block text-sm font-medium leading-6 text-gray-900">MyKad or SSM</label>
                  <div class="mt-2">
                     <input type="text" name="mykad_ssm" id="mykad_ssm" autocomplete="family-name" placeholder="900508-01-5548"
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
                     <input type="text" name="phone" id="phone" autocomplete="family-name" placeholder="012-3456789" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
          
                  <div class="sm:col-span-full">
                  <label for="address1" class="block text-sm font-medium leading-6 text-gray-900">Address 1</label>
                  <div class="mt-2">
                     <input type="text" name="address1" id="address1" autocomplete="street-address" placeholder="JKR 123, Persiaran Makmor 2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
           
                  <div class="sm:col-span-full">
                  <label for="address2" class="block text-sm font-medium leading-6 text-gray-900">Address 2</label>
                  <div class="mt-2">
                     <input type="text" name="address2" id="address2" autocomplete="street-address" placeholder="Taman Makmor" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>

                  <div class="sm:col-span-2 sm:col-start-1">
                  <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                  <div class="mt-2">
                     <input type="text" name="city" id="city" autocomplete="address-level2" placeholder="Shah Alam" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
         
                  <div class="sm:col-span-2">
                  <label for="state" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                  <div class="mt-2">
                     <select id="state" name="state" autocomplete="state" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option>WP Kuala Lumpur</option>
                        <option>WP Labuan</option>
                        <option>WP Putrajaya</option>
                        <option>Johor</option>
                        <option>Kedah</option>
                        <option>Kelantan</option>
                        <option>Melaka</option>
                        <option>Negeri Sembilan</option>
                        <option>Pahang</option>
                        <option>Perak</option>
                        <option>Perlis</option>
                        <option>Sabah</option>
                        <option>Sarawak</option>
                        <option>Selangor</option>
                        <option>Terengganu</option>
                     </select>
                  </div>
                  </div>
         
                  <div class="sm:col-span-2">
                  <label for="postcode" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal Code</label>
                  <div class="mt-2">
                     <input type="text" name="postcode" id="postcode" autocomplete="postal-code" placeholder="65400" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
               </div>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
               <h2 class="text-xl font-semibold leading-7 text-gray-900">Insurance Details</h2>
               <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-2 col-span-6">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                        <div class="mt-2">
                           <select id="category" name="category" autocomplete="category" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                              <option value="Kereta" selected>Kereta</option>
                              <option value="Motor">Motor</option>
                              <option value="Foreign Worker">Foreign Worker (Pekerja Asing)</option>
                              <option value="Fire (Kebakaran Rumah & Kedai)">Fire (Kebakaran Rumah & Kedai)</option>
                              <option value="Personal Accident">Personal Accident</option>
                              <option value="Medical Card">Medical Card</option>
                              <option value="Hibah TakafulL">Hibah Takaful</option>
                              <option value="Travel">Haji, Umrah, & Travel</option>
                              <option value="Kontraktor">Kontraktor</option>
                           </select>
                        </div>
                  </div>

                  <div class="sm:col-span-2 col-span-6">
                        <label for="vehicle_model" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Model</label>
                        <div class="mt-2">
                           <input type="text" name="vehicle_model" id="vehicle_model" placeholder="SAGA FLX 1.5" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                  </div>

                  <div class="sm:col-span-2 col-span-6">
                        <label for="plate" class="block text-sm font-medium leading-6 text-gray-900">Plate</label>
                        <div class="mt-2">
                           <input type="text" name="plate" id="plate" placeholder="AJX8052" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                  </div>

                  <div class="sm:col-span-4 col-span-6">
                        <label for="insurance_company" class="block text-sm font-medium leading-6 text-gray-900">Insurance Company</label>
                        <div class="mt-2">
                           <select id="insurance_company" name="insurance_company" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                              <option selected value="AIA">AIA General Berhad</option>
                              <option value="AIG">AIG Malaysia Insurance Berhad</option>
                              <option value="Allianz General Insurance Company (Malaysia) Berhad">Allianz General Insurance Company (Malaysia) Berhad</option>
                              <!-- other options -->
                           </select>
                        </div>
                  </div>

                  <div class="sm:col-span-2 col-span-6">
                        <label for="premium" class="block text-sm font-medium leading-6 text-gray-900">Premium Price</label>
                        <div class="mt-2">
                           <input type="number" min="0" step="0.01" name="premium" id="premium" placeholder="1000" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        </div>
                  </div>

                  <div x-data="datePicker()" class="col-span-6 grid grid-cols-1 sm:grid-cols-4 gap-4">
                        <div class="sm:col-span-1 col-span-4">
                           <label for="inception_date" class="block text-sm font-medium leading-6 text-gray-900">Inception Date</label>
                           <div class="mt-2">
                              <input type="date" name="inception_date" id="inception_date" placeholder="dd/mm/yyyy" x-model="inceptionDate" @change="calculateDates" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                           </div>
                        </div>
                        <div class="sm:col-span-1 col-span-4">
                           <label for="expiry_date" class="block text-sm font-medium leading-6 text-gray-900">Expiry Date</label>
                           <div class="mt-2">
                              <input type="date" name="expiry_date" id="expiry_date" placeholder="dd/mm/yyyy" x-model="expiryDate" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                           </div>
                        </div>
                        <div class="sm:col-span-1 col-span-4">
                           <label for="renewal_date" class="block text-sm font-medium leading-6 text-gray-900">Renewal Date</label>
                           <div class="mt-2">
                              <input type="date" name="renewal_date" id="renewal_date" placeholder="dd/mm/yyyy" x-model="renewalDate" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                           </div>
                        </div>
                        <div class="sm:col-span-1 col-span-4">
                           <label for="reminder_date" class="block text-sm font-medium leading-6 text-gray-900">Reminder Date</label>
                           <div class="mt-2">
                              <input type="date" name="reminder_date" id="reminder_date" placeholder="dd/mm/yyyy" x-model="reminderDate" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                           </div>
                        </div>
                  </div>
               </div>
            </div>

               <script>
                  function datePicker() {
                     return {
                        inceptionDate: '',
                        expiryDate: '',
                        renewalDate: '',
                        reminderDate: '',
                        calculateDates() {
                              if (this.inceptionDate) {
                                 const inception = new Date(this.inceptionDate);

                                 // Calculate expiryDate: inceptionDate + 1 year
                                 const expiry = new Date(inception);
                                 expiry.setFullYear(inception.getFullYear() + 1);
                                 this.expiryDate = expiry.toISOString().split('T')[0];

                                 // Calculate renewalDate: inceptionDate + 1 year + 1 month
                                 const renewal = new Date(expiry);
                                 renewal.setMonth(expiry.getMonth() + 1);
                                 this.renewalDate = renewal.toISOString().split('T')[0];

                                 // Calculate reminderDate: expiryDate - 1 month
                                 const reminder = new Date(expiry);
                                 reminder.setMonth(expiry.getMonth() - 1);
                                 this.reminderDate = reminder.toISOString().split('T')[0];
                              }
                        }
                     }
                  }
               </script>

               </div>
            </div>
         <div class="flex justify-center">
            <p class="mt-0 py-0 text-l">
               Your client quota is {{ $loggedInUser->clients->count() }} / 
               @if($loggedInUser->subscription->client_quota == -1)
                   &infin;
               @else
                   {{ $loggedInUser->subscription->client_quota }}
               @endif
           </p>
         </div>
         <div class="px-6 py-4">
         <div class="mt-6 flex items-center justify-end gap-x-6">
            <x-primary-button type="submit">Save</x-primary-button> 
         </div>
         </div>
      </div>
   </form>
 
</x-app-layout> 