@extends('layouts.master')

@section('content')
<div class="row">
    <!-- <div class="col-md-3 margin-tb mb-4">
        <div class="pull-left text-danger">
            <nav class="nav flex-column ">
                <a class="nav-link" href="#">Active</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link" href="#">Link</a>
                <a class="nav-link">Disabled</a>
            </nav>
        </div>
    </div> -->

    <div class="col-md-3 margin-tb mb-4">
        <div class="bg-primary card mb-4 draggable">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers text-light">

                            <div class="row">
                                <div class="col-8">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Tank Info</p>
                                </div>
                                <div class="col-4">
                                    <div class="text-center border-radius-md p-1">
                                        <!-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> -->
                                        <i class="fa-solid fa-toolbox text-light fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center my-2">
                                <span class="badge bg-success-soft text-xxs">
                                    <i class="fas fa-angle-up text-light" aria-hidden="true"></i>
                                </span>


                                <span class="text-xs font-weight-bolder ms-1">{{count($tank)}}</span>
                            </div>
                            <h4 class="font-weight-bolder mb-0">
                                <div class="visit_icon_div">
                                    <i class="fa-regular fa-hand-point-right"></i>
                                    <span class="visit_icon">Visit Tanks</span>
                                </div>

                                <!-- <i class="fa-solid fa-eye text-warning"></i> -->
                            </h4>
                        </div>
                    </div>
                    <!-- <div class="col-4 text-end">
                        <div class="text-center border-radius-md p-1">
                            <i class="fa-solid fa-toolbox text-light fa-2xl"></i>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 margin-tb mb-4">
        <div class="bg-danger card mb-4 draggable">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers text-light">

                            <div class="row">
                                <div class="col-8">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Port Info</p>
                                </div>
                                <div class="col-4">
                                    <div class="text-center border-radius-md p-1">
                                        <i class="fa-solid fa-ship text-light fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center my-2">
                                <span class="badge bg-success-soft text-xxs">
                                    <i class="fas fa-angle-up text-light" aria-hidden="true"></i>
                                </span>
                                <span class="text-xs font-weight-bolder ms-1">{{count($port)}}</span>
                            </div>
                            <h4 class="font-weight-bolder mb-0">
                                <div class="visit_icon_div">
                                    <i class="fa-regular fa-hand-point-right"></i>
                                    <span class="visit_icon">Visit Ports</span>
                                </div>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 margin-tb mb-4">
        <div class="bg-warning card mb-4 draggable">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers text-light">

                            <div class="row">
                                <div class="col-8">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">LC Info</p>
                                </div>
                                <div class="col-4">
                                    <div class="text-center border-radius-md p-1">
                                        <!-- <i class="fa-solid fa-toolbox text-light fa-2xl"></i> -->
                                        <i class="fa-solid fa-file-lines fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center my-2">
                                <span class="badge bg-success-soft text-xxs">
                                    <i class="fas fa-angle-up text-light" aria-hidden="true"></i>
                                </span>
                                <span class="text-xs font-weight-bolder ms-1">{{count($lc)}}</span>
                            </div>
                            <h4 class="font-weight-bolder mb-0">
                                <div class="visit_icon_div">
                                    <i class="fa-regular fa-hand-point-right"></i>
                                    <span class="visit_icon">Visit LCS</span>
                                </div>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 margin-tb mb-4">
        <div class="bg-success card mb-4 draggable">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers text-light">

                            <div class="row">
                                <div class="col-8">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Tank Consignment</p>
                                </div>
                                <div class="col-4">
                                    <div class="text-center border-radius-md p-1">
                                        <i class="fa-solid fa-truck text-light fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center my-2">
                                <span class="badge bg-success-soft text-xxs">
                                    <i class="fas fa-angle-up text-light" aria-hidden="true"></i>
                                </span>
                                <span class="text-xs font-weight-bolder ms-1">{{count($position)}}</span>
                            </div>
                            <h4 class="font-weight-bolder mb-0">
                                <div class="visit_icon_div">
                                    <i class="fa-regular fa-hand-point-right"></i>
                                    <span class="visit_icon">Visit Consignment</span>
                                </div>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 margin-tb mb-4">
        <div class="bg-secondary card mb-4 draggable">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="numbers text-light">

                            <div class="row">
                                <div class="col-8">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">User Info</p>
                                </div>
                                <div class="col-4">
                                    <div class="text-center border-radius-md p-1">
                                        <i class="fa-solid fa-users text-light fa-2xl"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center my-2">
                                <span class="badge bg-success-soft text-xxs">
                                    <i class="fas fa-angle-up text-light" aria-hidden="true"></i>
                                </span>
                                <span class="text-xs font-weight-bolder ms-1">{{count($users)}}</span>
                            </div>
                            <h4 class="font-weight-bolder mb-0">
                                <div class="visit_icon_div">
                                    <i class="fa-regular fa-hand-point-right"></i>
                                    <span class="visit_icon">Visit Users</span>
                                </div>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection