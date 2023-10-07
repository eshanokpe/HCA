@extends('user.layout.app')
@section('content')
<section class="p-2">
    <div class="ps-3"><h6>Residents</h6></div>

    <div class="row">
    @foreach ($residents as $resident)
        <div class="col-sm-4  mb-2 mt-2">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="row">
                        <div class="col-9">
                            <h6><a href="{{route('hca.resident', ['id' => $resident->id])}}">{{ $resident->fullname  }}</a> </h6>
                            <hr class="dark horizontal my-0">
                            <span style="display: block;">
                                <i class="fa-solid fa-hospital-user"></i>
                                {{ $resident->fullname  }}
                            </span>
                            <span style="display: block;">
                                <i class="fa fa-user-plus"></i>
                                {{ $resident->hca_no  }}
                            </span>
                            <span style="display: block;">
                                <i class="fa-solid fa-bed-pulse"></i>
                                {{ $resident->room_no  }}
                            </span>
                            <span style="display: block;">
                                <i class="fa-solid fa-notes-medical"></i>
                                {{ $resident->medical_status  }}
                            </span>

                        </div>
                        <div class="col-3 " style="padding: 0px;">
                            <div class="text-center">
                                <a href="javascript:;" class="avatar avatar-xl rounded-circle"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                                    <img src="assets/img/prof.jpeg" alt="team1">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</section>

@endsection