@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>welcome {{Auth::user()->name}}</h1>
                </div>              

            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-md-12 ">
            <h2>
                Total user- {{count($users)}}

                <div class="card"  style="background-color:Gray;">
                    User List
                </div>
               <div>
               </div>
                <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Serial No</th>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">Created_at</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            
                            <th scope="row">{{$users->firstItem()+$loop->index}}</th>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->created_at->format('d/m/Y h:i:s A')}}
                                <br>
                                {{$user->created_at->diffForHumans()}}
                            </td>
                           </tr>  
                          
                        @endforeach
                        
                    </tbody>
                  </table>
                  {{$users->links()}}
            </h2>
        </div>
    </div>
</div>
@endsection
