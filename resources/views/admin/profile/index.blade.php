@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row " >
        <div class="col-md-6 m-auto">
            <div class="card-header">
                <h2>Profile Edit</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{url('profile/post')}}">
                    @csrf
                    <div class="form-group">
                      @if(session('success_massage'))
                       <div class="alert alert-success">
                         {{session('success_massage')}}
                       </div>
                      @endif 
                      @if(session('profile-update'))
                       <div class="alert alert-success">
                         {{session('profile-update')}}
                       </div>
                      @endif 
                      <label for="exampleInputEmail1"> Name</label>
                      <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{Str::title(Auth::user()->name)}}">
                    </div>

                    @error('name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-info">Change name</button>
                  </form>
            </div>
        </div>
    </div>



    <div class="row mt-5" >
        <div class="col-md-6 m-auto">
            <div class="card-header">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                @if(session('password_change_status'))
                <div class="alert alert-danger">
                   {{session('password_change_status')}}
                </div>
               @endif
                @if($errors->all())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                        
                    @endforeach
                </div>
               @endif
                <form method="post" action="{{url('profile/password')}}">
                    @csrf
                    <div class="form-group"> 
                      <label for="exampleInputEmail1">  old password</label>
                      <input type="text" class="form-control" name="old_password" value="{{old('old_password')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter old password">
                      @error('old_password')
                      <div class="alert alert-danger">
                          {{$message}}
                      </div>
                  @enderror
                    </div>
                    <div class="form-group">     
                        @if(session('profile-update'))
                        <div class="alert alert-success">
                          {{session('profile-update')}}
                        </div>
                       @endif                   
                        <label for="exampleInputEmail1"> password</label>
                        <input type="text" class="form-control" name="password" value="{{old('password')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter password">
                        @error('password')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                    </div>
                    <div class="form-group"> 
                        @if(session('profile-update'))
                        <div class="alert alert-success">
                          {{session('profile-update')}}
                        </div>
                       @endif                      
                        <label for="exampleInputEmail1"> Confirm password</label>
                        <input type="text" class="form-control" name="password_confirmation" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter Confirm password">
                        @error('password_confirmation')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                    </div>

                    
                    <button type="submit" class="btn btn-secondary">Change password</button>
                  </form>
            </div>
        </div>
    </div>
</div>

    
@endsection