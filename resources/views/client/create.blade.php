<x-app-layout>
    <x-slot name="heading">
       Add Client 
    </x-slot>

   <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
      <div class="px-4 py-6 sm:p-8">
         <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
               <h2 class="text-xl font-semibold leading-7 text-gray-900">Client Information</h2>
               <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4">
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Client Name</label>
                  <div class="mt-2">
                     <input type="text" name="name" id="name" autocomplete="given-name" placeholder="Muhammad Abu Bin Ali" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>
         
                  <div class="sm:col-span-1">
                  <label for="mykad_ssm" class="block text-sm font-medium leading-6 text-gray-900">MyKad or SSM</label>
                  <div class="mt-2">
                     <input type="text" name="mykad_ssm" id="mykad_ssm" autocomplete="family-name" placeholder="900508-01-5548"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
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
                     <input type="text" name="phone" id="phone" autocomplete="family-name" placeholder="012-3456789" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>
          
                  <div class="col-span-full">
                  <label for="address1" class="block text-sm font-medium leading-6 text-gray-900">Address 1</label>
                  <div class="mt-2">
                     <input type="text" name="address1" id="address1" autocomplete="street-address" placeholder="JKR 123, Persiaran Makmor 2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>
           
                  <div class="col-span-full">
                  <label for="address2" class="block text-sm font-medium leading-6 text-gray-900">Address 2</label>
                  <div class="mt-2">
                     <input type="text" name="address2" id="address2" autocomplete="street-address" placeholder="Taman Makmor" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>

                  <div class="sm:col-span-2 sm:col-start-1">
                  <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                  <div class="mt-2">
                     <input type="text" name="city" id="city" autocomplete="address-level2" placeholder="Shah Alam" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                     <input type="text" name="postcode" id="postcode" autocomplete="postal-code" placeholder="65400" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                        <option value="KERETA" selected>Kereta</option>
                        <option value="MOTOR">Motor</option>
                        <option value="SPIKPA">Foreign Worker (Pekerja Asing)</option>
                        <option value="FIRE">Fire (Kebakaran Rumah & Kedai)</option>
                        <option value="PERSONAL ACCIDENT">Personal Accident</option>
                        <option value="MEDICAL CARD">Medical Card</option>
                        <option value="HIBAH TAKAFUL">Hibah Takaful</option>
                        <option value="TRAVEL">Haji, Umrah, & Travel</option>
                        <option value="CONTRACTOR">Kontraktor</option>
                     </select>
                  </div>
                  </div>
         
                  <div class="sm:col-span-2">
                  <label for="vehicle_model" class="block text-sm font-medium leading-6 text-gray-900">Vehicle Model</label>
                  <div class="mt-2">
                     <input type="text" name="vehicle_model" id="vehicel_model"  placeholder="SAGA FLX 1.5" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>

                  <div class="sm:col-span-2">
                  <label for="plate" class="block text-sm font-medium leading-6 text-gray-900">Plate</label>
                  <div class="mt-2">
                     <input type="text" name="plate" id="plate" placeholder="AJX8052" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>
          
                  <div class="sm:col-span-4">
                  <label for="insurance_company" class="block text-sm font-medium leading-6 text-gray-900">Insurance Company</label>
                  <div class="mt-2">
                     <select id="insurance_company" name="insurance_company" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option selected value="AIA">AIA General Berhad</option>
                        <option value="AIG">AIG Malaysia Insurance Berhad</option>
                        <option value="ALLIANZ">Allianz General Insurance Company (Malaysia) Berhad</option>
                        <option value="BERJAYA SOMPO">Berjaya Sompo Insurance Berhad</option>
                        <option value="CHUBB">Chubb Insurance Malaysia Berhad</option>
                        <option value="ETIQA INSURANCE">Etiqa General Insurance Berhad</option>
                        <option value="GENERALI">Generali Insurance Malaysia Berhad</option>
                        <option value="GREAT EASTERN">Great Eastern General Insurance (Malaysia) Berhad</option>
                        <option value="LIBERTY GENERAL">Liberty General Insurance Berhad (formerly known as AmGeneral Insurance Berhad)</option>
                        <option value="LONPAC">Lonpac Insurance Berhad</option>
                        <option value="MSIG">MSIG Insurance (Malaysia) Bhd</option>
                        <option value="PACIFIC ORIENT">Pacific & Orient Insurance Co. Berhad</option>
                        <option value="PACIFIC INSURANCE">Pacific Insurance Berhad</option>
                        <option value="PROGRESSIVE">Progressive Insurance Berhad</option>
                        <option value="QBE">QBE Insurance (Malaysia) Berhad</option>
                        <option value="RHB">RHB Insurance Berhad</option>
                        <option value="TOKIO MARINE">Tokio Marine Insurance (Malaysia) Berhad</option>
                        <option value="TUNE">Tune Insurance Malaysia Berhad</option>
                        <option value="ZURICH GENERAL">Zurich General Insurance Malaysia Berhad</option>
                        <option value="STMB">Syarikat Takaful Malaysia Am Berhad</option>
                        <option value="IKHLAS">Takaful Ikhlas General Berhad</option>
                        <option value="ZTMB">Zurich General Takaful Malaysia Berhad</option>
                        <option value="EGTB">Etiqa General Takaful Berhad</option>
                        <option value="OTHERS">Others</option>
                     </select>
                  </div>
                  </div>
         
                  <div class="sm:col-span-2">
                     <label for="premium" class="block text-sm font-medium leading-6 text-gray-900">Premium Price</label>
                     <div class="mt-2">
                        <input type="text" name="premium" id="premium" placeholder="10,000"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                               oninput="formatCurrency(this)">
                     </div>
                 </div>
                 
                 <script>
                     function formatCurrency(input) {
                         // Remove any character that is not a digit
                         let value = input.value.replace(/[^0-9]/g, '');
                 
                         // Format the number with commas
                         value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
                 
                         // Set the formatted value back to the input
                         input.value = value;
                     }
                 </script>
               </div>
            </div>

            <div class="border-b border-gray-900/10 pb-12">
               <h2 class="text-base font-semibold leading-7 text-gray-900">Notifications</h2>
               <p class="mt-1 text-sm leading-6 text-gray-600">We'll always let you know about important changes, but you pick what else you want to hear about.</p>
         
               <div class="mt-10 space-y-10">
                  <fieldset>
                  <legend class="text-sm font-semibold leading-6 text-gray-900">By Email</legend>
                  <div class="mt-6 space-y-6">
                     <div class="relative flex gap-x-3">
                        <div class="flex h-6 items-center">
                        <input id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="text-sm leading-6">
                        <label for="comments" class="font-medium text-gray-900">Comments</label>
                        <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                        </div>
                     </div>
                     <div class="relative flex gap-x-3">
                        <div class="flex h-6 items-center">
                        <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="text-sm leading-6">
                        <label for="candidates" class="font-medium text-gray-900">Candidates</label>
                        <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                        </div>
                     </div>
                     <div class="relative flex gap-x-3">
                        <div class="flex h-6 items-center">
                        <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="text-sm leading-6">
                        <label for="offers" class="font-medium text-gray-900">Offers</label>
                        <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                        </div>
                     </div>
                  </div>
                  </fieldset>
                  <fieldset>
                  <legend class="text-sm font-semibold leading-6 text-gray-900">Push Notifications</legend>
                  <p class="mt-1 text-sm leading-6 text-gray-600">These are delivered via SMS to your mobile phone.</p>
                  <div class="mt-6 space-y-6">
                     <div class="flex items-center gap-x-3">
                        <input id="push-everything" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Everything</label>
                     </div>
                     <div class="flex items-center gap-x-3">
                        <input id="push-email" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Same as email</label>
                     </div>
                     <div class="flex items-center gap-x-3">
                        <input id="push-nothing" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        <label for="push-nothing" class="block text-sm font-medium leading-6 text-gray-900">No push notifications</label>
                     </div>
                  </div>
                  </fieldset>
               </div>
            </div>
         </div>
      
         <div class="mt-6 flex items-center justify-end gap-x-6">
         <button type="button" class="text-sm font-semibold leading-6 text-gray-900">CANCEL</button>
         <x-primary-button>Save</x-primary-button> 
         </div>
   
      </div>
   </form>
 
</x-app-layout> 