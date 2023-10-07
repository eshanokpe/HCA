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
        <div class="row">
            <div class="col-sm-5">
            <div class="card card-plain">
            <div class="card-header">
                
            <h6 class="font-weight-bolder">
                <i class="fa-solid fa-clipboard text-dark" style="font-size: 18px;"></i>
                Forms
            </h6>
                <small class="mb-0">Choose the particular form for update</small>
                    <div class="row">
                        <div class="col-6 p-1 pb-0">
                            <div class="bg-dark">
                               <a href="#"> 
                                    <div class="row">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="{{route('hca.formfluid', ['id' => $residents->id])}}" class="text-white"> Fluid Intake</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-6 p-1 pb-0">
                            <div class="bg-dark">
                                    <div class="row">
                                        <a href="#">
                                        <div class="col-9 text-white ps-3">
                                            <i class="fa-solid fa-circle-plus text-white"></i>
                                            <a href="#" class="text-white"> Medication</a>
                                        </div>
                                        <div class="col-3 text-white">
                                            <a href="#">
                                                <i class="fa-solid fa-file-pen text-white"></i>
                                            </a>
                                        </div>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 p-1 pb-0">
                            <div class="bg-dark">
                                <div class="row">
                                <a href="#">
                                    <div class="col-9 text-white ps-3">
                                        <i class="fa-solid fa-circle-plus text-white"></i>
                                        <a href="{{route('hca.formbowel', ['id' => $residents->id])}}" class="text-white"> Bowel</a>
                                    </div>
                                    <div class="col-3 text-white">
                                        <a href="#">
                                            <i class="fa-solid fa-file-pen text-white"></i>
                                        </a>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-1 pb-0">
                            <div class="bg-dark">
                                <div class="row">
                                <a href="#">
                                    <div class="col-9 text-white ps-3">
                                        <i class="fa-solid fa-circle-plus text-white"></i>
                                        <a href="#" class="text-white"> Repositioning</a>
                                    </div>
                                    <div class="col-3 text-white">
                                        <a href="#">
                                            <i class="fa-solid fa-file-pen text-white"></i>
                                        </a>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 p-1 pb-0">
                            <div class="bg-dark">
                                <div class="row">
                                <a href="#">
                                    <div class="col-9 text-white ps-3">
                                        <i class="fa-solid fa-circle-plus text-white"></i>
                                        <a href="#" class="text-white"> Food</a>
                                    </div>
                                    <div class="col-3 text-white">
                                        <a href="#">
                                            <i class="fa-solid fa-file-pen text-white"></i>
                                        </a>
                                    </div>
                                </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 p-1 pb-0">
                            <div class="bg-dark">
                                <div class="row">
                                <a href="#">
                                    <div class="col-9 text-white ps-3">
                                        <i class="fa-solid fa-circle-plus text-white"></i>
                                        <a href="#" class="text-white"> Night Check</a>
                                    </div>
                                    <div class="col-3 text-white">
                                        <a href="#">
                                            <i class="fa-solid fa-file-pen text-white"></i>
                                        </a>
                                    </div>
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
            <footer class="footer py-4  ">
                <div class="container-fluid">

                </div>
            </footer>
    </div>

@endsection