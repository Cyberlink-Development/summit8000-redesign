@extends('admin.master')
@section('title','Add Newsletter')
@section('breadcrumb')
<a href="{{ route('newsletter.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<div class="container">
    <h1>Add Newsletter </h1>

 <form action="{{ route('newsletter.submit') }}" method="POST">
     @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
    <textarea class="form-control my-editor" id="editor2" name="content" rows="50">  </textarea>
  </div>
  <div class="form-group">
      <label  for="exampleCheck1">Publish Date</label>
    <input type="date" name="publish_date" class="form-control" id="exampleCheck1">
  </div>
  <hr/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop
