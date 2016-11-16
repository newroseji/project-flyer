@extends('app')
@section('page-title','User Dashboard')
@section('content')
    <h2>Dashboard</h2>

    <div class="panel panel-default">
        <div class="panel-heading">

            <div class="panel-heading-custom">
                <h3>My Flyers</h3>
                <h3><a href="/flyers/create"> <i class="glyphicon glyphicon-plus-sign"></i> </a></h3>
            </div>
        </div>
        <div class="panel-body">

            @if(count($flyers)>0)

                <ul class="list-group">
                    @foreach($flyers as $flyer)
                        <li class="list-group-item">
                        <span>
                        <a href="/flyers/{{$flyer->zip}}/{{$flyer->street}}">{{$flyer->street}}, {{$flyer->city}}
                            , {{$flyer->zip}} {{$flyer->state}}</a>
                            </span>
                            <span class="pull-right">{{$flyer->updated_at}}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="text-center">
                    {!! $flyers->appends(Request::except('page'))->render() !!}
                </div>
            @else
                <span class="badge badge-warning">No flyers found.</span>
            @endif
        </div>
    </div>
@stop
@section('footer')
    @include("pages.footer")
@stop