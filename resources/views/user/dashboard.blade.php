@extends('app')

@section('content')
    <h2>Dashboard</h2>
    <div class="panel panel-default">
        <div class="panel-heading">

            <div class="panel-heading-custom">
                <h3>Flyers</h3>
                <h3><a href="/flyers/create"> <i class="glyphicon glyphicon-plus-sign"></i> </a></h3>
            </div>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                @foreach($flyers as $flyer)
                    <li class="list-group-item">
                        <a href="flyers/{{$flyer->zip}}/{{$flyer->street}}">{{$flyer->street}}, {{$flyer->city}}, {{$flyer->zip}} {{$flyer->state}}</a>
                @endforeach
            </ul>
            <div class="text-center">
                {!! $flyers->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>
@stop
@section('footer')
    @include("pages.footer")
@stop