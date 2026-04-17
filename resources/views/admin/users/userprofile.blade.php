@extends('admin.master')
@section('title','Dashboard')
@section('content')
@if($data)
Name : {{$data->name}} <br/>
Email: {{$data->email}} <br/>
PIN  : {{$data->pin}} <br/>
@endif
@endsection