@extends('layouts.front')
@section('title','Contáctanos')
@section('content')
    @if(!session('success'))
        @include('front.contact')
    @else
        @include('front.contactSuccess')
    @endif
@endsection