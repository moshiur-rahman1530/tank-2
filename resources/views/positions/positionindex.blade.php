@extends('layouts.master')
@section('style')
<style>
.form-group>input {
    width: 80%;
}
</style>
@endsection
@section('content')


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


@php
$ont = count($ontrangit);
$lad = count($laden);
@endphp

<div id="ConsignmentMainDiv" class="container d-none">
    <div class="row">
        <div class="col-md-6 margin-tb mb-4">
            <div class="pull-left">
                <h2>Tank Consignment
                    <div class="float-end">
                    </div>
                </h2>
            </div>
        </div>
        <div class="col-md-6 margin-tb mb-4">
            <div class="row">
                <div class="col-md-6">
                    <!-- <button type="button" class="btn btn-warning"> -->
                    <div>
                        On Transit <span class="badge text-bg-danger" id="ontransit">{{$ont}}</span>
                    </div>

                    <!-- </button> -->
                </div>
                <div class="col-md-6">
                    <!-- <button type="button" class="btn btn-primary"> -->
                    <div>
                        Laden <span class="badge text-bg-success" id="ontransit">{{$lad}}</span>
                    </div>

                    <!-- </button> -->
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 p-5">

            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary float-left">Tank Consignment Lists</h6>
                </div>
                <div class="col-md-6"> <button id="addNewConsignment"
                        class="btn btn-primary btn-sm font-weight-bold float-right"><i class="fas fa-plus"></i> Add
                        New</button></div>
            </div>
            <div class="table-responsive">

                <table id="ConsignmentDataTable" class="table table-striped table-bordered table-responsive"
                    cellspacing="0" width="100%">
                    <thead class="bg-success text-dark">
                        <tr>
                            <th>ID</th>
                            <!-- <th>Shipment Id</th> -->
                            <th>Tank Number</th>
                            <th>LC NO</th>
                            <th>Consignee Name</th>
                            <th>Origin</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="ConsignmentTableBody">




                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="loaderConsignmentDiv" class="container">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <!-- <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}"> -->
        </div>
    </div>
</div>
<div id="WrongConsignmentDiv" class="container d-none">
    <div class="row">
        <div class="col-md-12 text-center p-5">
            <h3>Something Went Wrong !</h3>
        </div>
    </div>
</div>

<!-- modal for delete Consignment -->
<div class="modal fade" id="deleteTankPosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <h5 class="modal-title" id="deleteModalPositionId"> </h5>
                    <h5 class="modal-title">Are you sure to delete this Consignment!!</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
                <button id="PositionDeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>


<!-- modal for Show Consignment -->
<div class="modal modal-xl fade" id="ShowTankPosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header showmodaltitle">
                <div class="modalbtn">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>

                    </button>
                </div>
                <div class="">
                    <h4 class="text-info text-bold">Samuda Chemical Complex Ltd.</h4>
                    <p>T.K. Bhaban, Kawran Bazar, Dhaka</p>
                </div>
            </div>

            <div class="modal-body">
                <div class="container" id="showConsignmentContainer">




                    <div class="row border">
                        <div class="col-md-6 col-12 border">

                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Tank Number:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionTank_no">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>LC Number:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionLc_no">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Consignee:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionConsign">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Origin:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionOrigin">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Destination:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionDestination">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>ETD to final dest:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionEtd">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>ETA to final dest:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionEta">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Loading date:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionLoadingDate">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Connecting port name:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionConnecting_port">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Arrived at connecting port:</strong>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionArrive_Connecting_port">
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-12 border">

                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Sail to dest port:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionSailToDes">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Arrived at dest
                                            port:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionArriveAtDes">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Arrival at
                                            customer:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionArriveAtCus">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Arrive to agent
                                            warehouse:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionArriveAtWarwhouse">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Loading
                                            port:</strong></p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionLoadingPort">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Sail to
                                            conneting:</strong>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionSailToConnect">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Arrive
                                            at
                                            conneting:</strong>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionArriveAtConnect">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Sail
                                            to
                                            dest:</strong>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionSailDes">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Arrived
                                            at
                                            dest:</strong>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionArriveDes">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Arrived
                                            at
                                            warehouse:</strong>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionArriveWah">
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 border">
                                    <p> <strong>Tank
                                            status:</strong>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 border">
                                    <p id="showPositionStatus">
                                    </p>
                                </div>
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


