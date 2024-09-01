@extends('layouts.master')

@section('content')
<div id="LcMainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 p-5">

            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Lc Lists</h6>
                </div>
                <div class="col-md-6"> <button id="addNewLc"
                        class="btn btn-primary btn-sm font-weight-bold float-right"><i class="fas fa-plus"></i> Add
                        New</button></div>
            </div>

            <div class="table-responsive">
                <table id="LcDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>LC No</th>
                            <th>LC Date</th>
                            <th>LC Type</th>
                            <th>Consignee Name</th>
                            <th>Beneficiary</th>
                            <th>LC Expired Date</th>
                            <th>Last Shipment Date</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="LcTableBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="loaderLcDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <!-- <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}"> -->
        </div>
    </div>
</div>
<div id="WrongLcDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <h3>Something Went Wrong !</h3>
        </div>
    </div>
</div>




<!-- modal for delete course -->
<div class="modal fade" id="deleteLcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <h5 class="modal-title" id="deleteModalLcId"> </h5>
                    <h5 class="modal-title">Are you sure to delete this Lc!!</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
                <button id="LcDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>


<!-- modal for adding LC -->
<div class="modal modal-xl fade" id="addLcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New LC</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="p-1 bg-light">
                        <form action="" method="POST" id="AddLcForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <strong>LC No:</strong>
                                        <input type="text" name="lc_no" class="form-control" placeholder="LC No">
                                    </div>

                                    <div class="form-group">
                                        <strong>LC Date:</strong>
                                        <input type="date" name="lc_date" class="form-control" placeholder="LC Date">
                                    </div>

                                    <div class="form-group">
                                        <!-- <label for="lc_type">LC Type:</label> -->
                                        <strong>LC Type:</strong>

                                        <select id="lc_type" name="lc_type" class="form-control">
                                            <option value="N/A">Select LC Type</option>
                                            <option value="po">PO</option>
                                            <option value="tt">TT</option>
                                            <option value="lc">LC</option>
                                            <option value="sales contact">Sales Contact</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <strong>Consignee Name:</strong>
                                        <input type="text" name="consignee_name" class="form-control"
                                            placeholder="Consignee Name">
                                    </div>

                                    <div class="form-group">
                                        <strong>Beneficiary:</strong>
                                        <input type="text" name="beneficiary" class="form-control"
                                            placeholder="Beneficiary">
                                    </div>

                                    <div class="form-group">
                                        <strong>LC Expired Date:</strong>
                                        <input type="date" name="lc_expired_date" class="form-control"
                                            placeholder="lc_expired_date">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <strong>Last Shipment Date:</strong>
                                        <input type="date" name="last_ship_date" class="form-control"
                                            placeholder="last_ship_date">
                                    </div>

                                    <div class="form-group">
                                        <strong>Product:</strong>
                                        <input type="text" name="product" class="form-control" placeholder="Product">
                                    </div>

                                    <div class="form-group">
                                        <strong>Quantity:</strong>
                                        <input type="text" name="qtn" class="form-control" placeholder="Quantity">
                                    </div>

                                    <div class="form-group">
                                        <strong>Price:</strong>
                                        <input type="text" name="price" class="form-control" placeholder="Price">
                                    </div>

                                    <div class="form-group">
                                        <strong>Origin:</strong>
                                        <select class="origin form-control" style="width:500px;" name="origin"
                                            id="origin"></select>
                                    </div>

                                    <div class="form-group">
                                        <strong>Destination:</strong>
                                        <select class="destination form-control" style="width:500px;" name="destination"
                                            id="destination">
                                        </select>
                                    </div>
                                </div>

                                <!-- 
                                <div class="col-xs-12 mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> -->
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button id="LcAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- modal for updae status -->
<div class="modal fade" id="LcDataShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <div class="row">
                        <div class="col-12">

                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>LC No:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcNo">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>LC Date:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcDate">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>LC Type:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcType">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Consignee:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcConsignee">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Beneficiary:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcBeneficiary">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>LC expired date:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcexpired">
                                    </p>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Last shipment date:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcshipment">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Product:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcProduct">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Quantity:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcQuantity">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Price:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcPrice">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Origin:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcOrigin">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Destination:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showLcDestination">
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



