@extends('layouts.masterlayouts')
@section('title')
    Home
@endsection
@section('main-content')
@foreach ($user as $item)
    {{$item->email}}
@endforeach
@endsection