@can('position-edit')
<!-- modal for update Consignment -->
<div class="modal modal-xl fade" id="updateConsignmentModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Update Cosignment
                </h5>
                <h5 id="UpdateConsignmentId">
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div id="UpdateConsignmentLoader" class="container">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                    </div>
                </div>
            </div>

            <div id="WrongConsignmentUpdate" class="container d-none">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <h3>Something
                            Went Wrong !
                        </h3>
                    </div>
                </div>
            </div>


            <div class="modal-body d-none" id="updateConsignmentModalDNone">

                <div class="container">
                    <form id="UpdateConsignment" method="PUT">
                        @csrf
                        <div class="row">

                            <input id="data_id_for_update" type="hidden" name="origin" class="form-control"
                                readonly="true">

                            <div class="col-md-6">
                                <h4>
                                </h4>
                                <div class="form-group my-3">
                                    <strong>Tank
                                        number:</strong>
                                    <div class="mt-1">
                                        <select name="update_tank_number" id="update_tank_number"
                                            class="update_tank_number form-control" style="width:80%">
                                            <!-- <option id="tank_number_value"></option> -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group my-3">
                                    <strong>LC
                                        No:</strong>
                                    <div class="mt-1">
                                        <select name="Update_lc_no" id="Update_lc_no" class="Update_lc_no form-control"
                                            style="width:80%"></select>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group  my-3">
                                    <strong>Consignee
                                        Name:</strong>
                                    <input id="update_position_input_consignee" type="text" name="consignee_name"
                                        class="form-control mt-1" readonly="true">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Origin:</strong>
                                    <input id="update_position_input_origin" type="text" name="origin"
                                        class="form-control" readonly="true">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Destination:</strong>
                                    <input id="update_position_input_destination" type="text" name="destination"
                                        class="form-control" readonly="true">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>ETD
                                        to
                                        Final
                                        Destination:</strong>
                                    <input id="update_position_input_etd_des" type="date" name="etd_to_final_dest"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>ETA
                                        to
                                        final
                                        dest:</strong>
                                    <input id="update_position_input_eta_des" type="date" name="eta_to_final_dest"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Loading
                                        date:</strong>
                                    <input id="update_position_input_loading_date" type="date" name="loading_date"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Connecting
                                        port
                                        name:</strong>
                                    <input id="update_position_input_connect_port" type="text"
                                        name="connecting_port_name" class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Arrived
                                        at
                                        connecting
                                        port:</strong>
                                    <input id="update_arrived_at_connecting_port" type="date"
                                        name="arrived_at_connecting_port" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6" id="return_data">
                                <div class="form-group  my-3">
                                    <strong>Sail
                                        to
                                        dest
                                        port:</strong>
                                    <input id="update_position_input_sail" type="date" name="sail_to_dest_port"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Arrived
                                        at
                                        dest
                                        port:</strong>
                                    <input id="update_position_input_arrive_des_port" type="date"
                                        name="arrived_at_dest_port" class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Arrival
                                        at
                                        customer:</strong>
                                    <input id="update_position_input_arrive_cus" type="date" name="arrival_at_customer"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Arrive
                                        to
                                        agent
                                        warehouse:</strong>
                                    <input id="update_position_input_arrive_warh" type="date"
                                        name="arrive_to_agent_warehouse" class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Loading
                                        port:</strong>
                                    <input id="update_position_input_loading_port" type="text" name="loading_port"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Sail
                                        to
                                        conneting:</strong>
                                    <input id="update_position_input_sail_connect" type="date" name="sail_to_conneting"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Arrive
                                        at
                                        conneting:</strong>
                                    <input id="update_position_input_arrive_connect" type="date"
                                        name="arrive_at_conneting" class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Sail
                                        to
                                        dest:</strong>
                                    <input id="update_position_input_sail_des" type="date" name="sail_to_dest"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Arrived
                                        at
                                        dest:</strong>
                                    <input id="update_position_input_arrive_des" type="date" name="arrived_at_dest"
                                        class="form-control">
                                </div>
                                <div class="form-group  my-3">
                                    <strong>Arrived
                                        at
                                        warehouse:</strong>
                                    <input id="update_position_input_warehouse" type="date" name="arrived_at_warehouse"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-primary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button id="Update_Consign_ConfirmBtn" type="button"
                                    class="btn btn-sm btn-danger">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endcan

