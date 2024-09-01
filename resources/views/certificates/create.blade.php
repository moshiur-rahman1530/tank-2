@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>Create New Certificate
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('certificates.index') }}"> Back</a>
                </div>
            </h2>
        </div>
    </div>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('certificates.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Id:</strong>
                <input type="text" name="certificate_id" class="form-control" placeholder="Certificate id">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Container Id:</strong>
                <input type="text" name="container_id" class="form-control" placeholder="Container id">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Certificate Name:</strong>
                <!-- <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea> -->
                <input type="text" name="certificate_name" class="form-control" placeholder="Certificate Name">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Test Date:</strong>
                <!-- <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea> -->
                <input type="date" name="test_date" class="form-control" placeholder="Test Date">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Expiration Date:</strong>
                <!-- <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea> -->
                <input type="date" name="expiration_date" class="form-control" placeholder="Expiration Date">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Certificate Cost:</strong>
                <!-- <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea> -->
                <input type="text" name="certificate_cost" class="form-control" placeholder="Certificate Cost">
            </div>
        </div>
        <div class="col-xs-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection