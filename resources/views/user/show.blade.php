<x-app-layout>
    <x-slot name="heading">
        Edit User
    </x-slot>

    <form method="POST" action="/user/{{ $user->id }}" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
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
                 <h2 class="text-xl font-semibold leading-7 text-gray-900">User Profile</h2>
                 <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                  <div class="sm:col-span-4 col-span-1">
                  <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                  <div class="mt-2">
                     <input type="text" name="name" id="name" value="{{ $user->name }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>
  
                  <div class="sm:col-span-2 col-span-1">
                     <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Phone</label>
                     <div class="mt-2">
                        <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                     </div>
                  </div>        
        
                  <div class="sm:col-span-2 col-span-1">
                  <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                  <div class="mt-2">
                     <input type="email" name="email" id="email" value="{{ $user->email }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>

                  <div class="sm:col-span-2 col-span-1">
                  <label for="password" class="block text-sm font-bold leading-6 text-red-500">Password (Set New)</label>
                  <div class="mt-2">
                     <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                  </div>
                  </div>
            
                  <div class="sm:col-span-2 col-span-1">
                  <label for="is_admin" class="block text-sm font-medium leading-6 text-gray-900">Admin</label>
                  <div class="mt-2">
                     <select id="is_admin" name="is_admin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option value="1" {{ $user->is_admin == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $user->is_admin == '0' ? 'selected' : '' }}>No</option>
                     </select>
                  </div>
                  </div>

                  <div class="sm:col-span-2 col-span-1">
                     <fieldset>
                         <legend class="block text-sm font-medium leading-6 text-gray-900">Subscription Plan</legend>
                         <div class="mt-6 grid grid-cols-3 gap-6">
                             <div class="flex items-center">
                                 <input id="admin" name="subscription_id" value="1" type="radio" checked class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" {{ $user->subscription_id == '1' ? 'checked' : ''}}>
                                 <label for="admin" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Admin</label>
                             </div>
                             <div class="flex items-center">
                                 <input id="trial" name="subscription_id" value="2" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600"  {{ $user->subscription_id == '2' ? 'checked' : ''}}>
                                 <label for="trial" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Trial</label>
                             </div>
                             <div class="flex items-center">
                                 <input id="basic" name="subscription_id" value="3" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600"  {{ $user->subscription_id == '3' ? 'checked' : ''}}>
                                 <label for="basic" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Basic</label>
                             </div>
                             <div class="flex items-center">
                                 <input id="pro" name="subscription_id" value="4" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600"  {{ $user->subscription_id == '4' ? 'checked' : ''}}>
                                 <label for="pro" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Pro</label>
                             </div>
                             <div class="flex items-center">
                                 <input id="premium" name="subscription_id" value="5" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" {{ $user->subscription_id == '5' ? 'checked' : ''}}>
                                 <label for="premium" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Premium</label>
                             </div>
                         </div>
                     </fieldset>
                 </div>
                 
                  <div class="sm:col-span-2 col-span-1">
                  <label for="subscription_start_date" class="block text-sm font-medium leading-6 text-gray-900">Subscription Start</label>
                  <div class="mt-2">
                     <input type="date" name="subscription_start_date" id="subscription_start_date" value="{{ $user->subscription_start_date }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                  </div>
                  </div>

                  <div class="sm:col-span-2 col-span-1">
                  <label for="subscription_end_date" class="block text-sm font-medium leading-6 text-gray-900">Subscription End</label>
                  <div class="mt-2">
                     <input type="date" name="subscription_end_date" id="subscription_end_date" value="{{ $user->subscription_end_date }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"  required>
                  </div>
                  </div>
           
              </div>
              <div class="mt-10">
               @if($errors->any)
                   <ul>
                       @foreach($errors->all() as $error)
                           <li class="text-red-500 italic">{{ $error }}</li>
                       @endforeach
                   </ul>
               @endif
               </div> 
           <div class="mt-6 flex items-center justify-end gap-x-6">
           <x-primary-button type="submit">Update</x-primary-button> 
           </div>
     
        </div>
     </form>
</x-app-layout>

