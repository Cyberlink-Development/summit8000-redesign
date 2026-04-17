@extends('admin.master')
@section('title','User List')
@section('breadcrumb')
<a href="{{ route('newsletter.index') }}" class="btn btn-primary btn-sm">Newsletter List</a>
@endsection
@section('content')

<div class="container">
    <h1>Edit Newsletter </h1>

 <form action="{{ route('newsletter.edit') }}" method="POST">
    <input type="hidden" name="id" value="{{ $data->id }}">
     @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" class="form-control" name="title" value="{{ $data->title }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
     <textarea class="form-control my-editor" id="editor2" name="content"
                                          rows="20"> 
        {!! $data->content !!}
    </textarea>
  </div>
  <div class="form-group">
      <label  for="exampleCheck1">Publish Date</label>
    <input type="date" name="publish_date" class="form-control" value="{{ $data->publish_date }}" id="exampleCheck1">
  </div>
  <hr/>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop
