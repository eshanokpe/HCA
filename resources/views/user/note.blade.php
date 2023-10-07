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
            <h6 class="font-weight-bolder">Daily Note</h6>
                    <small class="mb-0">Daily observation of the residents</small>
                <form role="form" action="{{ route('hca.postnote') }}" method="POST">
                    @csrf
                    <input type="hidden" name="hca_no" class="form-control" value="{{ $residents->hca_no}}">
                    <input type="hidden" name="id" class="form-control" value="{{ $residents->id}}">
                    <input type="hidden" name="hca_name" class="form-control" value="{{ $user->fullname}}">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group input-group-outline mb-3">
                                
                                <textarea class="form-control" name="note" placeholder="note" id="" cols="30" rows="10"></textarea>
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