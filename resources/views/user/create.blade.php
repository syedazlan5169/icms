<x-app-layout>
    <x-slot name="heading">
        Add New User
    </x-slot>

    <form method="POST" action="/user/create" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        @csrf
        <div class="px-4 py-6 sm:p-8">
           @if(session('success'))
              <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                 <span class="block sm:inline">{{ session('success') }}</span>
              </div>
           @endif
           <div class="space-y-12">
              <div class="border-b border-gray-900/10 pb-12">
                 <h2 class="text-xl font-semibold leading-7 text-gray-900">User Profile</h2>
                 <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-full">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                       <input type="text" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                    </div>
           
                    <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                       <input type="email" name="email" id="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                    </div>
            
                    <div class="col-span-2">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                       <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                    </div>
             
                    <div class="sm:col-span-2">
                    <label for="admin" class="block text-sm font-medium leading-6 text-gray-900">Admin</label>
                    <div class="mt-2">
                       <select id="admin" name="admin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          <option value="1">Yes</option>
                          <option value="0" selected>No</option>
                       </select>
                    </div>
                    </div>

                    <div class="sm:col-span-2">
                    <label for="plan" class="block text-sm font-medium leading-6 text-gray-900">Subscription Plan</label>
                    <div class="mt-2">
                       <select id="plan" name="plan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          <option value="1">Trial</option>
                          <option value="2">Basic</option>
                          <option value="3">Pro</option>
                          <option value="4">Premium</option>
                       </select>
                    </div>
                    </div>
           
                 </div>
              </div>
  
           <div class="mt-6 flex items-center justify-end gap-x-6">
           <x-primary-button type="submit">Save</x-primary-button> 
           </div>
     
        </div>
     </form>
</x-app-layout>