<!-- modal for update Lcs -->
<div class="modal modal-xl fade" id="UpdateLcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Lc</h5>
                <h5 id="UpdateLcId" class="d-none"> </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div id="UpdateLcLoader" class="container">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <!-- <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}"> -->
                    </div>
                </div>
            </div>

            <div id="WrongLcUpdate" class="container d-none">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <h3>Something Went Wrong !</h3>
                    </div>
                </div>
            </div>


            <div class="modal-body d-none" id="updateLcModalDNone">

                <div class="container">

                    <form method="POST" id="LcUpdateForm">
                        @csrf
                        @method('PUT')

                        <input id="lc_id_for_update" type="hidden" name="origin" class="form-control" readonly="true">

                        <div class="row">
                            <div class="col-md-6 mb-3">


                                <div class="form-group">
                                    <strong>LC No:</strong>
                                    <input id="update_lc_no" type="text" name="lc_no" class="form-control"
                                        placeholder="LC No">
                                </div>

                                <div class="form-group">
                                    <strong>LC Date:</strong>
                                    <input id="update_lc_date" type="date" name="lc_date" class="form-control"
                                        placeholder="LC Date">
                                </div>

                                <div class="form-group">
                                    <label for="lc_type"> <strong>LC Type:</strong></label>

                                    <select id="update_lc_type" name="lc_type" class="form-control">

                                        <option></option>

                                        <option value="N/A">Select LC Type</option>
                                        <option value="po">PO</option>
                                        <option value="tt">TT</option>
                                        <option value="lc">LC</option>
                                        <option value="sales contact">Sales Contact</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Consignee Name:</strong>
                                    <input id="update_consignee_name" type="text" name="consignee_name"
                                        class="form-control" placeholder="Consignee Name">
                                </div>

                                <div class="form-group">
                                    <strong>Beneficiary:</strong>
                                    <input id="update_beneficiary" type="text" name="beneficiary" class="form-control"
                                        placeholder="Beneficiary">
                                </div>

                                <div class="form-group">
                                    <strong>LC Expired Date:</strong>
                                    <input id="update_lc_expired_date" type="date" name="lc_expired_date"
                                        class="form-control" placeholder="lc_expired_date">
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <strong>Last Shipment Date:</strong>
                                    <input id="update_last_ship_date" type="date" name="last_ship_date"
                                        class="form-control" placeholder="last_ship_date">
                                </div>
                                <div class="form-group">
                                    <strong>Product:</strong>
                                    <input id="update_product" type="text" name="product" class="form-control"
                                        placeholder="Product">
                                </div>

                                <div class="form-group">
                                    <strong>Quantity:</strong>
                                    <input id="update_qtn" type="text" name="qtn" class="form-control"
                                        placeholder="Quantity">
                                </div>

                                <div class="form-group">
                                    <strong>Price:</strong>
                                    <input id="update_price" type="text" name="price" class="form-control"
                                        placeholder="Price">
                                </div>

                                <div class="form-group">
                                    <strong>Origin:</strong>
                                    <input id="update_origin" type="text" name="origin" class="form-control"
                                        placeholder="Origin">
                                </div>

                                <div class="form-group">
                                    <strong>Destination:</strong>
                                    <input id="update_destination" type="text" name="destination" class="form-control"
                                        placeholder="Destination">
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button id="LcUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
            </div>
        </div>
    </div>
</div>


@endsection


@section('script')
<script type="text/javascript">
getAllLc();

