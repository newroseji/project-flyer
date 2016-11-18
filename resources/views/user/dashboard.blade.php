@extends('debug.app')
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


                @foreach($flyers as $flyer)

                    <div class="row">
                        <div class="col-md-7 col-sm-5 col-xs-6">
                            <a href="/flyers/{{$flyer->zip}}/{{$flyer->street}}">{{$flyer->street}}, {{$flyer->city}}
                                , {{$flyer->zip}} {{$flyer->state}}

                            </a>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-1" >
                            @if (count($flyer->photos)>0)
                                <span title="{{count($flyer->photos)}} photo(s)">
                                {{count($flyer->photos)}}</span> <span class="hidden-xs"> photos</span>
                            @endif
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-4 hidden-xs ">

                            {{$flyer->updated_at}}
                        </div>

                        <div class="col-md-1 col-sm-2 col-xs-5">

<span class="pull-right">
                            <a href="/flyers/{{$flyer->id}}/edit" title="Edit"><i
                                        class="glyphicon glyphicon-pencil"></i></a>
                            &nbsp;
                            <a href="/flyers/{{$flyer->id}}/delete" title="Delete"><i
                                        class="glyphicon glyphicon-trash"></i></a>
</span>

                        </div>
                    </div>
                @endforeach

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