@can('position-create')
<!-- modal for adding Consignment -->
<div class="modal modal-xl fade" id="addConsignmentModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Add A New
                    Consignment</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="p-1 bg-light">

                        <form action="" method="POST" id="AddConsignment">
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <h4>
                                    </h4>
                                    <div class="form-group my-3">
                                        <strong>Tank
                                            number:</strong>
                                        <div class="mt-1">
                                            <select name="tank_number" id="tank_number" class="tank_number form-control"
                                                style="width:80%"></select>
                                        </div>
                                    </div>
                                    <div class="form-group my-3">
                                        <strong>LC
                                            No:</strong>
                                        <div class="mt-1">
                                            <select name="lc_no" id="lc_no" class="lc_no form-control" style="width:80%"
                                                id="lc_no"></select>
                                        </div>
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Consignee
                                            Name:</strong>
                                        <input id="position_input_consignee" type="text" name="consignee_name"
                                            class="form-control mt-1" readonly="true">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Origin:</strong>
                                        <input id="position_input_origin" type="text" name="origin" class="form-control"
                                            readonly="true">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Destination:</strong>
                                        <input id="position_input_destination" type="text" name="destination"
                                            class="form-control" readonly="true">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>ETD
                                            to
                                            Final
                                            Destination:</strong>
                                        <input id="position_input_etd_des" type="date" name="etd_to_final_dest"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>ETA
                                            to
                                            final
                                            dest:</strong>
                                        <input id="position_input_eta_des" type="date" name="eta_to_final_dest"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Loading
                                            date:</strong>
                                        <input id="position_input_loading_date" type="date" name="loading_date"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Connecting
                                            port
                                            name:</strong>
                                        <input id="position_input_connect_port" type="text" name="connecting_port_name"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Arrived
                                            at
                                            connecting
                                            port:</strong>
                                        <input id="arrived_at_connecting_port" type="date"
                                            name="arrived_at_connecting_port" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6" id="return_data">
                                    <div class="form-group  my-3">
                                        <strong>Sail
                                            to
                                            dest
                                            port:</strong>
                                        <input id="position_input_sail" type="date" name="sail_to_dest_port"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Arrived
                                            at
                                            dest
                                            port:</strong>
                                        <input id="position_input_arrive_des_port" type="date"
                                            name="arrived_at_dest_port" class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Arrival
                                            at
                                            customer:</strong>
                                        <input id="position_input_arrive_cus" type="date" name="arrival_at_customer"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Arrive
                                            to
                                            agent
                                            warehouse:</strong>
                                        <input id="position_input_arrive_warh" type="date"
                                            name="arrive_to_agent_warehouse" class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Loading
                                            port:</strong>
                                        <input id="position_input_loading_port" type="text" name="loading_port"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Sail
                                            to
                                            conneting:</strong>
                                        <input id="position_input_sail_connect" type="date" name="sail_to_conneting"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Arrive
                                            at
                                            conneting:</strong>
                                        <input id="position_input_arrive_connect" type="date" name="arrive_at_conneting"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Sail
                                            to
                                            dest:</strong>
                                        <input id="position_input_sail_des" type="date" name="sail_to_dest"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Arrived
                                            at
                                            dest:</strong>
                                        <input id="position_input_arrive_des" type="date" name="arrived_at_dest"
                                            class="form-control">
                                    </div>
                                    <div class="form-group  my-3">
                                        <strong>Arrived
                                            at
                                            warehouse:</strong>
                                        <input id="position_input_warehouse" type="date" name="arrived_at_warehouse"
                                            class="form-control">
                                    </div>
                                </div>

                                <!-- <div class="col-xs-12 my-3 text-center">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div> -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-primary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button id="ConsignmentAddConfirmBtn" type="button"
                                        class="btn btn-sm btn-danger">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endcan

<!-- modal for updae status -->
<div class="modal fade" id="ConsignmentStatusUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <h5 class="modal-title" id="ConsignmentStatusConsignmentId">
                    </h5>
                    <h5 class="modal-title">
                        Are you sure to
                        change
                        Consignment
                        status!!</h5>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">No</button>
                <button id="ConsignmentStatusConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
            </div>
        </div>
    </div>
</div>

@endsection






@section('script')


<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $(
            'meta[name="_token"]'
        ).attr(
            'content')
    }
})


getAllConsignment();


// var lcnumber;

// update deatils Consignment fetch
function findlcnumber(id) {
    axios.post('/getpositionbyid', {
        id: id

    }).then(function(response) {

        if (response.status ==
            200 && response.data
        ) {

            var lcnumber =
                response.data
                .lc_number;
            console.log(
                lcnumber);

        }
    })
}

function getAllConsignment() {

    axios.get('/alltankposition').then(
        function(response) {



            if (response.status ==
                200) {
                $('#ConsignmentMainDiv')
                    .removeClass(
                        'd-none');
                $('#loaderConsignmentDiv')
                    .addClass(
                        'd-none');

                $('#ConsignmentDataTable')
                    .DataTable()
                    .destroy();
                $('#ConsignmentTableBody').empty();

                var jsonData = response.data;

                console.log(jsonData.length);

                // $('#ontransit').text(jsonData.length);
                $.each(jsonData, function(i, item) {

                    let url = '{{ route("tanks.store",' + jsonData[i]
                        .id + ') }}';
                    var dt =
                        jsonData[
                            i
                        ]
                        .lc_no;

                    // console.log(dt);
                    // findlcnumber(dt);

                    if (jsonData[
                            i
                        ]
                        .status ==
                        1) {


                        var status =
                            'Active';
                        var finalStatus =
                            "<a class='ConsignmentStatusBtns btn btn-sm btn-success' data-id=" +
                            jsonData[
                                i
                            ]
                            .id +
                            ">" +
                            status +
                            "</a>"
                    } else {
                        var status =
                            'Inactive';
                        var finalStatus =
                            "<a class='ConsignmentStatusBtns btn btn-sm btn-danger' data-id=" +
                            jsonData[
                                i
                            ]
                            .id +
                            ">" +
                            status +
                            "</a> "
                    }
                    $('<tr>')
                        .html(
                            "<td>" +
                            jsonData[
                                i
                            ]
                            .id +
                            "</td>" +
                            "<td class='showsingleTankdata'><a href=''>" + jsonData[i].tank_number +
                            "</a></td>" +
                            "<td>" +
                            jsonData[
                                i
                            ]
                            .lc[
                                0
                            ]
                            .lc_no +
                            "</td>" +

                            // "<td>" + jsonData[i].lc_no + "</td>" +
                            "<td>" +
                            jsonData[
                                i
                            ]
                            .consignee_name +
                            "</td>" +
                            "<td>" +
                            jsonData[
                                i
                            ]
                            .origin +
                            "</td>" +
                            "<td>" +
                            jsonData[
                                i
                            ]
                            .tank_status +
                            "</td>" +

                            "<td>@can('position-edit')<a class='serviceEditBtn' data-id=" +
                            jsonData[
                                i
                            ]
                            .id +
                            "><i class='fas fa-edit'></i></a>&nbsp;&nbsp;&nbsp;@endcan @can('position-list')<a class='showsingledata text-warning'data-id=" +
                            jsonData[
                                i
                            ]
                            .id +
                            "><i class='fas fa-eye'></i><a>@endcan  @can('position-list') &nbsp;&nbsp;&nbsp;<a class='deleteposition text-danger'data-id=" +
                            jsonData[
                                i
                            ]
                            .id +
                            "><i class='fas fa-trash'></i><a>@endcan </td>"
                            // +
                            // "<td><a class='serviceEditBtn' data-id=" + jsonData[i].id +
                            // "><i class='fas fa-edit'></i></a></td>" +
                            // "<td><a class='serviceEditBtn' data-id=" + jsonData[i].id +
                            // "><i class='fas fa-edit'></i></a></td>"

                        )
                        .appendTo(
                            '#ConsignmentTableBody'
                        );
                });

                $('.deleteposition')
                    .click(
                        function() {
                            $('#deleteTankPosition')
                                .modal(
                                    'show'
                                );
                            var id =
                                $(
                                    this
                                )
                                .data(
                                    'id'
                                );
                            $('#deleteModalPositionId')
                                .html(
                                    id
                                );
                        });

                $('.showsingledata')
                    .click(
                        function() {
                            $('#ShowTankPosition')
                                .modal(
                                    'show'
                                );
                            var id =
                                $(
                                    this
                                )
                                .data(
                                    'id'
                                );
                            $('#ShowModalPositionId')
                                .html(
                                    id
                                );
                            ShowDetailsPosition
                                (
                                    id
                                );
                        });
                // edit modal open
                $('.serviceEditBtn')
                    .click(
                        function() {
                            $('#updateConsignmentModal')
                                .modal(
                                    'show'
                                );
                            var id =
                                $(
                                    this
                                )
                                .data(
                                    'id'
                                );
                            $('#UpdateConsignmentId')
                                .html(
                                    id
                                );
                            $('#data_id_for_update')
                                .val(
                                    id
                                );
                            TankPositionDetails
                                (
                                    id
                                );
                        });


                $('#ConsignmentDataTable')
                    .DataTable({
                        "order": false
                    });
                $('.dataTables_length')
                    .addClass(
                        'bs-select'
                    );

            } else {
                $('#loaderConsignmentDiv')
                    .addClass(
                        'd-none');
                $('#WrongUpdate')
                    .removeClass(
                        'd-none');
            }

        }).catch(function(error) {

        $('#loaderConsignmentDiv')
            .addClass('d-none');
        $('#WrongConsignmentDiv')
            .removeClass(
                'd-none');
    });
}

// update deatils Consignment fetch
function TankPositionDetails(id) {


    axios.post('/positionDetails', {
        id: id
    }).then(function(response) {


        if (response.status ==
            200 && response.data
        ) {
            $('#updateConsignmentModalDNone')
                .removeClass(
                    'd-none');
            $('#UpdateConsignmentLoader')
                .addClass(
                    'd-none');
            var jsonData =
                response.data;


            $('#Update_lc_no')
                .empty().append(
                    $(
                        "<option></option>"
                    )
                    .attr(
                        "value",
                        jsonData[
                            0]
                        .lc_no)
                    .text(
                        jsonData[
                            1]
                        .lc_no)
                );

            $('#update_tank_number')
                .empty().append(
                    $(
                        "<option></option>"
                    )
                    .attr(
                        "value",
                        jsonData[
                            0]
                        .tank_number
                    ).text(
                        jsonData[
                            0]
                        .tank_number
                    ));

            $('#update_position_input_consignee')
                .val(jsonData[0]
                    .consignee_name
                );
            $('#update_position_input_origin')
                .val(jsonData[0]
                    .origin);
            $('#update_position_input_destination')
                .val(jsonData[0]
                    .destination
                );


            $('#update_position_input_etd_des')
                .val(jsonData[0]
                    .etd_to_final_dest
                );
            $('#update_position_input_eta_des')
                .val(jsonData[0]
                    .eta_to_final_dest
                );

            $("#update_position_input_loading_date")
                .val(jsonData[0]
                    .loading_date
                );
            $("#update_position_input_connect_port")
                .val(jsonData[0]
                    .connecting_port_name
                );
            $("#update_arrived_at_connecting_port")
                .val(jsonData[0]
                    .arrived_at_connecting_port
                );
            $("#update_position_input_sail")
                .val(jsonData[0]
                    .sail_to_dest_port
                );
            $("#update_position_input_arrive_des_port")
                .val(jsonData[0]
                    .arrived_at_dest_port
                );
            $("#update_position_input_arrive_cus")
                .val(jsonData[0]
                    .arrival_at_customer
                );
            $("#update_position_input_arrive_warh")
                .val(jsonData[0]
                    .arrive_to_agent_warehouse
                );
            $("#update_position_input_loading_port")
                .val(jsonData[0]
                    .loading_port
                );
            $("#update_position_input_sail_connect")
                .val(jsonData[0]
                    .sail_to_conneting
                );
            $("#update_position_input_arrive_connect")
                .val(jsonData[0]
                    .arrive_at_conneting
                );
            $("#update_position_input_sail_des")
                .val(jsonData[0]
                    .sail_to_dest
                );
            $("#update_position_input_arrive_des")
                .val(jsonData[0]
                    .arrived_at_dest
                );
            $("#update_position_input_warehouse")
                .val(jsonData[0]
                    .arrived_at_warehouse
                );


        } else {
            $('#UpdateConsignmentLoader')
                .addClass(
                    'd-none');
            $('#WrongConsignmentUpdate')
                .removeClass(
                    'd-none');
        }
    }).catch(function(error) {
        $('#UpdateConsignmentLoader')
            .addClass('d-none');
        $('#WrongConsignmentUpdate')
            .removeClass(
                'd-none');
    })
}


