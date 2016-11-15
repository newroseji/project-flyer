
@extends('app')
@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">

            <div class="panel-heading-custom">
                <h2>List of flyers</h2>
                <h3><a href="/flyers/create"> <i class="glyphicon glyphicon-plus-sign"></i> </a></h3>
            </div>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                @foreach($flyers as $flyer)
                    <li class="list-group-item">
                        <a href="/flyers/{{$flyer->zip}}/{{$flyer->street}}">{{$flyer->street}}, {{$flyer->city}}, {{$flyer->zip}} {{$flyer->state}}</a>
                    </li>
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