function getAllLc() {
    axios.get('/allLc').then(function(response) {

        if (response.status == 200) {
            $('#LcMainDiv').removeClass('d-none');
            $('#loaderLcDiv').addClass('d-none');

            $('#LcDataTable').DataTable().destroy();
            $('#LcTableBody').empty();

            var jsonData = response.data;
            $.each(jsonData, function(i, item) {
                $('<tr>').html(
                    "<td>" + jsonData[i].lc_no + "</td>" +
                    "<td>" + jsonData[i].lc_date + "</td>" +
                    "<td>" + jsonData[i].lc_type + "</td>" +
                    "<td>" + jsonData[i].consignee_name + "</td>" +
                    "<td>" + jsonData[i].beneficiary + "</td>" +
                    "<td>" + jsonData[i].lc_expired_date + "</td>" +
                    "<td>" + jsonData[i].last_ship_date + "</td>" +
                    "<td>" + jsonData[i].product + "</td>" +
                    "<td>" + jsonData[i].qtn + "</td>" +
                    "<td>" + jsonData[i].price + "</td>" +
                    "<td>" + jsonData[i].origin + "</td>" +
                    "<td>" + jsonData[i].destination + "</td>" +
                    "<td>@can('lc-edit')<a class='LcEditBtn' data-id=" + jsonData[i]
                    .id +
                    "><i class='fas fa-edit'></i></a>&nbsp;&nbsp;&nbsp;@endcan @can('lc-list')<a class='showsingleLcdata text-warning'data-id=" +
                    jsonData[i].id +
                    "><i class='fas fa-eye'></i><a>@endcan  @can('lc-list') &nbsp;&nbsp;&nbsp;<a class='LcDelete text-danger'data-id=" +
                    jsonData[i].id + "><i class='fas fa-trash'></i><a>@endcan </td>"
                ).appendTo('#LcTableBody');
            });
            // show edit modal
            $('.LcEditBtn').click(function() {
                $('#UpdateLcModal').modal('show');
                var id = $(this).data('id');
                $('#UpdateLcId').html(id);
                $('#lc_id_for_update').val(id);
                updateLcDetails(id);
            });

            // show delete modal
            $('.LcDelete').click(function() {
                $('#deleteLcModal').modal('show');
                var id = $(this).data('id');
                $('#deleteModalLcId').html(id);
            });

            // show single lc 
            $('.showsingleLcdata').click(function() {
                var id = $(this).data('id');
                $('#LcDataShow').modal('show');
                ShowDetailsLc(id);
            });


            $('#LcDataTable').DataTable({
                "order": false
            });
            $('.dataTables_length').addClass('bs-select');

        } else {
            $('#loaderLcDiv').addClass('d-none');
            $('#WrongUpdate').removeClass('d-none');
        }

    }).catch(function(error) {

        $('#loaderLcDiv').addClass('d-none');
        $('#WrongLcDiv').removeClass('d-none');
    });
}

// detais show in update exampleModalLabel
function updateLcDetails(id) {
    // console.log('jk', id);
    axios.post('/lcDetailId', {
        id: id
    }).then(function(response) {
        if (response.status == 200 && response.data) {
            $('#updateLcModalDNone').removeClass('d-none');
            $('#UpdateLcLoader').addClass('d-none');
            var jsonData = response.data;
            $('#update_lc_no').val(jsonData.lc_no);
            $('#update_lc_date').val(jsonData.lc_date);
            $('#update_lc_type').val(jsonData.lc_type);
            $('#update_consignee_name').val(jsonData.consignee_name);
            $('#update_beneficiary').val(jsonData.beneficiary);
            $('#update_lc_expired_date').val(jsonData.lc_expired_date);
            $('#update_last_ship_date').val(jsonData.last_ship_date);
            $('#update_product').val(jsonData.product);
            $('#update_qtn').val(jsonData.qtn);
            $('#update_price').val(jsonData.price);
            $('#update_origin').val(jsonData.origin);
            $('#update_destination').val(jsonData.destination);

        } else {
            $('#UpdateLcLoader').addClass('d-none');
            $('#WrongLcUpdate').removeClass('d-none');
        }
    }).catch(function(error) {
        $('#UpdateLcLoader').addClass('d-none');
        $('#WrongLcUpdate').removeClass('d-none');
    })
}

// update Lc

$('#LcUpdateConfirmBtn').click(function() {


    var data = {

        'update_lc_no': $('#update_lc_no').val(),
        'update_lc_date': $('#update_lc_date').val(),
        'update_lc_type': $('#update_lc_type').val(),
        'update_consignee_name': $('#update_consignee_name').val(),
        'update_beneficiary': $('#update_beneficiary').val(),
        'update_lc_expired_date': $('#update_lc_expired_date').val(),
        'update_last_ship_date': $('#update_last_ship_date').val(),
        'update_product': $('#update_product').val(),
        'update_qtn': $('#update_qtn').val(),
        'update_price': $('#update_price').val(),
        'update_origin': $('#update_origin').val(),
        'update_destination': $('#update_destination').val(),
    }
    var data_id = $('#lc_id_for_update').val();
    const url = "/updatelc/" + data_id;

    console.log(data);

    var status = $('#updateLcStatus').val();
    $('#LcUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post(url, data).then(function(response) {
        $('#LcUpdateConfirmBtn').html("Save");
        if (response.status == 200) {
            if (response.data == 1) {
                $('#UpdateLcModal').modal('hide');
                toastr.success('Update LC Success');
                getAllLc();
            } else {
                $('#UpdateLcModal').modal('hide');
                toastr.error('Update LC Fail');
                getAllLc();
            }
        } else {
            $('#UpdateLcModal').modal('hide');
            toastr.error('Something Went Wrong !');
        }
    }).catch(function(error) {
        $('#UpdateLcModal').modal('hide');
        toastr.error('Something Went Wrong !');
    })
})