$('#Update_Consign_ConfirmBtn').click(
    function() {

        // var data = $("#UpdateConsignment").serialize();

        var data = {
            // 'data_id': $('#data_id_for_update').val(),
            'Update_lc_no': $('#Update_lc_no').val(),
            'update_tank_number': $('#update_tank_number').val(),
            'update_position_input_consignee': $(
                '#update_position_input_consignee'
            ).val(),
            'update_position_input_origin': $(
                '#update_position_input_origin'
            ).val(),
            'update_position_input_destination': $(
                '#update_position_input_destination'
            ).val(),
            'update_position_input_etd_des': $(
                '#update_position_input_etd_des'
            ).val(),
            'update_position_input_eta_des': $(
                '#update_position_input_eta_des'
            ).val(),
            'update_position_input_loading_date': $(
                "#update_position_input_loading_date"
            ).val(),
            'update_position_input_connect_port': $(
                "#update_position_input_connect_port"
            ).val(),
            'update_arrived_at_connecting_port': $(
                "#update_arrived_at_connecting_port"
            ).val(),
            'update_position_input_sail': $(
                "#update_position_input_sail"
            ).val(),
            'update_position_input_arrive_des_port': $(
                "#update_position_input_arrive_des_port"
            ).val(),
            'update_position_input_arrive_cus': $(
                "#update_position_input_arrive_cus"
            ).val(),
            'update_position_input_arrive_warh': $(
                "#update_position_input_arrive_warh"
            ).val(),
            'update_position_input_loading_port': $(
                "#update_position_input_loading_port"
            ).val(),
            'update_position_input_sail_connect': $(
                "#update_position_input_sail_connect"
            ).val(),
            'update_position_input_arrive_connect': $(
                "#update_position_input_arrive_connect"
            ).val(),
            'update_position_input_sail_des': $(
                "#update_position_input_sail_des"
            ).val(),
            'update_position_input_arrive_des': $(
                "#update_position_input_arrive_des"
            ).val(),
            'update_position_input_warehouse': $(
                "#update_position_input_warehouse"
            ).val(),

        }


        var data_id = $(
            '#data_id_for_update'
        ).val();
        console.log(data);
        // console.log(data_id);





        const url =
            "/updateposition/" +
            data_id;
        $('#Update_Consign_ConfirmBtn')
            .html(
                "<div class='spinner-border spinner-border-sm' role='status'></div>"
            )
        axios.post(url, data).then(
            function(response) {
                $('#Update_Consign_ConfirmBtn')
                    .html(
                        "Save");
                if (response
                    .status ==
                    200) {
                    if (response
                        .data ==
                        1) {
                        $('#updateConsignmentModal')
                            .modal(
                                'hide'
                            );
                        toastr
                            .success(
                                'Update Barnd Success'
                            );
                        getAllConsignment
                            ();
                    } else {
                        $('#updateConsignmentModal')
                            .modal(
                                'hide'
                            );
                        toastr
                            .error(
                                'Update Barnd Fail'
                            );
                        getAllConsignment
                            ();
                    }
                } else {
                    $('#updateConsignmentModal')
                        .modal(
                            'hide'
                        );
                    toastr
                        .error(
                            'Something Went Wrong !'
                        );
                }
            }).catch(function(
            error) {
            $('#updateConsignmentModal')
                .modal(
                    'hide');
            toastr.error(
                'Something Went Wrong !'
            );
        })
    })



// show single data in modal

