@extends('admin.layout.index')
@section('content')
       <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                      @if(count($errors)>0)
                            <div class="alert alert-danger">
                              @foreach($errors->all() as $err)
                                {{$err}}<br>
                              @endforeach
                            </div>
                          @endif

                          @if(session('thongbao'))
                            <div class="alert alert-success">
                              {{session('thongbao')}}
                            </div>
                          @endif

                  <form class="forms-sample" action="admin/user/them" method="POST" enctype="multipart/form-data">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Confirm Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword4" name="confirmpassword" placeholder="ConfirmPassword">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <div class="form-check">
                            <label class="form-check-label"><input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="1">Nam</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="0">Nữ</label>
                        </div>
                      </div>
                    <div class="form-group">
                      <label>Image</label>
                      <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-browse btn btn-primary" name="image" placeholder="Upload Image">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Phone</label>
                      <input type="text" class="form-control" name="phone" id="exampleInputCity1" placeholder="Numberphone">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Position</label>
                        <div class="form-check">
                            <label class="form-check-label"><input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="1">Admin</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="0">Nhân viên</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection