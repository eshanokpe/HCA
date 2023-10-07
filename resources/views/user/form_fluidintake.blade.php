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
            <h6 class="font-weight-bolder">Form (Fluid Intake)</h6>
                <form role="form" action="{{ route('hca.postform_fluid') }}" method="POST">
                    @csrf
                    <input type="hidden" name="hca_no" class="form-control" value="{{ $residents->hca_no}}">
                    <input type="hidden" name="id" class="form-control" value="{{ $residents->id}}">
                    <input type="hidden" name="hca_name" class="form-control" value="{{ $user->fullname}}">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Time</label>
                                <input type="time" name="time" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                            <select name="type" id="type" class="form-control">
                                <option>-- Select Type --</option>
                                <option value="large">Large</option>
                                <option value="mediun">Medium</option>
                                <option value="small">Small</option>
                            </select>
                            <input type="hidden" name="formtype" class="form-control" value="Fluid Intake">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                                <select name="qty_given" id="type" class="form-control">
                                    <option>-- Quantity Giving --</option>
                                    <option value="4ml">4ml</option>
                                    <option value="3ml">3ml</option>
                                    <option value="2ml">2ml</option>
                                    <option value="1ml">1ml</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                                <select name="qty_taken" id="type" class="form-control">
                                    <option>-- Quantity Taken --</option>
                                    <option value="4ml">4ml</option>
                                    <option value="3ml">3ml</option>
                                    <option value="2ml">2ml</option>
                                    <option value="1ml">1ml</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Note</label>
                                <input type="text" name="note" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary  w-100 mt-4 mb-0">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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