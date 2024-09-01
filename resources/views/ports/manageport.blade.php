@extends('layouts.master')

@section('content')
<div id="PortMainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">

            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Port Lists</h6>
                </div>
                <div class="col-md-6"> <button id="addNewPort"
                        class="btn btn-primary btn-sm font-weight-bold float-right"><i class="fas fa-plus"></i> Add
                        New</button></div>
            </div>

            <div class="table-responsive">
                <table id="PortDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Port No</th>
                            <th>Port Code</th>
                            <th>Port Name</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Geolocation</th>
                            <!-- <th>Status</th> -->
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="PortTableBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="loaderPortDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <!-- <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}"> -->
        </div>
    </div>
</div>
<div id="WrongPortDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <h3>Something Went Wrong !</h3>
        </div>
    </div>
</div>




<!-- modal for delete course -->
<div class="modal fade" id="deletePortModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body  text-center">
                <div class="container">
                    <h5 class="modal-title" id="deleteModalPortId"> </h5>
                    <h5 class="modal-title">Are you sure to delete this Port!!</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
                <button id="PortDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>


<!-- modal for adding Port -->
<div class="modal modal-lg fade" id="addPortModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Port</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <form id="addPortdetail" method="POST">
                        @csrf
                        <div class="row">
                            <!-- <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Port No:</strong>
                                    <input type="text" name="port_no" class="form-control" placeholder="Port No">
                                </div>
                            </div> -->

                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Port Code:</strong>
                                    <input type="text" name="port_code" class="form-control" placeholder="Port Code">
                                </div>
                            </div>

                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Port Name:</strong>
                                    <input type="text" name="port_name" class="form-control" placeholder="Port Name">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Country:</strong>
                                    <input type="text" name="country" class="form-control" placeholder="Country">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>City:</strong>
                                    <input type="text" name="city" class="form-control" placeholder="City">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Geolocation:</strong>
                                    <input type="text" name="geolocation" class="form-control"
                                        placeholder="Geolocation">
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button id="PortAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for show Port -->
<div class="modal modal-lg fade" id="ShowsinglePort" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Port No:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPortNo">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Port Code:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPortCode">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Port Name:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPortName">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Country:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPortCountry">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>City:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPortCity">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Geolocation:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPortGeo">
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Back</button>
            </div>
        </div>
    </div>
</div>



<!-- modal for update Ports -->
<div class="modal modal-lg fade" id="UpdatePortModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Port</h5>
                <h5 id="UpdatePortId" class="d-none"> </h5>
                <input id="Update_Port_Id" type="hidden" name="Update_Port_Id">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div id="UpdatePortLoader" class="container">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                    </div>
                </div>
            </div>

            <div id="WrongPortUpdate" class="container d-none">
                <div class="row">
                    <div class="col-md-12 p-5">
                        <h3>Something Went Wrong !</h3>
                    </div>
                </div>
            </div>


            <div class="modal-body d-none" id="updatePortModalDNone">

                <div class="container">
                    <form id="updatePortdetail" method="POST">
                        @csrf
                        <div class="row">
                            <!-- <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Port No:</strong>
                                    <input type="text" name="port_no" class="form-control" placeholder="Port No">
                                </div>
                            </div> -->

                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Port Code:</strong>
                                    <input type="text" id="update_port_code" name="port_code" class="form-control"
                                        placeholder="Port Code">
                                </div>
                            </div>

                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Port Name:</strong>
                                    <input type="text" id="update_port_name" name="port_name" class="form-control"
                                        placeholder="Port Name">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Country:</strong>
                                    <input type="text" id="update_port_country" name="country" class="form-control"
                                        placeholder="Country">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>City:</strong>
                                    <input type="text" id="update_port_city" name="city" class="form-control"
                                        placeholder="City">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Geolocation:</strong>
                                    <input type="text" id="update_port_geolocation" name="geolocation"
                                        class="form-control" placeholder="Geolocation">
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button id="PortUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
            </div>
        </div>
    </div>
</div>


@endsection


@section('script')
<script type="text/javascript">
// window.myBulkSelectCallback = function (data) {
//   the JSON data will come here
//   console.log(data)
// };

getAllPort();

function getAllPort() {
    axios.get('/allPorts').then(function(response) {

        if (response.status == 200) {
            $('#PortMainDiv').removeClass('d-none');
            $('#loaderPortDiv').addClass('d-none');

            $('#PortDataTable').DataTable().destroy();
            $('#PortTableBody').empty();

            var jsonData = response.data;
            $.each(jsonData, function(i, item) {



                $('<tr>').html(
                    "<td>" + jsonData[i].id + "</td>" +
                    "<td>" + jsonData[i].port_code + "</td>" +
                    "<td>" + jsonData[i].port_name + "</td>" +
                    "<td>" + jsonData[i].country + "</td>" +
                    "<td>" + jsonData[i].city + "</td>" +
                    "<td>" + jsonData[i].geolocation + "</td>" +
                    // "<td>" + jsonData[i].status + "</td>" +
                    "<td>@can('port-edit')<a class='PortEditBtn' data-id=" + jsonData[i]
                    .id +
                    "><i class='fas fa-edit'></i></a>&nbsp;&nbsp;&nbsp;@endcan @can('port-list')<a class='showsinglePortdata text-warning'data-id=" +
                    jsonData[i].id +
                    "><i class='fas fa-eye'></i><a>@endcan  @can('port-list') &nbsp;&nbsp;&nbsp;<a class='PortDelete text-danger'data-id=" +
                    jsonData[i].id + "><i class='fas fa-trash'></i><a>@endcan </td>"
                ).appendTo('#PortTableBody');
            });
            // show edit modal
            $('.PortEditBtn').click(function() {
                $('#UpdatePortModal').modal('show');
                var id = $(this).data('id');
                $('#UpdatePortId').html(id);
                $('#Update_Port_Id').val(id);
                updatePortDetails(id);
            });

            // show delete modal
            $('.PortDelete').click(function() {
                $('#deletePortModal').modal('show');
                var id = $(this).data('id');
                $('#deleteModalPortId').html(id);
            });

            // show dingle Port
            $('.showsinglePortdata').click(function() {
                $('#ShowsinglePort').modal('show');
                var id = $(this).data('id');
                showPortdetaildata(id);
            });


            $('#PortDataTable').DataTable({
                "order": false
            });
            $('.dataTables_length').addClass('bs-select');

        } else {
            $('#loaderPortDiv').addClass('d-none');
            $('#WrongUpdate').removeClass('d-none');
        }

    }).catch(function(error) {

        $('#loaderPortDiv').addClass('d-none');
        $('#WrongPortDiv').removeClass('d-none');
    });
}

// detais show in update exampleModalLabel
function updatePortDetails(id) {
    axios.post('/PortsDetails', {
        id: id
    }).then(function(response) {
        if (response.status == 200 && response.data) {
            $('#updatePortModalDNone').removeClass('d-none');
            $('#UpdatePortLoader').addClass('d-none');
            var jsonData = response.data;

            $('#update_port_code').val(jsonData.port_code);
            $('#update_port_name').val(jsonData.port_name);
            $('#update_port_country').val(jsonData.country);
            $('#update_port_city').val(jsonData.city);
            $('#update_port_geolocation').val(jsonData.geolocation);


        } else {
            $('#UpdatePortLoader').addClass('d-none');
            $('#WrongPortUpdate').removeClass('d-none');
        }
    }).catch(function(error) {
        $('#UpdatePortLoader').addClass('d-none');
        $('#WrongPortUpdate').removeClass('d-none');
    })
}

// update Port

$('#PortUpdateConfirmBtn').click(function() {
    var data = {
        'update_port_code': $('#update_port_code').val(),
        'update_port_name': $('#update_port_name').val(),
        'update_port_country': $('#update_port_country').val(),
        'update_port_city': $('#update_port_city').val(),
        'update_port_geolocation': $('#update_port_geolocation').val(),

    }

    var data_id = $('#Update_Port_Id').val();
    const url = "/updatePort/" + data_id;

    $('#PortUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post(url, data).then(function(response) {
        $('#PortUpdateConfirmBtn').html("Save");
        if (response.status == 200) {
            if (response.data == 1) {
                $('#UpdatePortModal').modal('hide');
                toastr.success('Update Port Success');
                getAllPort();
            } else {
                $('#UpdatePortModal').modal('hide');
                toastr.error('Update Port Fail');
                getAllPort();
            }
        } else {
            $('#UpdatePortModal').modal('hide');
            toastr.error('Something Went Wrong !');
        }
    }).catch(function(error) {
        $('#UpdatePortModal').modal('hide');
        toastr.error('Something Went Wrong !');
    })
})

// status update
function showPortdetaildata(id) {
    axios.post('/showsinglePort', {
        id: id
    }).then(function(response) {
        if (response.status == 200 && response.data) {

            var jsonData = response.data;

            $('#showPortNo').text(jsonData.id);
            $('#showPortCode').text(jsonData.port_code);
            $('#showPortName').text(jsonData.port_name);
            $('#showPortCountry').text(jsonData.country);
            $('#showPortCity').text(jsonData.city);
            $('#showPortGeo').text(jsonData.geolocation);


        } else {
            toastr.error('Something Went Worng!!');
        }
    }).catch(function(error) {
        toastr.error(error);
    })
}


// delete categoryDeleteBtn

$('#PortDeleteConfirmBtn').click(function() {
    var id = $('#deleteModalPortId').html();
    $('#PortDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post('/PortsDelete', {
        id: id
    }).then(function(response) {
        $('#PortDeleteConfirmBtn').html('Yes');
        if (response.status == 200) {
            if (response.data == 1) {
                $('#deletePortModal').modal('hide');
                toastr.success('Port delete successfully!!');
                getAllPort();
            } else {
                $('#deletePortModal').modal('hide');
                toastr.error('Port delete fail!!');
                getAllPort();
            }
        } else {
            $('#deletePortModal').modal('hide');
            toastr.error('Something Went Worng!!');
        }

    }).catch(function(error) {
        $('#deletePortModal').modal('hide');
        toastr.error('Something Went Worng!!');
    })
})

// add new Port
$('#addNewPort').click(function() {
    $('#addPortModal').modal('show');
})

$('#PortAddConfirmBtn').click(function() {
    var data = $("#addPortdetail").serialize();
    addPort(data);

})

function addPort(data) {
    const url = '{{ route("ports.store") }}';
    $('#PortAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post(url, data).then(function(response) {
        $('#PortAddConfirmBtn').html("Save");
        if (response.status == 200) {
            if (response.data == 1) {
                $('#addPortModal').modal('hide');
                toastr.success('Add Success');
                getAllPort();
            } else {
                $('#addPortModal').modal('hide');
                toastr.error('Add Fail');
                getAllPort();
            }
        }
    }).catch(function(error) {
        $('#addPortModal').modal('hide');
        toastr.error('Something Went Wromg');
    });
}
</script>
@endsection