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

                  <form class="forms-sample" action="admin/user/sua/{{$user->id}}" method="POST" enctype="multipart/form-data">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email" value="{{$user->email}}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Password</label>
                      <input type="checkbox" class="form-check-input" style="margin-left: 6px;" id="changepassword" name="changepassword" >
                      <input type="password" class="form-control password" id="exampleInputPassword4" name="password" placeholder="Password" disabled="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Confirm Password</label>
                      <input type="password" class="form-control password" id="exampleInputPassword4" name="confirmpassword" placeholder="ConfirmPassword" disabled="">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Gender</label>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="1"
                                @if ($user->gender == 1)
                                            {{"checked"}}
                                          @endif
                              >Nam</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="0"
                               @if ($user->gender == 0)
                                                {{"checked"}}
                                              @endif
                             >Nữ</label>
                        </div>
                      </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="checkbox" class="form-check-input" style="margin-left: 6px;" id="changeimage" name="changeimage" >
                      <div class="input-group col-xs-12">
                        <img src="upload/user/{{$user->image}}" alt="" width="100px" height="100px"></div>
                        <input type="file" class="form-control file-upload-browse btn btn-primary image" name="image" disabled="">

                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">Phone</label>
                      <input type="text" class="form-control" name="phone" id="exampleInputCity1" placeholder="Numberphone" value="{{$user->phone}}">
                    </div>
                    @if(Auth::user()->position==1)
                    <div class="form-group">
                      <label for="exampleTextarea1">Position</label>
                      	<div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="position" id="optionsRadios1" value="1"
                                  @if ($user->position == 1)
                                            {{"checked"}}
                                          @endif
                              >Admin</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="position" id="optionsRadios1" value="0"
                                  @if ($user->position == 0)
                                            {{"checked"}}
                                          @endif
                              >Nhân viên</label>
                        </div>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection
@section('script')
        <script>
            $(document).ready(function(){
                $("#changepassword").change(function(){
                        if($(this).is(":checked"))
                        {
                            $(".password").removeAttr('disabled');
                        }
                        else
                        {
                            $(".password").attr('disabled','');
                        }
                });
            });

            $(document).ready(function(){
                $("#changeimage").change(function(){
                        if($(this).is(":checked"))
                        {
                            $(".image").removeAttr('disabled');
                        }
                        else
                        {
                            $(".image").attr('disabled','');
                        }
                });
            });
        </script>

@endsection