function ShowDetailsPosition(id) {

    axios.post('/showPosition', {
        id: id
    }).then(function(response) {

        if (response.status ==
            200 && response.data
        ) {
            var jsondata =
                response.data;
            console.log(
                jsondata[0]
                .lc_no);

            $('#showPositionTank_no')
                .text(jsondata[
                        0]
                    .tank_number
                );
            $('#showPositionLc_no')
                .text(jsondata[
                        0]
                    .lc_no);
            $('#showPositionConsign')
                .text(jsondata[
                        0]
                    .consignee_name
                );
            $('#showPositionOrigin')
                .text(jsondata[
                        0]
                    .origin);
            $('#showPositionDestination')
                .text(jsondata[
                        0]
                    .destination
                );
            $('#showPositionEtd')
                .text(jsondata[
                        0]
                    .etd_to_final_dest
                );
            $('#showPositionEta')
                .text(jsondata[
                        0]
                    .eta_to_final_dest
                );
            $('#showPositionLoadingDate')
                .text(jsondata[
                        0]
                    .loading_date
                );
            $('#showPositionConnecting_port')
                .text(jsondata[
                        0]
                    .connecting_port_name
                );
            $('#showPositionArrive_Connecting_port')
                .text(jsondata[
                        0]
                    .arrived_at_connecting_port
                );
            $('#showPositionSailToDes')
                .text(jsondata[
                        0]
                    .sail_to_dest_port
                );
            $('#showPositionArriveAtDes')
                .text(jsondata[
                        0]
                    .arrived_at_dest_port
                );
            $('#showPositionArriveAtCus')
                .text(jsondata[
                        0]
                    .arrival_at_customer
                );
            $('#showPositionArriveAtWarwhouse')
                .text(jsondata[
                        0]
                    .arrive_to_agent_warehouse
                );
            $('#showPositionLoadingPort')
                .text(jsondata[
                        0]
                    .loading_port
                );
            $('#showPositionSailToConnect')
                .text(jsondata[
                        0]
                    .sail_to_conneting
                );
            $('#showPositionArriveAtConnect')
                .text(jsondata[
                        0]
                    .arrive_at_conneting
                );
            $('#showPositionSailDes')
                .text(jsondata[
                        0]
                    .sail_to_dest
                );
            $('#showPositionArriveDes')
                .text(jsondata[
                        0]
                    .arrived_at_dest
                );
            $('#showPositionArriveWah')
                .text(jsondata[
                        0]
                    .arrived_at_warehouse
                );
            $('#showPositionStatus')
                .text(jsondata[
                        0]
                    .tank_status
                );
        } else {

            toastr.error(
                'Something Went Worng!!'
            );
        }

    }).catch(function(error) {

        toastr.error(
            'Something Went Worng!!'
        );
    })

}


// delete ConsignmentDeleteBtn

$('#PositionDeleteConfirmBtn').click(
    function() {
        var id = $(
            '#deleteModalPositionId'
        ).text();

        // var url = "{{ route('positions.destroy', ':id') }}";
        var url =
            "{{ route('positions.destroy', '') }}" +
            "/" + id

        // url = url.replace(':id', id);

        $('#PositionDeleteConfirmBtn')
            .html(
                "<div class='spinner-border spinner-border-sm' role='status'></div>"
            )
        axios.post(
            '/positionDelete', {
                id: id
            }).then(function(
            response) {

            console.log(
                response
                .status);
            $('#PositionDeleteConfirmBtn')
                .html(
                    'Yes');
            if (response
                .status ==
                200) {
                if (response
                    .data ==
                    1) {
                    $('#deleteTankPosition')
                        .modal(
                            'hide'
                        );
                    toastr
                        .success(
                            'Tank Consignment delete successfully!!'
                        );
                    getAllConsignment
                        ();
                } else {
                    $('#deleteTankPosition')
                        .modal(
                            'hide'
                        );
                    toastr
                        .error(
                            'Tank Consignment delete fail!!'
                        );
                    getAllConsignment
                        ();
                }
            } else {
                $('#deleteTankPosition')
                    .modal(
                        'hide'
                    );
                toastr
                    .error(
                        'Something Went Worng!!'
                    );
            }

        }).catch(function(
            error) {
            $('#deleteTankPosition')
                .modal(
                    'hide');
            toastr.error(
                'Something Went Worng!!'
            );
        })
    })

// add new Tank Consignment
$('#addNewConsignment').click(
    function() {
        $('#addConsignmentModal')
            .modal('show');
    })

$('#ConsignmentAddConfirmBtn').click(
    function() {
        var data = $(
                "#AddConsignment")
            .serialize();

        console.log(data);
        addConsignment(data);
    })

function addConsignment(data) {
    const url = '{{ route("positions.store") }}';
    $('#ConsignmentAddConfirmBtn').html(
        "<div class='spinner-border spinner-border-sm' role='status'></div>"
    )
    axios.post(url, data).then(function(
        response) {
        console.log(response);
        $('#ConsignmentAddConfirmBtn')
            .html("Save");
        if (response.status ==
            200) {
            if (response.data ==
                1) {
                $('#addConsignmentModal')
                    .modal(
                        'hide');
                toastr.success(
                    'Add Success'
                );
                getAllConsignment
                    ();
            } else {
                $('#addConsignmentModal')
                    .modal(
                        'hide');
                toastr.error(
                    'Add Fail'
                );
                getAllConsignment
                    ();
            }
        }
    }).catch(function(error) {
        console.log(error);
        $('#addConsignmentModal')
            .modal('hide');
        toastr.error(
            'Something Went Wromg'
        );
    });
}


$consignee = $('#consignee_name');
$origin = $('#consignee_name').val();
$destination = $('#consignee_name')
    .val();


$('#arrived_at_connecting_port').keyup(
    function() {

        if ($(this).val().length ==
            0) {} else {
            $('#return_data')
                .show();
        }
    })



