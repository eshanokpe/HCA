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
            @if (session('error'))
                <div class="alert alert-danger text-white mt-3">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                  <div class="d-flex justify-content-end text-end pe-4 mb-3 mt-3">
                      <a href="{{route('admin.addShifts')}}" class="btn btn-primary"> 
                        <i class="fas fa-user-nurse"></i> +Add Shifts</a>
                  </div>
                  </thead>
                  <tbody>
                 
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-lgp-12">
                      {{-- <h2>All Days</h2> --}}
                      <table border="1" class="table  mb-0">
                        <thead class=" ">
                          <tr class="border">
                            <th>All Days</th>
                            <th></th>
                            <th colspan="6" style="background-color: black; color:white; align-text:center" >HCA</th>
                            <th colspan="2" style="background-color: pink; color:white; align-text:center">Nurse</th>
                          </tr>
                          <tr class="border">
                            <th>Shift Type </th>
                            <th>Date</th>
                            <th colspan="2" class="border" >Floor 1</th>
                            <th colspan="2" class="border">Floor 2</th>
                            <th colspan="2" class="border">Floor 3</th>
                            <th colspan="1"  class="border">Floor 1</th>
                            <th colspan="1"  class="border">Floor 2</th>
                            <th colspan="1"  class="border"><b>Action</b></th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($schedules as $schedule)
                          <tr> 
                              @if ( $schedule->shift_type == 'Morning')
                              <td> Morning</td>
                              @else
                             <td> Evening</td>
                              @endif
                            
                             <td > {{ \Carbon\Carbon::parse($schedule->date)->format('M jS, Y (l)') }} </td>
                            <td colspan="2" class="border" > {{ $schedule->hca1}}, {{ $schedule->hca2}}</td>
                            <td colspan="2" class="border"> {{ $schedule->hca3}}, {{ $schedule->hca4}} </td> 
                            <td colspan="2" class="border"> {{ $schedule->hca5}},  {{ $schedule->hca6}} </td>
                            <td  class="border"> {{ $schedule->nurse1}} </td>
                            <td  class="border"> {{ $schedule->nurse2}} </td>
                            <td class="align-middle">
                              <a href="{{ route('admin.editshift', $schedule->id )}}" 
                                class="btn btn-danger font-weight-bold">
                                Edit
                              </a>
                              <a href="{{ route('admin.deleteshift', $schedule->id )}}" 
                                class="btn btn-danger font-weight-bold">
                                Delete
                              </a>
                            </td>
                          </tr>
                          <tr> 
                         
                          
                          </tr>
                          @empty
                            <p class="text-danger pr-3" >No Data Found</p>
                          @endforelse
                        </tbody>
                      </table>
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


   