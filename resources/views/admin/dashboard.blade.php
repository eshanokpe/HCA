@extends('admin.layout.app')
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card my-4">
                <div class="card-header p-0  bg-gradient-primary">
                    <h6 class="text-white text-capitalize ps-3">Resident's</h6>
                </div> 
                <div class="card-body">
                    <h5 class="card-title">{{ $totalResidents }}</h5>
                    <p class="card-text">Number of Resident's</p>
                    <a href="{{ route('admin.residents') }}" class="btn btn-primary">View More</a>
                </div>
            </div>

        </div>
        <div class="col-4">
            <div class="card my-4">
                <div class="card-header p-0  bg-gradient-primary">
                    <h6 class="text-white text-capitalize ps-3"> HCA</h6>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totlaHca }}</h5>
                    <p class="card-text">Number of HCA</p>
                    <a href="{{ route('admin.hcaworkers') }}" class="btn btn-primary">View More</a>
                </div>
            </div>

        </div>
        <div class="col-4">
            <div class="card my-4">
                <div class="card-header p-0  bg-gradient-primary">
                    <h6 class="text-white text-capitalize ps-3">Nurse</h6>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalNurse }}</h5>
                    <p class="card-text">Number of Nurse</p>
                    <a href="{{ route('admin.nurses')}}" class="btn btn-primary">View More</a>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card my-4">
                <div class="card-header p-0  bg-gradient-primary">
                    <h6 class="text-white text-capitalize ps-3">Shifts</h6>
                </div> 
                <div class="card-body">
                    <h5 class="card-title">{{ $totlaShifts }}</h5>
                    <p class="card-text">Number of Shifts</p>
                    <a href="{{ route('admin.shifts') }}" class="btn btn-primary">View More</a>
                </div>
            </div>

        </div>

    </div>
@endsection