@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>Edit certificate

                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('certificates.index') }}"> Back</a>
                </div>
            </h2>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('certificates.update', $certificate->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Certificate Id:</strong>
                <input type="text" name="certificate_id" value="{{ $certificate->certificate_id }}" class="form-control"
                    placeholder="Certificate id">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Container Id:</strong>
                <input type="text" name="container_id" value="{{ $certificate->container_id }}" class="form-control"
                    placeholder="Container id">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Certificate Name:</strong>
                <input type="text" name="certificate_name" value="{{ $certificate->container_id }}" class="form-control"
                    placeholder="Certificate Name">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Test Date:</strong>
                <input type="date" name="test_date" value="{{ $certificate->test_date }}" class="form-control"
                    placeholder="Test Date">
            </div>
        </div>

        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Expiration Date:</strong>
                <input type="date" name="expiration_date" value="{{ $certificate->expiration_date }}"
                    class="form-control" placeholder="Expiration Date">
            </div>
        </div>
        <div class="col-xs-12 mb-3">
            <div class="form-group">
                <strong>Certificate Cost:</strong>
                <input type="text" name="certificate_cost" value="{{ $certificate->certificate_cost }}"
                    class="form-control" placeholder="Certificate Cost">
            </div>
        </div>

        <div class="col-xs-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection