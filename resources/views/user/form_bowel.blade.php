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
            <h6 class="font-weight-bolder">Form (Bowel)</h6>
                <form role="form" action="{{ route('hca.postform_bowel') }}" method="POST">
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
                            <input type="hidden" name="formtype" class="form-control" value="Bowel">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                                <select name="quality" id="type" class="form-control">
                                    <option>-- Quality --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                                <select name="color" id="type" class="form-control">
                                    <option>-- Select Color --</option>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Green">Green</option>
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