@extends('layouts.master')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2> Show Crtificate
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('certificates.index') }}"> Back</a>
                </div>
            </h2>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>ID:</strong>
            {{ $certificate->certificate_id }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Container ID:</strong>
            {{ $certificate->contaner_id }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $certificate->certificate_name }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Test Date:</strong>
            {{ $certificate->test_date }}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Expiration Date:</strong>
            {{ $certificate->expiration_date}}
        </div>
    </div>
    <div class="col-xs-12 mb-3">
        <div class="form-group">
            <strong>Certificate Cost:</strong>
            {{ $certificate->certificate_cost}}
        </div>
    </div>
</div>
@endsection