@extends('layouts.master')

@section('content')

@include('layouts.partial.sidebar')

 <div class="col-sm-9 col-sm-offset-3 col-md-7 col-md-offset-2 main">
    <h1 class="page-header"> Edit Account</h1>

    <div class="col-lg-6">
        <form class="form-vertical" role="form" method="post" action="userUpdate/{{$user->id}}">
            <div class="form-group">
                <label for="username" class="control-label">User Name</label>
           		<input type="text" name="username" class="form-control" id="name" value="{{$user->username}}">
            </div>
         
           <div class="form-group">
                <label for="email" class="control-label">Email</label>
                <input type="text" name="email" class="form-control" id="name" value="{{$user->email}}">
           </div>
            <div class="form-group">
                <label for="password" class="control-label">Password</label>
         		 <input type="password" name="password" class="form-control" id="password" value="{{$user->password}}">	
           </div>
            <div class="form-group">
                <button type="submit" class="btn bt">Update</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
             {!! method_field('PUT') !!}
        </form>
    </div>
</div>
@stop