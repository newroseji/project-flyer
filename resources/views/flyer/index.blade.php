
@extends('app')
@section('content')


        <h1>List of flyers</h1>

<ul class="list-group">
@foreach($flyers as $flyer)
    <li class="list-group-item">{{$flyer->street}}, {{$flyer->city}} {{$flyer->zip}} {{$flyer->state}}
    @endforeach
    </ul>
@stop
@section('footer')
    @include("pages.footer")
@stop