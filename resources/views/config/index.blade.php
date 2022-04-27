@extends('layouts.layout')
@section('content')
<div>

@if($errors)
        @foreach($errors->all() as $error)
          <div class="text-danger">{{$error}}</div>
        @endforeach
      @endif

    @if ($message = Session::get('success'))
        <br>
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
</div>
<div class="container mt-5">
           
        <div class="container-fluid">

<!-- Breadcrumbs-->

<!-- DataTables Example -->
<div class="card mb-3" style="background: #54657d;">
  <div class="card-header" style="font-size: 22px;font-weight: 600;color: antiquewhite;">
    <i class="fas fa-table"></i> Manage App Config
  </div>
  <div class="card-body">
    <div class="table-responsive">

      <form method="POST" action="{{url('save')}}"  enctype="multipart/form-data">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>Name Super Market</th>
                <td><input @if($config) value="{{$config->name}}" @endif type="text" name="name" class="form-control" /></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><input @if($config) value="{{$config->description}}" @endif type="text" name="description" class="form-control" /></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><input @if($config) value="{{$config->address}}" @endif type="text" name="address" class="form-control" /></td>
            </tr>
            <tr>
                <th>Telephone Number</th>
                <td><input @if($config) value="{{$config->telephone}}" @endif type="text" name="telephone" class="form-control" /></td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td><input @if($config) value="{{$config->mobile}}" @endif type="text" name="mobile" class="form-control" /></td>
            </tr>
            <tr>
                <th>Logo</th>

                <td>
                @if($config)<div class="row">
                 <div class="col-md-6"> <img src="{{ URL::to('/images') }}/{{ $config->logo }}" alt="Logo Image" class="rounded-circle" width="100" height="100"></div>
                 <div class="col-md-6">  <input type="file" name="logo" class="form-control" /></div>
                </div>@endif
              </td>
            </tr>
           
            <tr>
                <td colspan="2">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </td>
            </tr>
        </table>
      </form>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
           
    </div>

@endsection