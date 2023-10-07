@extends('admin.layout.app')
@section('content')
    <main class="main-content  mt-0">
        <section>
        <div class="page-header ">
            <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <h6>Resident's Board</h6>
                </div>
                <div class="col-md-12 ">
                    <div class="card card-plain">
                        <div class="card-header">
                        <h6 class="font-weight-bolder">Create Account</h6>
                        <small class="mb-0">Create New Resident Profile</small>
                        <div class="card-body bg-white">
                        <form role="form" action="{{ route('admin.postcreateresident') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="fullname" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">DOB</label>
                                        <input type="date" name="dob" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <!-- <input type="text" name="gender" class="form-control"> -->
                                        <select name="gender" id="gender" class="form-control">
                                            <option>-- Select Gender --</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Marital Status</label>
                                        <input type="text" name="maritalstatus" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <select name="nationalty" id="nationalty" class="form-control">
                                            <option>-- Select Nationalty --</option>
                                            <option value="United Kingdom">United Kingdom</option>
                                            <option value="Canada">Canada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Language</label>
                                        <input type="text" name="language" class="form-control">
                                    </div>
                                </div>
                                <small>Next Of Kin Details</small>
                                <hr>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Fullname</label>
                                        <input type="text" name="fullname2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Relationship</label>
                                        <input type="text" name="relationship" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <!-- <input type="text" name="gender" class="form-control"> -->
                                        <select name="gender2" id="gender2" class="form-control">
                                            <option>-- Select Gender --</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <select name="room_no" id="room_no" class="form-control">
                                            <option>-- Select Room Floor  --</option>
                                            <option value="floor1">Floor 1</option>
                                            <option value="floor2">Floor 2</option>
                                            <option value="floor3">Floor 3</option>
                                            <option value="floor4">Floor 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary  w-100 mt-4 mb-0">Create Account</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        </section>
    </main>        
@endsection 


   