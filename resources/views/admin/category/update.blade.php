@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('add/category')}}">Add Category</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$category_name}}</li>
                </ol>
              </nav>            
            <div class="card-header">
                <h2>Update</h2>
            </div>
            <div class="card-body">
                <form method="post" action="{{url('update/category/post')}}">
                    @csrf
                    <div class="form-group">                      
                   <input type="hidden" name="category_id" value="{{$id}}">
                      <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" value="{{$category_name}}" aria-describedby="emailHelp">
                    </div>                  
                    <button type="submit" class="btn btn-info">update</button>
                  </form>
            </div>
        </div>
    </div>
</div>    
@endsection