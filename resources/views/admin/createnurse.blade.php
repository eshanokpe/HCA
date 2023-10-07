@extends('admin.layout.app')
@section('content')
    <main class="main-content  mt-0">
        <section>
        <div class="page-header ">
            <div class="container">
            <div class="row">
                <div class="col-sm-12">
                <h6>Nurse Board</h6>
                </div>
                <div class="col-md-12 ">
                <div class="card card-plain">
                    <div class="card-header">
                    <h4 class="font-weight-bolder">Create Account</h4>
                    <small class="mb-0">Create New Nurse Account</small>
                  
                    <div class="card-body bg-white">
                        <form role="form" action="{{ route('admin.postcreatenurse') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control">
                                    </div>
                                </div>
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
                                        <label class="form-label">Position / Qulification</label>
                                        <input type="text" name="position" class="form-control">
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
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" name="phone" class="form-control">
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
                                        <label class="form-label">Next of Kin Name</label>
                                        <input type="text" name="next_of_kin" class="form-control">
                                    </div> 
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Next of Kin Phone Number</label>
                                        <input type="text" name="phone2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Supervision</label>
                                        <input type="text" name="supervision" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">DBS Status</label>
                                        <input type="text" name="status" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control">
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
                <div class="col-md-4"></div>
            </div>
            </div>
        </div>
        </section>
    </main>        
@endsection 


   