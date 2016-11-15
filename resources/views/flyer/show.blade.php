@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('app')

@section("styles")
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" rel="stylesheet">
@stop
@section('content')

    <br/>
    <div class="col-md-3">
        <h3>{!! $flyer->street !!}</h3>

        <h4>{!! $flyer->price !!}</h4>
        <hr>


        <div class="description">
            {!! $flyer->description !!}
        </div>
    </div>
    <div class="col-md-9">

        <div class="row">
            <div class="col-md-12 photo-locker">
            @foreach($flyer->photos->chunk(4) as $set)
                <div class="row">

                    @foreach($set as $photo)
                        <div class="col-md-3">
                        {!! link_to('Delete',"/photos/{$photo->id}",'DELETE') !!}

                        <a href="/{{$photo->photo_path}}" data-lity>
                            <img src="/{{$photo->thumbnail_path}}" alt="{{$photo->caption}}"/>
                        </a>
                        </div>
                    @endforeach

                </div>
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
            maxFilesize: 5,
            acceptedFiles: '.jpg,.jpeg,.png,.bmp'
        }
    </script>
@stop