@extends('admin.layout.app')
@section('content')
    <main class="main-content  mt-0">
        <section>
        <div class="page-header ">
            <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <h6>Shift Board</h6>
                </div>
                <div class="col-md-12 ">
                <div class="card card-plain"> 
                    <div class="card-header">
                    <h4 class="font-weight-bolder">Create Shedule</h4>
                    <small class="mb-0">Create New Shift</small>
                    @if (session('error'))
                        <div class="alert alert-warning text-white">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body bg-white">
                        @error('worker_type' || 'staff_type_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <form role="form" action="{{ route('admin.postcreateShift') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10">
                                    <div class="col-lg-6">
                                        <label for="staff_type" class="form-label">Staff Type</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <select name="staff_type_name" id="staff_type" class="form-select" >
                                                <option selected disabled value="">Staff Type</option>
                                                <option value="HCA">HCA</option>
                                                <option value="Nurse">Nurse</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('staff_type_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                
                                    <div class="col-lg-6" id="nurse_select_container" style="display: none;">
                                        <label for="nurse_select" class="form-label"><b>Select Nurse</b></label>
                                        <div class="input-group input-group-outline mb-3">
                                            <select name="staff_type" id="nurse_select" class="form-select">
                                                <option selected disabled value="">Select Nurse</option>
                                                @foreach ($nurses as $nurse)
                                                    <option value="{{ $nurse->fullname }}" style="color:black">{{ $nurse->fullname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('staff_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                
                                    <div class="col-lg-6" id="hca_select_container" style="display: none;">
                                        <label for="hca_select" class="form-label"><b>Select HCA</b></label>
                                        <div class="input-group input-group-outline mb-3">
                                            <select name="staff_type" id="hca_select" class="form-select">
                                                <option selected disabled value="">Select HCA</option>
                                                @foreach ($hcas as $hca)
                                                    <option value="{{ $hca->fullname }}" >{{ $hca->fullname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('staff_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                   
                                    <div class="col-lg-6">
                                        <label for="shift_session" class="form-label">Shift Type</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <select name="shift_type" id="shift_session" class="form-select ml-3" required>
                                                <option value="" selected disabled >Shift Type:</option>
                                                <option value="morning">Morning</option>
                                                <option value="evening">Evening</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('shift_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    
                                    <div class="col-md-6">
                                        <label for="shift_session" class="form-label">Day</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <select name="day" id="day" class="form-select" required>
                                                <option value="" selected disabled >Day:</option>
                                                <option value="monday">Monday</option>
                                                <option value="tuesday">Tuesday</option>
                                                <option value="wednesday">Wednesday</option>
                                                <option value="thursday">Thursday</option>
                                                <option value="friday">Friday</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    
                                    <div class="col-md-6">
                                        <label for="staff_type" class="form-label">Start Time:</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <select name="start_time" id="staff_type" class="form-select" >
                                                <option selected disabled value="">Start Time</option>
                                                <option value="8:00AM">8:00AM</option>
                                                <option value="6:00PM">6:00PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('start_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="staff_type" class="form-label">End Time:</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <select name="end_time" id="staff_type" class="form-select" >
                                                <option selected disabled value="">End Time</option>
                                                <option value="8:00AM">8:00AM</option>
                                                <option value="6:00PM">6:00PM</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('end_time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <label for="shift_session" class="form-label">Floor</label>
                                        <div class="input-group input-group-outline mb-3">
                                            <select name="floor" id="floor" class="form-select" >
                                                <option value="" selected disabled >Select Floor:</option>
                                                <option value="floor1">Floor 1</option>
                                                <option value="floor2">Floor 2</option>
                                                <option value="floor3">Floor 3</option>
                                                <option value="floor4">Floor 4</option>
                                                <option value="floor5">Floor 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('floor')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-2"></div>
                                
                                
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary  w-100 mt-4 mb-0">Add Schedule</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            </div>
        </div>
        </section>
    </main>        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#staff_type').change(function () {
                var selectedOption = $(this).val();
                var nurseSelectContainer = $('#nurse_select_container');
                var hcaSelectContainer = $('#hca_select_container');
                var nurseSelect = $('#nurse_select');
                var hcaSelect = $('#hca_select');

                if (selectedOption === 'HCA') {
                    nurseSelectContainer.hide();
                    hcaSelectContainer.show();
                    nurseSelect.val('').trigger('change'); // Clear and reset the nurse select field
                } else if (selectedOption === 'Nurse') {
                    hcaSelectContainer.hide();
                    nurseSelectContainer.show();
                    hcaSelect.val('').trigger('change'); // Clear and reset the HCA select field
                } else {
                    nurseSelectContainer.hide();
                    hcaSelectContainer.hide();
                    nurseSelect.val('').trigger('change'); // Clear and reset the nurse select field
                    hcaSelect.val('').trigger('change');   // Clear and reset the HCA select field
                }
            });
        });
    </script>

@endsection 


   