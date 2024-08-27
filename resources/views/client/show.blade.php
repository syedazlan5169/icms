<x-app-layout>
    <x-slot name="heading">
       Client Info 
    </x-slot>

   <h2>{{ $client->id }}</h2> 
   <h2>{{ $client->name }}</h2> 
   <h2>{{ $client->mykad_ssm }}</h2> 
   <h2>{{ $client->category }}</h2> 
   <h2>{{ $client->status }}</h2> 
</x-app-layout>
