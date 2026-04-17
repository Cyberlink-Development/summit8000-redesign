@extends('admin.master')
@section('title','Update User')
@section('breadcrumb')
<a href="{{ route('subscriber.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<div class="container">
    <h1>Edit user </h1>

  <form action="{{ route('subscriber.edit') }}" method="POST">
        <input type="hidden" name="id" value="{{ $data->id }}">

     @csrf
 
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="email" value="{{ $data->email }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
 <br/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop
