@extends('layouts.master')

@section('content')
<div id="TankMainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">

            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Tank Lists</h6>
                </div>
                <div class="col-md-6"> <button id="addNewTank"
                        class="btn btn-primary btn-sm font-weight-bold float-right"><i class="fas fa-plus"></i> Add
                        New</button></div>
            </div>

            <div class="table-responsive">
                <table id="TankDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tank ID</th>
                            <th>Tank Number</th>
                            <th>Tank owner</th>
                            <th>Manufacturing date</th>
                            <th>Current po certificate</th>
                            <th>Certificate Name</th>
                            <th>Certificate Cost</th>
                            <th>Last test date</th>
                            <th>Expired date</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="TankTableBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="loaderTankDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <!-- <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}"> -->
        </div>
    </div>
</div>
<div id="WrongTankDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <h3>Something Went Wrong !</h3>
        </div>
    </div>
</div>




<!-- modal for delete course -->
<div class="modal fade" id="deleteTankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <h5 class="modal-title" id="deleteModalTankId"> </h5>
                    <h5 class="modal-title">Are you sure to delete this Tank!!</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
                <button id="TankDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>


<!-- modal for adding Tank -->
<div class="modal modal-lg fade" id="addTankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Tank</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="addtankdetail" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Tank number:</strong>
                                    <input type="text" name="tank_number" class="form-control"
                                        placeholder="tank_number">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Tank owner:</strong>
                                    <input type="text" name="tank_owner" class="form-control" placeholder="tank_owner">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Manufacturing date:</strong>
                                    <input type="date" name="manufacturing_date" class="form-control"
                                        placeholder="manufacturing_date">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Current PO Certificate No:</strong>
                                    <input type="text" name="current_po_certificate" class="form-control"
                                        placeholder="current_po_certificate">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Certificate Name:</strong>
                                    <input type="text" name="certificate_name" class="form-control"
                                        placeholder="Certificate Name">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Certificate Cost:</strong>
                                    <input type="text" name="certificate_cost" class="form-control"
                                        placeholder="Certificate Cost">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Last test date:</strong>
                                    <input type="date" name="last_test_date" class="form-control"
                                        placeholder="last_test_date">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Expired date:</strong>
                                    <input type="date" name="expired_date" class="form-control"
                                        placeholder="expired_date">
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button id="TankAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for updae status -->
<div class="modal modal-lg fade" id="ShowsingleTank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                    <p> <strong>Tank Number:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTankNo">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Tank owner:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTankowner">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Manufacturing date:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTankmanufdate">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Current po certificate:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTankCurrpo">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Certificate Name:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTankCertificatename">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Certificate Cost:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTankcertificatecost">
                                    </p>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Last test date:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTanklasttestdate">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Expired date:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTankexpiredate">
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Status:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showTankstatus">
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



<!-- modal for update Tanks -->
<div class="modal modal-lg fade" id="UpdateTankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Tank</h5>
                <h5 id="UpdateTankId" class="d-none"> </h5>
                <input id="Update_Tank_Id" type="hidden" name="Update_Tank_Id">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div id="UpdateTankLoader" class="container">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                    </div>
                </div>
            </div>

            <div id="WrongTankUpdate" class="container d-none">
                <div class="row">
                    <div class="col-md-12 p-5">
                        <h3>Something Went Wrong !</h3>
                    </div>
                </div>
            </div>


            <div class="modal-body d-none" id="updateTankModalDNone">

                <div class="container">
                    <form id="updatetankdetail" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>tank_number:</strong>
                                    <input id="update_tank_number" type="text" name="tank_number" class="form-control"
                                        placeholder="tank_number">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>tank_owner:</strong>
                                    <input id="update_tank_owner" type="text" name="tank_owner" class="form-control"
                                        placeholder="tank_owner">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>manufacturing_date:</strong>
                                    <input id="update_tank_manuf_date" type="date" name="manufacturing_date"
                                        class="form-control" placeholder="manufacturing_date">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Current PO Certificate No:</strong>
                                    <input id="update_tank_curr_po_certificate" type="text"
                                        name="current_po_certificate" class="form-control"
                                        placeholder="current_po_certificate">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Certificate Name:</strong>
                                    <input id="update_tank_certificate_name" type="text" name="certificate_name"
                                        class="form-control" placeholder="Certificate Name">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>Certificate Cost:</strong>
                                    <input id="update_tank_certificate_cost" type="text" name="certificate_cost"
                                        class="form-control" placeholder="Certificate Cost">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>last_test_date:</strong>
                                    <input id="update_tank_last_test" type="date" name="last_test_date"
                                        class="form-control" placeholder="last_test_date">
                                </div>
                            </div>
                            <div class="col-xs-12 mb-3">
                                <div class="form-group">
                                    <strong>expired_date:</strong>
                                    <input id="update_tank_expire" type="date" name="expired_date" class="form-control"
                                        placeholder="expired_date">
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button id="TankUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
            </div>
        </div>
    </div>
</div>


@endsection


<!-- eikhane ja section script ace eita -->
@section('script')
<script type="text/javascript">
// window.myBulkSelectCallback = function (data) {
//   the JSON data will come here
//   console.log(data)route
// };







// $(document).ready(function() {
//     $.ajax({
//         url: "{{ route('tanks.allTanks') }}",
//         method: 'GET',
//         success: function(response) {
//             getAllTank();

//         },
//         error: function(xhr) {
//             console.error(xhr.responseText);
//         }
//     });
//     // })
// });

// detais show in update exampleModalLabel
function updateTankDetails(id) {
    axios.post('/TanksDetails', {
        id: id
    }).then(function(response) {
        if (response.status == 200 && response.data) {
            $('#updateTankModalDNone').removeClass('d-none');
            $('#UpdateTankLoader').addClass('d-none');
            var jsonData = response.data;
            $('#update_tank_number').val(jsonData.tank_number);
            $('#update_tank_owner').val(jsonData.tank_owner);
            $('#update_tank_manuf_date').val(jsonData.manufacturing_date);
            $('#update_tank_curr_po_certificate').val(jsonData.current_po_certificate);
            $('#update_tank_certificate_name').val(jsonData.certificate_name);
            $('#update_tank_certificate_cost').val(jsonData.certificate_cost);
            $('#update_tank_last_test').val(jsonData.last_test_date);
            $('#update_tank_expire').val(jsonData.expired_date);

        } else {
            $('#UpdateTankLoader').addClass('d-none');
            $('#WrongTankUpdate').removeClass('d-none');
        }
    }).catch(function(error) {
        $('#UpdateTankLoader').addClass('d-none');
        $('#WrongTankUpdate').removeClass('d-none');
    })
}

// update Tank

$('#TankUpdateConfirmBtn').click(function() {
    var data = {
        'update_tank_number': $('#update_tank_number').val(),
        'update_tank_owner': $('#update_tank_owner').val(),
        'update_tank_manuf_date': $('#update_tank_manuf_date').val(),
        'update_tank_curr_po_certificate': $('#update_tank_curr_po_certificate').val(),
        'update_tank_certificate_name': $('#update_tank_certificate_name').val(),
        'update_tank_certificate_cost': $('#update_tank_certificate_cost').val(),
        'update_tank_last_test': $('#update_tank_last_test').val(),
        'update_tank_expire': $('#update_tank_expire').val(),
    }

    var data_id = $('#Update_Tank_Id').val();
    const url = "/updatetank/" + data_id;

    $('#TankUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post(url, data).then(function(response) {
        $('#TankUpdateConfirmBtn').html("Save");
        if (response.status == 200) {
            if (response.data == 1) {
                $('#UpdateTankModal').modal('hide');
                toastr.success('Update Tank Success');
                getAllTank();
            } else {
                $('#UpdateTankModal').modal('hide');
                toastr.error('Update Tank Fail');
                getAllTank();
            }
        } else {
            $('#UpdateTankModal').modal('hide');
            toastr.error('Something Went Wrong !');
        }
    }).catch(function(error) {
        $('#UpdateTankModal').modal('hide');
        toastr.error('Something Went Wrong !');
    })
})

// status update
function showtankdetaildata(id) {
    axios.post('/showsingletank', {
        id: id
    }).then(function(response) {
        if (response.status == 200 && response.data) {

            var jsonData = response.data;

            $('#showTankNo').text(jsonData.tank_number);
            $('#showTankowner').text(jsonData.tank_owner);
            $('#showTankmanufdate').text(jsonData.manufacturing_date);
            $('#showTankCurrpo').text(jsonData.current_po_certificate);
            $('#showTankCertificatename').text(jsonData.certificate_name);
            $('#showTankcertificatecost').text(jsonData.certificate_cost);
            $('#showTanklasttestdate').text(jsonData.last_test_date);
            $('#showTankexpiredate').text(jsonData.expired_date);
            $('#showTankstatus').text(jsonData.expired_date);

        } else {
            toastr.error('Something Went Worng!!');
        }
    }).catch(function(error) {
        toastr.error(error);
    })
}


// delete categoryDeleteBtn

$('#TankDeleteConfirmBtn').click(function() {
    var id = $('#deleteModalTankId').html();
    $('#TankDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post('/TanksDelete', {
        id: id
    }).then(function(response) {
        $('#TankDeleteConfirmBtn').html('Yes');
        if (response.status == 200) {
            if (response.data == 1) {
                $('#deleteTankModal').modal('hide');
                toastr.success('Tank delete successfully!!');
                getAllTank();
            } else {
                $('#deleteTankModal').modal('hide');
                toastr.error('Tank delete fail!!');
                getAllTank();
            }
        } else {
            $('#deleteTankModal').modal('hide');
            toastr.error('Something Went Worng!!');
        }

    }).catch(function(error) {
        $('#deleteTankModal').modal('hide');
        toastr.error('Something Went Worng!!');
    })
})

// add new Tank
$('#addNewTank').click(function() {
    $('#addTankModal').modal('show');
})

$('#TankAddConfirmBtn').click(function() {
    var data = $("#addtankdetail").serialize();
    addTank(data);

})

function addTank(data) {
    const url = '{{ route("tanks.store") }}';
    $('#TankAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post(url, data).then(function(response) {
        $('#TankAddConfirmBtn').html("Save");
        if (response.status == 200) {
            if (response.data == 1) {
                $('#addTankModal').modal('hide');
                toastr.success('Add Success');
                getAllTank();
            } else {
                $('#addTankModal').modal('hide');
                toastr.error('Add Fail');
                getAllTank();
            }
        }
    }).catch(function(error) {
        $('#addTankModal').modal('hide');
        toastr.error('Something Went Wromg');
    });
}
</script>
@endsection