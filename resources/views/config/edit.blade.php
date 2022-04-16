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
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <img height="100" width="100"  src="/images/{{$data->image}}" alt="image"/>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="name">Name Application</label>
                                <input type="text" class="form-control" id="name" name="name" >
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <!-- <input type="text" class="form-control" id="fullName" placeholder=""> -->
                                <textarea name="description" id="" cols="30" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="addresss">Address</label>
                                <input type="text" class="form-control" id="addresss" name="addresss" >
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Number Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
        </div>
    </div>

@endsection