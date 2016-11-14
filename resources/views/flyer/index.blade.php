
@extends('app')
@section('content')


        <h1>List of flyers</h1>

<ul class="list-group">
@foreach($flyers as $flyer)
    <li class="list-group-item">
        <a href="flyers/{{$flyer->zip}}/{{$flyer->street}}">{{$flyer->street}}, {{$flyer->city}}, {{$flyer->zip}} {{$flyer->state}}</a>
    </li>
    @endforeach
    </ul>
@stop
@section('footer')
    @include("pages.footer")
@stop