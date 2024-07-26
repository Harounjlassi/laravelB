<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category<b> </b>
           
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                            
                      
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-header">
                            All Category
                        </div>
                            
                            
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">sL No</th>
                                        <th scope="col">Category NAME</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    {{-- @php($i=1) --}}
                                    @foreach ($categories as $category )
                                        
                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                        
                                        <td>{{ $category->category_name}}</td>
                                        
                                        {{-- // one to many relationship fel model eloquent ORM --}}
                                        {{-- <td>{{ $category->user->name}}</td> --}}


                                        {{-- // one to many relationship using query builder --}}
                                        <td>{{ $category->name}}</td>

                                        
                                        
                                        <td>
                                            @if($category->created_at==NULL)
                                            <span class="text-danger">No Date Set</span>
                                            @else
                                            {{--  using query builer --}}
                                            {{-- {{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}} --}}
                                            {{--  using eloquent --}}

                                            {{ $category->created_at->diffForHumans()}}
                                            @endif

                                        </td> 
                                        <td > 
                                            <a href="{{ url('categorie/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('softdelete/category/'.$category->id)}}" class="btn btn-danger">delete</a>
                                        </td> 

                                    </tr>
                    
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                            
                            
                        </div>





                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Add Category
                        </div>
                        <div class="card-body">

                            <form action="{{route('store.category')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Categpry Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="category_name">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                            
            </div>
            
        </div>



{{-- //Trash PArt --}}

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                      
                        <div class="card-header">
                            Trash List
                        </div>
                            
                            
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">sL No</th>
                                        <th scope="col">Category NAME</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    {{-- @php($i=1) --}}
                                    @foreach ($trachCat as $category )
                                        
                                    <tr>
                                        <th scope="row">{{$categories->firstItem()+$loop->index}}</th>
                                        
                                        <td>{{ $category->category_name}}</td>
                                        
                                        {{-- // one to many relationship fel model eloquent ORM --}}
                                        {{-- <td>{{ $category->user->name}}</td> --}}


                                        {{-- // one to many relationship using query builder --}}
                                        <td>{{ $category->name}}</td>

                                        
                                        
                                        <td>
                                            @if($category->created_at==NULL)
                                            <span class="text-danger">No Date Set</span>
                                            @else
                                            {{--  using query builer --}}
                                            {{-- {{ Carbon\Carbon::parse($category->created_at)->diffForHumans()}} --}}
                                            {{--  using eloquent --}}

                                            {{ $category->created_at->diffForHumans()}}
                                            @endif

                                        </td> 
                                        <td > 
                                            <a href="{{ url('categorie/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                            <a href="" class="btn btn-danger">delete</a>
                                        </td> 

                                    </tr>
                    
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                            
                            
                        </div>





                </div>
            
            
        </div>

        </div>
        </div>
        </div>
    </x-app-layout>
    