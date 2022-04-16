@extends('layouts.layout')
@section('content')
<h2 style="text-align: center; color:white; margin-top:20px;">Application Config</h2>
<div>
    @if ($message = Session::get('success'))
        <br>
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
</div>
<div class="container mt-5">
        <div class="">
            <div class="">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="row">
                    @foreach ($config as $conf)
                       
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="name">Name Application</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$conf->name}}" style="background-color: #527089;" readonly>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description"  value="{{$conf->description}}" style="background-color: #527089;" readonly>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$conf->address}}" style="background-color: #527089;" readonly>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{$conf->telephone}}" style="background-color: #527089;" readonly>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Number Phone</label>
                                <input type="text" class="form-control" id="phone" name="mobile" value="{{$conf->mobile}}" style="background-color: #527089;" readonly>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Logo</label>
                                <img height="100" width="100"  src="/images/{{$conf->logo}}" alt="image"/>
                            </div>
                        </div>
                        @endforeach
                        <a href="{{ route('config.create') }}" class="btn btn-primary btn-block text-uppercase mb-3">Add new Settings</a>

                    </div>
                </div>
            </div>
       
        </div>
    </div>

@endsection