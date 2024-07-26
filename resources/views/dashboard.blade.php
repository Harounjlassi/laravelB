<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi.. <b> {{Auth::user()->name}}</b>
           <b style="float:right;"> Total Users <span class="badge bg-danger">{{count($users)}}</span></b>
           
        </h2>
    </x-slot>

    <div class="py-12">
       <div class="container">
       <div class="row">

        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">sL No</th>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">Created At</th>
              </tr>
            </thead>
            <tbody>
                @php($i=1)

                @foreach ($users as $user )
                    
                <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                   {{-- <td>{{ $user->created_at->diffForHumans()}}</td>  --}}
                    <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                  
                </tr>

                @endforeach
            
             
            </tbody>
          </table>
          
         
       </div>
       </div>

    </div>
</x-app-layout>
