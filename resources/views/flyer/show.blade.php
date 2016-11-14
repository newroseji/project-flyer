@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('app')
@section('content')


    <h1>{!! $flyer->street !!}</h1>
    <h3>{!! $flyer->price !!}</h3>
    <hr>
    <div class="description">
        {!! $flyer->description !!}
    </div>





@stop
@section('footer')
    @include("pages.footer")
@stop