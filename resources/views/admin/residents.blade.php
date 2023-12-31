@extends('admin.layout.app')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">List Of Residents</h6>
              </div>
            </div>
            @if (session('success'))
                <div class="alert text-white mt-3 alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                  <div class="d-flex flex-column justify-content-center text-end pe-4">
                            <p class="text-xs font-weight-bold mb-0">
                            <a href="{{route('admin.createresident')}}"> <i class="fas fa-user"></i> +Add Resident</p></a>
                        </div>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fullname</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DOB</th>                        
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email Address</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Relatives</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date created</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $serial = 1 @endphp
                  @forelse ($residents as $resident)
                    <tr>
                      <td>
                        <div class="d-flex flex-column justify-content-center text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $serial++ }}</p>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $resident->fullname  }}</p>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $resident->dob }}</p>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $resident->address }}</p>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $resident->email }}</p>
                        <div class="d-flex flex-column justify-content-center">
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $resident->gender }}</p>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $resident->relative }}</p>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex flex-column justify-content-center text-center">
                            <p class="text-xs font-weight-bold mb-0">{{ $resident->created_at }}</p>
                        </div>
                      </td>
                      
                      
                      <td class="align-middle">
                        <a href="{{ route('admin.editresidents', $resident->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                          Edit
                        </a>
                      </td>
                    </tr>
                    @empty
                        <p class="text-danger">No Data found</p>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>      
@endsection 


   