$('#tank_number').select2({
    dropdownParent: $(
        '#addConsignmentModal'
    ),
    placeholder: 'Select an item',
    ajax: {
        url: '/auto_tank',
        dataType: 'json',
        delay: 250,
        processResults: function(
            data) {

            return {

                results: $
                    .map(
                        data,
                        function(
                            item
                        ) {
                            return {
                                text: item
                                    .tank_number,
                                id: item
                                    .tank_number,
                            }


                        })
            };
        },
        cache: true
    }
});


$('#lc_no').select2({
    dropdownParent: $(
        '#addConsignmentModal'
    ),
    placeholder: 'Select an item',
    ajax: {
        url: '/auto_lc',
        dataType: 'json',
        delay: 250,
        processResults: function(
            data) {

            return {

                results: $
                    .map(
                        data,
                        function(
                            item
                        ) {
                            return {
                                text: item
                                    .lc_no,
                                id: item
                                    .id,
                            }


                        })
            };
        },
        cache: true
    }
});

// $('#Update_lc_no').select2({
//     dropdownParent: $('#updateConsignmentModal'),
//     ajax: {
//         url: '/auto_lc',
//         dataType: 'json',
//         delay: 250,
//         processResults: function(data) {
//             return {

//                 results: $.map(data, function(item) {
//                     // console.log(id);
//                     return {
//                         text: item.lc_no,
//                         id: item.id,
//                     }


//                 })
//             };
//         },
//         cache: true
//     }
// });
$('#Update_lc_no').select2({
    dropdownParent: $(
        '#updateConsignmentModal'
    ),
    placeholder: 'Select an item',
    ajax: {
        url: '/auto_lc',
        dataType: 'json',
        delay: 250,
        processResults: function(
            data) {
            return {

                results: $
                    .map(
                        data,
                        function(
                            item
                        ) {
                            // console.log(id);
                            return {
                                text: item
                                    .lc_no,
                                id: item
                                    .id,
                            }


                        })
            };
        },
        cache: true
    }
});



$('#update_tank_number').select2({
    placeholder: 'Select an item',
    dropdownParent: $(
        '#updateConsignmentModal'
    ),
    ajax: {
        url: '/auto_tank',
        dataType: 'json',
        delay: 250,
        processResults: function(
            data) {
            // $('#consignee_name').val(data);

            return {

                results: $
                    .map(
                        data,
                        function(
                            item
                        ) {
                            // console.log(id);
                            return {
                                text: item
                                    .tank_number,
                                id: item
                                    .tank_number,
                            }


                        })
            };
        },
        cache: true
    }
});





$('#lc_no').on('change', function() {
    var data = $(
        "#lc_no option:selected"
    ).val();
    // $("#test").val(data);

    axios.post('/getlc', {
        id: data

    }).then(function(
        response) {
        if (response
            .status ==
            200 &&
            response
            .data) {
            var jsonData =
                response
                .data;
            $consignee =
                $(
                    '#position_input_consignee'
                )
                .val(
                    jsonData[
                        0
                    ]
                    .consignee_name
                );
            $origin = $(
                    '#position_input_origin'
                )
                .val(
                    jsonData[
                        0
                    ]
                    .origin
                );
            $destination
                = $(
                    '#position_input_destination'
                )
                .val(
                    jsonData[
                        0
                    ]
                    .destination
                );
        } else {}
    }).catch(function(
        error) {});


})


$('#Update_lc_no').on('change',
    function() {
        var data = $(
            "#Update_lc_no option:selected"
        ).val();
        // $("#test").val(data);

        console.log('change', data);

        axios.post('/upgetlc', {
            id: data

        }).then(function(
            response) {

            if (response
                .status ==
                200 &&
                response
                .data) {
                var jsonData =
                    response
                    .data;
                // console.log(jsonData[0].destination);
                $('#update_position_input_consignee')
                    .val(
                        jsonData[
                            0
                        ]
                        .consignee_name
                    );
                $('#update_position_input_origin')
                    .val(
                        jsonData[
                            0
                        ]
                        .origin
                    );
                $('#update_position_input_destination')
                    .val(
                        jsonData[
                            0
                        ]
                        .destination
                    );
            } else {

            }
        }).catch(function(
            error) {});


    })

