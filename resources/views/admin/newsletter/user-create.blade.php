@extends('admin.master')
@section('title','Create User')
@section('breadcrumb')
<a href="{{ route('subscriber.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<div class="container">
    <h1>Add User </h1>

 <form action="{{ route('subscriber.submit') }}" method="POST">
     @csrf  
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
 <br/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>


@stop
