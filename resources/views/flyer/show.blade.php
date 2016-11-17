@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('layouts.layout')
@section('page-title','Show Flyer')
@section("styles")
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">
@stop
@section('content')


    <div class="col-md-3 margin-top-20">
        <h3>{{ $flyer->street }}</h3>
        @if ( \Auth::user() && \Auth::user()->owns($flyer))
            <a href="/flyers/{{$flyer->id}}/edit" class="pull-right" title="Edit"><i
                        class="glyphicon glyphicon-pencil"></i></a>
        @endif

        <h4>${{number_format($flyer->price) }}</h4>
        <hr>


        <div class="description">
            {!! $flyer->description !!}
        </div>
    </div>
    <div class="col-md-9">

        <div class="row">
            <div class="col-md-12 photo-locker margin-top-20" id="flyer-photos">
                @foreach($flyer->photos->chunk(4) as $set)


                    @foreach($set as $photo)
                        <div class="col-md-3 col-sm-4 photo-locker-photo">
                            @if ( \Auth::user() && \Auth::user()->owns($flyer))
                                {!! link_to('Delete',"/photos/{$photo->id}",'DELETE',"col-md-3 col-sm-3 delFrm") !!}
                            @endif

                            <a href="/{{$photo->photo_path}}" data-lity>
                                <img src="/{{$photo->thumbnail_path}}" alt="{{$photo->caption}}"/>
                            </a>

                        </div>
                    @endforeach



                @endforeach
            </div>
        </div>

        @if ( \Auth::user() && \Auth::user()->owns($flyer))
            <div class="row">
                <form id="addPhotosForm"
                      action="{{ route('store_photo_path',[$flyer->zip,$flyer->street]) }}"
                      class="dropzone">
                    {!! csrf_field() !!}
                </form>
            </div>

        @endif
    </div>


@stop


@section('footer')
    @include("pages.footer")
@stop
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 10,
            acceptedFiles: '.jpg,.jpeg,.png,.bmp'
        }
    </script>

    <script src="https://js.pusher.com/3.2/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        // Pusher.logToConsole = true;

        var pusher = new Pusher('7d423c90aa6bd61758af', {
            encrypted: true
        });

        var channel = pusher.subscribe('pushPhotosChannel');
        channel.bind('projectFlyerPhotos', function (data) {


            var imgObject = '<div class="col-md-3 col-sm-4 photo-locker-photo"><form method="POST" class="col-md-3 col-sm-3 delFrm" action="/photos/' + data.id + '"><input name="_method" value="DELETE" type="hidden">' +
                    '<input type="hidden" name="_token" value="<?= csrf_token() ?>">' +
                            '<button class="glyphicon glyphicon-trash" type="submit" title="Delete"></button></form>' +
                    '<a href="/' + data.photo_path + '" data-lity>' +
                    '<img src="/' + data.thumbnail_path + '" alt=""></a></div>';

            $('#flyer-photos').append(imgObject);
        });
    </script>

    <script>
        $('.delFrm').submit(function (event) {
            swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this imaginary file!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel please!",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            swal("Deleted!", "The photo has been deleted.", "success");
                            $('.delFrm').submit();
                        }
                        else {
                            console.log('activated');
                            swal("Cancelled", "The photo is safe.", "error");
                            event.preventDefault();
                        }

                    });


        });
    </script>
@stop