$(document).ready(function() {

    function makeonchange(first,
        second) {

        first.readOnly = true;
        second.readOnly = false;

    }
    var $sel1 = $(
        "select[name=lc_no]"
    );

    var inp1 = document
        .getElementById(
            "tank_number");
    var inp2 = document
        .getElementById(
            "lc_no");
    var inp3 = document
        .getElementById(
            "position_input_etd_des"
        );
    var inp4 = document
        .getElementById(
            "position_input_eta_des"
        );
    var inp5 = document
        .getElementById(
            "position_input_loading_date"
        );
    var inp6 = document
        .getElementById(
            "position_input_connect_port"
        );
    var inp7 = document
        .getElementById(
            "arrived_at_connecting_port"
        );
    var inp8 = document
        .getElementById(
            "position_input_sail"
        );
    var inp9 = document
        .getElementById(
            "position_input_arrive_des_port"
        );
    var inp10 = document
        .getElementById(
            "position_input_arrive_cus"
        );
    var inp11 = document
        .getElementById(
            "position_input_arrive_warh"
        );
    var inp12 = document
        .getElementById(
            "position_input_loading_port"
        );
    var inp13 = document
        .getElementById(
            "position_input_sail_connect"
        );
    var inp14 = document
        .getElementById(
            "position_input_arrive_connect"
        );
    var inp15 = document
        .getElementById(
            "position_input_sail_des"
        );
    var inp16 = document
        .getElementById(
            "position_input_arrive_des"
        );
    var inp17 = document
        .getElementById(
            "position_input_warehouse"
        );
    $(function() {
        // document.getElementById("lc_no").attr("readonly", "readonly");
        // document.getElementById("lc_no").style.display = 'none';
        // document.getElementsByClassName("select2").attr("readonly", "readonly");
        // $('#lc_no').prop('readonly', true);

        if ($("#lc_no")) {
            $("#lc_no").attr("readonly", "readonly");
        }

        if (document.getElementById("position_input_etd_des")) {
            document.getElementById("position_input_etd_des").readOnly = true;
        }
        if (document.getElementById("position_input_eta_des")) {
            document.getElementById("position_input_eta_des").readOnly = true;
        }

        if (document.getElementById("position_input_loading_date")) {
            document.getElementById("position_input_loading_date").readOnly = true;
        }
        if (document.getElementById("position_input_connect_port")) {
            document.getElementById("position_input_connect_port").readOnly = true;
        }

        if (document.getElementById("arrived_at_connecting_port")) {
            document.getElementById("arrived_at_connecting_port").readOnly = true;
        }

        if (document.getElementById("position_input_sail")) {
            document.getElementById("position_input_sail").readOnly = true;
        }

        if (document.getElementById("position_input_arrive_des_port")) {
            document.getElementById("position_input_arrive_des_port").readOnly = true;
        }

        if (document.getElementById("position_input_arrive_cus")) {
            document.getElementById("position_input_arrive_cus").readOnly = true;
        }

        if (document.getElementById("position_input_arrive_warh")) {
            document.getElementById("position_input_arrive_warh").readOnly = true;
        }

        if (document.getElementById("position_input_loading_port")) {
            document.getElementById("position_input_loading_port").readOnly = true;
        }

        if (document.getElementById("position_input_sail_connect")) {
            document.getElementById("position_input_sail_connect").readOnly = true;
        }

        if (document.getElementById("position_input_arrive_connect")) {
            document.getElementById("position_input_arrive_connect").readOnly = true;
        }

        if (document.getElementById("position_input_sail_des")) {
            document.getElementById("position_input_sail_des").readOnly = true;
        }
        if (document.getElementById("position_input_arrive_des")) {
            document.getElementById("position_input_arrive_des").readOnly = true;
        }

        if (document.getElementById("position_input_warehouse")) {
            document.getElementById("position_input_warehouse").readOnly = true;
        }




    });

    if (inp1) {
        inp1.onchange =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    $("#lc_no")
                        .removeAttr(
                            "readonly"
                        );
                }
            }
    }
    if (inp2) {
        inp2.onchange =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {

                    $("#tank_number")
                        .attr(
                            "readonly",
                            "readonly"
                        );
                    inp3.readOnly =
                        false;
                    // makeonchange(inp1, inp3);
                }
            }
    }

    if (inp3) {
        inp3.onchange =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    $("#lc_no")
                        .attr(
                            "readonly",
                            "readonly"
                        );
                    inp4.readOnly =
                        false;
                    // makeonchange(inp2, inp4);
                }
            }
    }
    if (inp4) {
        inp4.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp3,
                            inp5
                        );
                }
            }
    }
    if (inp5) {
        inp5.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp4,
                            inp6
                        );
                }
            }
    }
    if (inp6) {
        inp6.onkeyup =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp5,
                            inp7
                        );
                }
            }
    }
    if (inp7) {
        inp7.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp6,
                            inp8
                        );
                }

            }
    }
    if (inp8) {
        inp8.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp7,
                            inp9
                        );
                }

            }
    }
    if (inp9) {
        inp9.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp8,
                            inp10
                        );
                }
            }
    }
    if (inp10) {
        inp10.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp9,
                            inp11
                        );
                }
            }
    }
    if (inp11) {
        inp11.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp10,
                            inp12
                        );
                }
            }
    }

    if (inp12) {
        inp12.onkeyup =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp11,
                            inp13
                        );
                }

            }
    }

    if (inp13) {

        inp13.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp12,
                            inp14
                        );
                }

            }
    }
    if (inp14) {
        inp14.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp13,
                            inp15
                        );
                }
            }
    }
    if (inp15) {
        inp15.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp14,
                            inp16
                        );
                }
            }
    }

    if (inp16) {
        inp16.oninput =
            function() {
                if (this
                    .value !=
                    "" || this
                    .value
                    .length > 0
                ) {
                    makeonchange
                        (inp15,
                            inp17
                        );
                }
            }
    }


});


$(function() {
    var dtToday = new Date();

    var month = dtToday
        .getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday
        .getFullYear();
    if (month < 10) month =
        '0' + month.toString();
    if (day < 10) day = '0' +
        day.toString();
    var minDate = year + '-' +
        month +
        '-' + day;
    $('input[type="date" ]')
        .attr('min', minDate);
});
</script>
@endsection