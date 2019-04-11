@extends('admin.layout.index')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách</h4>
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
                          <th>NAME</th>
                          <th>GENDER</th>
                          <th>ADDRESS</th>
                          <th>PHONE</th>
                          <th>GMAIL</th>
                          <th>STATUS</th>
                          <th>OPTION</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($cust as $c)
                        <tr>
              							<td>{{$c->id}}</td>
              							<td>{{$c->name}}</td>
                            <td>
                              @if($c->gender==1)
                              {{"Nam"}}
                              @else
                              {{"Nữ"}}
                              @endif
                            </td>
                            <td>{{$c->address}}</td>
                            <td>{{$c->phone}}</td>
              							<td>{{$c->email}}</td>
              							<td>{{$c->status}}</td>
              							<td>
                                <a class="btn btn-danger" href="admin/customer/xoa/{{$c->id}}"><i class="ti-trash"></i>       Xóa</a>
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