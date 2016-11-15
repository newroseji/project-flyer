@inject('countries','App\Http\Utilities\Country')
@inject('states','App\Http\Utilities\State')
@extends('app')
@section('content')

    <div class="container col-md-10 col-md-offset-1">
        <h1>User profile</h1>
            <div class="row">
                <!-- Firstname Form Input -->
                <div class="form-group col-md-4">
                    <label for="firstname">First Name:</label> <span class="required">*</span>
                    <span class="form-control">{{$user->firstname}}</span>
                </div>

                <!-- Middlename Form Input -->
                <div class="form-group col-md-4">
                    <label for="middlename">Middle Name:</label>
                    <span class="form-control">{{$user->middlename}}</span>
                </div>

                <!-- Lastname Form Input -->
                <div class="form-group col-md-4">
                    <label for="lastname">Last Name:</label> <span class="required">*</span>
                    <span class="form-control">{{$user->lastname}}</span>
                </div>
            </div>
            <div class="row">
                <!-- Username Form Input -->
                <div class="form-group col-md-4">
                    <label for="username">Username:</label> <span class="required">*</span>
                    <span class="form-control">{{$user->username}}</span>
                </div>

                <!-- Email Form Input -->
                <div class="form-group col-md-4">
                    <label for="email">Email:</label> <span class="required">*</span>


                        <span class="form-control">{{$user->email}}</span>


                </div>
            </div>
            <div class="row">
                <!-- Address1 Form Input -->
                <div class="form-group col-md-4">
                    <label for="address1">Address1:</label>
                    <span class="form-control">{{$user->address1}}</span>
                </div>

                <!-- Address2 Form Input -->
                <div class="form-group col-md-4">
                    <label for="address2">Address2:</label>
                    <span class="form-control">{{$user->address2}}</span>
                </div>

                <!-- City Form Input -->
                <div class="form-group col-md-4">
                    <label for="city">City:</label>
                    <span class="form-control">{{$user->city}}</span>
                </div>


            </div>
            <div class="row">

                <!-- Country Form Input -->
                <div class="form-group col-md-4">
                    <label for="country">Country:</label>
                    <span class="form-control">{{array_get($countries::all(),$user->country)}}</span>

                </div>

                <!-- State Form Input -->
                <div class="form-group col-md-4">
                    <label for="state">State:</label>

                    <span class="form-control">{{array_get($states::all(),$user->state)}}</span>

                </div>
                <!-- Zip/Postal code Form Input -->
                <div class="form-group col-md-4">
                    <label for="zip">Zip:</label>
                    <span class="form-control">{{$user->zip}}</span>
                </div>
            </div>


            <div class="row">
                &nbsp;
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <a href="/user/edit/{{$user->id}}" class="btn btn-primary btn-wide"><i class="glyphicon glyphicon-edit"></i> Edit</a>&nbsp;

                </div>

            </div>


    </div>
@stop
@section('footer')
    @include("pages.footer")
@stop