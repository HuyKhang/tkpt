@extends('admin.layout.index')
@section('content')
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Danh sách</h4><a href="admin/produce/them" class="btn btn-success">Thêm</a>
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
                          <th>PRICE</th>
                          <th>IMAGE</th>
                          <th>OPTION</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($pro as $p)
                        <tr>
              							<td>{{$p->id}}</td>
              							<td>{{$p->name}}</td>
                            <td>{{$p->price}}</td>
                            <td>
                              <img src="upload/produce/{{$p->image}}" width="100%" >
                            </td>
              							<td>
								                <a class="btn btn-info" href="admin/produce/sua/{{$p->id}}"><i class="ti-settings"></i>      Sửa</a>
                                <a class="btn btn-danger" href="admin/produce/xoa/{{$p->id}}"><i class="ti-trash"></i>       Xóa</a>
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