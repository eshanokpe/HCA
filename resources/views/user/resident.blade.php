@extends('user.layout.app')
@section('content')
        <div class="container-fluid py-4 ">
            <div class="row">
                <div class="col-6">
                    <h6><i class="fa fa-home"></i> | <i class="fa fa-users"></i> \ Residents</h6>
                </div>
                <div class="col-6">

                    <div class="text-end">
                        <small><b>{{ $residents->fullname  }}</b></small>
                        <img src="assets/img/prof.jpeg" alt="team1" class="avatar avatar-md rounded-circle">

                    </div>
                </div>
            </div>
            @include('user.layout.tab')
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="row">
                <div class="col-sm-6 mb-xl-0 mb-2 mt-2">
                    <div class="card">
                        <div class="card-header card-footer  p-3 pt-2">

                            <div class="row">
                                <div class="col-12">
                                    <h6><i class="fa-solid fa-arrow-up-from-bracket"></i> + Added</h6>
                                    <hr class="dark horizontal my-0">
                                </div>
                                <div class="col-6 p-1 pb-0">
                                    <div class="bg-dark">
                                        <div class="row">
                                            <div class="col-9 text-white ps-3">
                                                <i class="fa-solid fa-circle-plus text-white"></i>
                                                <a href="#" class="text-white"> Medication</a>
                                            </div>
                                            <div class="col-3 text-white">
                                                <a href="#">
                                                    <i class="fa-solid fa-file-pen text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 p-1 pb-0">
                                    <div class="bg-dark">
                                        <div class="row">
                                            <div class="col-9 text-white ps-3">
                                                <i class="fa-solid fa-circle-plus text-white"></i>
                                                <a href="#" class="text-white"> Medication</a>
                                            </div>
                                            <div class="col-3 text-white">
                                                <a href="#">
                                                    <i class="fa-solid fa-file-pen text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 p-1 pb-0">
                                    <div class="bg-dark">
                                        <div class="row">
                                            <div class="col-9 text-white ps-3">
                                                <i class="fa-solid fa-circle-plus text-white"></i>
                                                <a href="#" class="text-white"> Medication</a>
                                            </div>
                                            <div class="col-3 text-white">
                                                <a href="#">
                                                    <i class="fa-solid fa-file-pen text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 p-1 pb-0">
                                    <div class="bg-dark">
                                        <div class="row">
                                            <div class="col-9 text-white ps-3">
                                                <i class="fa-solid fa-circle-plus text-white"></i>
                                                <a href="#" class="text-white"> Medication</a>
                                            </div>
                                            <div class="col-3 text-white">
                                                <a href="#">
                                                    <i class="fa-solid fa-file-pen text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 p-1 pb-0">
                                    <div class="bg-dark">
                                        <div class="row">
                                            <div class="col-9 text-white ps-3">
                                                <i class="fa-solid fa-circle-plus text-white"></i>
                                                <a href="#" class="text-white"> Medication</a>
                                            </div>
                                            <div class="col-3 text-white">
                                                <a href="#">
                                                    <i class="fa-solid fa-file-pen text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 p-1 pb-0">
                                    <div class="bg-dark">
                                        <div class="row">
                                            <div class="col-9 text-white ps-3">
                                                <i class="fa-solid fa-circle-plus text-white"></i>
                                                <a href="#" class="text-white"> Medication</a>
                                            </div>
                                            <div class="col-3 text-white">
                                                <a href="#">
                                                    <i class="fa-solid fa-file-pen text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-xl-0 mb-2 mt-2 disp">
                    <div class="card">
                        <div class="card-header card-footer  p-3 pt-2">
                        <div class="row">
                            <div class="col-12">
                                <h6><i class="fa-solid fa-rotate"></i> Offten Added</h6>
                                <hr class="dark horizontal my-0">
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Medication</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Fluid Intake</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Bowel</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Change Pad</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Oral Hygiene</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Food</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 mb-xl-0 mb-2 mt-2 fixed-bottom mb-5 hid">
                <div class="card mb-4">
                    <div class="card-header card-footer  p-3 pt-2">
                        <div class="row">
                            <div class="col-12">
                                <h6><i class="fa-solid fa-rotate"></i> Offten Added</h6>
                                <hr class="dark horizontal my-0">
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Medication</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Fluid Intake</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Bowel</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Change Pad</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Oral Hygiene</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 p-1 pb-0">
                                <div class="bg-dark">
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Food</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('user.layout.footertab')
            
        </div>

@endsection