// status update
function ShowDetailsLc(id) {


    axios.post('/lcShow', {
        id: id
    }).then(function(response) {
        if (response.status == 200 && response.data) {

            var jsonData = response.data;
            console.log(jsonData.lc_no);

            $('#showLcNo').text(jsonData.lc_no);
            $('#showLcDate').text(jsonData.lc_date);
            $('#showLcType').text(jsonData.lc_type);
            $('#showLcConsignee').text(jsonData.consignee_name);
            $('#showLcBeneficiary').text(jsonData.beneficiary);
            $('#showLcexpired').text(jsonData.lc_expired_date);
            $('#showLcshipment').text(jsonData.last_ship_date);
            $('#showLcProduct').text(jsonData.product);
            $('#showLcQuantity').text(jsonData.qtn);
            $('#showLcPrice').text(jsonData.price);
            $('#showLcOrigin').text(jsonData.origin);
            $('#showLcDestination').text(jsonData.destination);


        } else {
            toastr.error('Something Went Worng!!');
        }
    }).catch(function(error) {
        toastr.error(error);
    })
}

// delete categoryDeleteBtn

$('#LcDeleteConfirmBtn').click(function() {
    var id = $('#deleteModalLcId').html();
    $('#LcDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post('/LcsDelete', {
        id: id
    }).then(function(response) {
        $('#LcDeleteConfirmBtn').html('Yes');
        if (response.status == 200) {
            if (response.data == 1) {
                $('#deleteLcModal').modal('hide');
                toastr.success('Lc delete successfully!!');
                getAllLc();
            } else {
                $('#deleteLcModal').modal('hide');
                toastr.error('Lc delete fail!!');
                getAllLc();
            }
        } else {
            $('#deleteLcModal').modal('hide');
            toastr.error('Something Went Worng!!');
        }

    }).catch(function(error) {
        $('#deleteLcModal').modal('hide');
        toastr.error('Something Went Worng!!');
    })
})

// add new Lc
$('#addNewLc').click(function() {
    $('#addLcModal').modal('show');
})

$('#LcAddConfirmBtn').click(function() {
    var data = $("#AddLcForm").serialize();
    addLc(data);
})

function addLc(data) {

    const url = '{{ route("lcs.store") }}';

    $('#LcAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
    axios.post(url, data).then(function(response) {
        $('#LcAddConfirmBtn').html("Save");
        if (response.status == 200) {
            if (response.data == 1) {
                $('#addLcModal').modal('hide');
                toastr.success('Add Success');
                getAllLc();
            } else {
                $('#addLcModal').modal('hide');
                toastr.error('Add Fail');
                getAllLc();
            }
        }
    }).catch(function(error) {
        $('#addLcModal').modal('hide');
        toastr.error('Something Went Wromg');
    });
}


$('#destination').select2({
    dropdownParent: $('#addLcModal'),
    placeholder: 'Select an item',
    width: 'resolve',
    ajax: {
        url: '/autocomplete',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        text: item.port_name,
                        id: item.port_name
                    }
                })
            };
        },
        cache: true
    }
});

$('#origin').select2({
    dropdownParent: $('#addLcModal'),
    placeholder: 'Select an item',
    width: 'resolve',
    ajax: {
        url: '/autocomplete',
        dataType: 'json',
        delay: 250,
        processResults: function(data) {
            return {
                results: $.map(data, function(item) {
                    return {
                        text: item.port_name,
                        id: item.port_name
                    }
                })
            };
        },
        cache: true
    }
});
</script>
@endsection