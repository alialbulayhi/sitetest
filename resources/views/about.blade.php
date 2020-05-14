@extends('layouts.app')
@section('title', __('About me'))
@section('content')
    @include('_partials._closed_alert')

   <h2>Welcome to my website, {{$userName}}</h2>
  <a href="clear-my-name">clear my name</a>


@endsection
