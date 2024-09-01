@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-4">
        <div class="pull-left">
            <h2>Certificates
                <div class="float-end">
                    @can('certificate-create')
                    <a class="btn btn-success" href="{{ route('certificates.create') }}"> Create New Certificate</a>
                    @endcan
                </div>
            </h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Container ID</th>
        <th>Name</th>
        <th>Test Date</th>
        <th>Expiration Date</th>
        <th>Certificate Cost</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($certificates as $certificate)
    <tr>
        <td>{{ $certificate->certificate_id }}</td>
        <td>{{ $certificate->container_id }}</td>
        <td>{{ $certificate->certificate_name }}</td>
        <td>{{ $certificate->test_date }}</td>
        <td>{{ $certificate->expiration_date }}</td>
        <td>{{ $certificate->certificate_cost }}</td>
        <td>
            <form action="{{ route('certificates.destroy',$certificate->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('certificates.show',$certificate->id) }}">Show</a>
                @can('certificate-edit')
                <a class="btn btn-primary" href="{{ route('certificates.edit',$certificate->id) }}">Edit</a>
                @endcan


                @csrf
                @method('DELETE')
                @can('certificate-delete')
                <button type="submit" class="btn btn-danger">Delete</button>
                @endcan
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection