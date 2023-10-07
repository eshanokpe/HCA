@extends('admin.layout.app')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">List Of Shifts</h6>
              </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success text-white mt-3">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                  <div class="d-flex justify-content-end text-end pe-4 mb-3">
                      <a href="{{route('admin.addShifts')}}" class="btn btn-primary"> 
                        <i class="fas fa-user-nurse"></i> +Add Shifts</a>
                  </div>
                    {{-- <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fullname</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Shift</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date created</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr> --}}
                  </thead>
                  <tbody>
                 
                  </tbody>
                </table>
                <div class="row">
                  {{-- <div class="col-md-3">
                      <h2>Monday</h2>
                      @foreach ($groupedSchedules['monday'] as $schedule)
                          <p>{{ $schedule->shift_type }} - {{ $schedule->staff_type }}</p>
                      @endforeach
                      <h2>Tuesday</h2>
                      @foreach ($groupedSchedules['tuesday'] as $schedule)
                          <p>{{ $schedule->shift_type }} - {{ $schedule->staff_type }}</p>
                      @endforeach
                  </div> --}}
                  <div class="col-lgp-12">
                      <h2>All Days</h2>
                      @foreach ($groupedSchedules as $day => $schedules)
                          <h3>{{ ucfirst($day) }}</h3>
                          <div class="row">
                              @foreach ($schedules as $schedule)
                                <div class="col-md-1">
                                  <div class="d-flex align-items-center">
                                      <p>{{ $schedule->staff_type }} {{ $schedule->shift_type }} {{ $schedule->start_time}} - {{$schedule->end_time }}</p>
                                      <small></small>
                                  </div>
                              </div>
                              @endforeach
                          </div>
                      @endforeach
                  </div>
                  <div class="">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>      
@endsection 


   