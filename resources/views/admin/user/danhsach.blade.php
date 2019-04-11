@extends('admin.layout.index')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách</h4><a href="admin/user/them" class="btn btn-success">Thêm</a>
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
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>IMAGE</th>
                          <th>NAME</th>
                          <th>GMAIL</th>
                          <th>PHONE</th>
                          <th>GENDER</th>
                          <th>POSITION</th>
                          <th>OPTION</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($user as $u)
                        <tr>
              							<td>{{$u->id}}</td>
              							<td>
              								<img src="upload/user/{{$u->image}}" width="100%" >
              							</td>
              							<td>{{$u->name}}</td>
              							<td>{{$u->email}}</td>
              							<td>{{$u->phone}}</td>
              							<td>
              								@if($u->gender==1)
              								{{"Nam"}}
              								@else
              								{{"Nữ"}}
              								@endif
              							</td>
              							<td>
              								@if($u->position==1)
              								{{"Admin"}}
              								@else
              								{{"Nhân viên"}}
              								@endif
              							</td>
              							<td>
								                <a class="btn btn-info" href="admin/user/sua/{{$u->id}}"><i class="ti-settings"></i>      Sửa</a>
                                <a class="btn btn-danger" href="admin/user/xoa/{{$u->id}}"><i class="ti-trash"></i>       Xóa</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
@endsection