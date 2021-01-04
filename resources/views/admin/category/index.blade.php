@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
      @if (session('update_status'))
          <div class="col-md-12 bg-info">            
              {{session('update_status')}}           
          </div>
      @endif
      @if (session('delete_status'))
          <div class="col-md-12 bg-info">            
              {{session('delete_status')}}           
          </div>
      @endif          
      @if (session('restore-status'))
          <div class="col-md-12 bg-info">            
              {{session('restore-status')}}           
          </div>
      @endif          
      @if (session('herddel-status'))
          <div class="col-md-12 bg-info">            
              {{session('herddel-status')}}           
          </div>
      @endif          
        <div class="col-md-9">          
            <div class="card-header">
                <h2>Category List(Active)</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Serial No</th>
                        <th scope="col"> Category Name</th>
                        <th scope="col"> Added By</th>
                        <th scope="col"> Created at</th>
                        <th scope="col"> Last Update</th>
                        <th scope="col"> Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($categoris as $categori)
                        <tr>  
                         <td>{{$loop->index+1}}</td>
                         <td>{{$categori->category_name}}</td>
                         <td>{{ App\user::find($categori->user_id)->name}}</td>
                         <td>
                          @if($categori->created_at) 
                          {{$categori->created_at->diffForHumans()}}
                       @else
                          No show time
                       @endif
                         </td>
                         <td>
                          @if($categori->updated_at) 
                          {{$categori->updated_at->diffForHumans()}}
                       @else
                          --
                       @endif
                         </td>
                             <td>
                                <div>
                                    <a href="{{url('update/category')}}/{{$categori->id}}" type="button" class="btn btn-success" >Update</a>
                                    <a type="button" href="{{url('delete/category')}}/{{$categori->id}}" class="btn btn-danger">Delete</a>
                                </div>    
                             </td>
                        </tr> 
                        @empty
                        <tr>
                            <td colspan="50" class="text-center">no data show</td>
                        </tr>
                            
                        @endforelse   
                    </tbody>
                  </table>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card-header">
                <h2>Category Add</h2>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{url('add/category/post')}}">
                    @csrf
                    <div class="form-group">
                      @if(session('success_massage'))
                       <div class="alert alert-success">
                         {{session('success_massage')}}
                       </div>
                      @endif 
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="category" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                    </div>
                    @error('category_name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="form-group">
                        
                        <label >Category Photo</label>
                        <input type="file" class="form-control" name="category_photo">
                      </div>
                      @error('category_photo')
                          <div class="alert alert-danger">
                              {{$message}}
                          </div>
                      @enderror
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </form>
            </div>
        </div>




        <div class="col-md-9">          
            <div class="card-header bg-danger">
                <h2>Category List(Delete)</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Serial No</th>
                        <th scope="col"> Category Name</th>
                        <th scope="col"> Added By</th>
                        <th scope="col"> Created at</th>
                        <th scope="col"> Last Update</th>
                        <th scope="col"> Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @forelse ($resets as $reset)
                        <tr>  
                         <td>{{$loop->index+1}}</td>
                         <td>{{$reset->category_name}}</td>
                         <td>{{ App\user::find($reset->user_id)->name}}</td>
                         <td>
                          @if($reset->created_at) 
                          {{$reset->created_at->diffForHumans()}}
                       @else
                          No show time
                       @endif
                         </td>
                         <td>
                          @if($reset->updated_at) 
                          {{$reset->updated_at->diffForHumans()}}
                       @else
                          --
                       @endif
                         </td>
                             <td>
                                <div>
                                    <a href="{{url('restore/category')}}/{{$reset->id}}" type="button" class="btn btn-success" >restore</a>
                                    <a type="button" href="{{url('hdelete/category')}}/{{$reset->id}}" class="btn btn-danger">Delete</a>
                                </div>    
                             </td>
                        </tr> 
                        @empty
                        <tr>
                            <td colspan="50" class="text-center">no data show</td>
                        </tr>
                            
                        @endforelse   
                    </tbody>
                  </table>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card-header">
                <h2>Category Add</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{url('add/category/post')}}">
                    @csrf
                    <div class="form-group">
                      @if(session('success_massage'))
                       <div class="alert alert-success">
                         {{session('success_massage')}}
                       </div>
                      @endif 
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="category" class="form-control" name="category_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                    </div>

                    @error('category_name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Add Category</button>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection