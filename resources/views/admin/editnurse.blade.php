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
                    <h4 class="font-weight-bolder">Edit Account</h4>
                    <small class="mb-0">Edit Nurse Account</small>
                  
                    <div class="card-body bg-white">
                        <form role="form" action="{{ route('admin.updatenurse', ['nurse' => $nurse] ) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="username" class="form-control" value="{{ $nurse->username}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="title" class="form-control" value="{{ $nurse->title}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="fullname" class="form-control" value="{{ $nurse->fullname}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="position" class="form-control" value="{{ $nurse->position}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="email" name="email" class="form-control" value="{{ $nurse->email}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="phone" class="form-control" value="{{ $nurse->phone}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="address" class="form-control" value="{{ $nurse->address}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="next_of_kin" class="form-control" value="{{ $nurse->next_of_kin}}">
                                    </div> 
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="phone2" class="form-control" value="{{ $nurse->phone2}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="supervision" class="form-control" value="{{ $nurse->supervision}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="text" name="status" class="form-control"  value="{{ $nurse->status}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="password" name="password" class="form-control" value="{{ $nurse->password}}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary  w-100 mt-4 mb-0">Update Account</button>
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


   