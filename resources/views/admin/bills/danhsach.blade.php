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
                          <th>TOTAL</th>
                          <th>STATUS</th>
                          <th>OPTION</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($bill as $b)
                        <tr>
              							<td>{{$b->id}}</td>
              							<td>{{isset($b->customer->name)?$b->customer->name:'[N\A]'}}</td>
                            <td>{{number_format($b->total,0,',',',')}} VND</td>
              							<td>
                              @if($b->status==1)
                              <a href="#" class="btn btn-secondary">Đã xử lý</a>
                              @else
                              <a href="#" class="btn btn-secondary">Chờ xử lý</a>
                              @endif
                            </td>
              							<td>
                                <a class="btn btn-danger" href="admin/bills/xoa/{{$b->id}}"><i class="ti-trash"></i>       Xóa</a>
                                <a class="btn btn-light js_bill_item" data-id="{{$b->id}}" href="admin/bills/view/{{$b->id}}"><i class="ti-eye"></i></a>
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
        <div class="modal fade" id="myModalBill" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Chi tiết đơn hàng <b class="bill_id" ></b></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body" id="md_content">

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>


        <!-- content-wrapper ends -->
@endsection
@section('script')
      <script>
          $(function(){
              $(".js_bill_item").click(function(event){
                event.preventDefault();
                let $this=$(this);
                let url=$this.attr('href');
                $(".bill_id").text('').text($this.attr('data_id'));
                $("#myModalBill").modal('show');
                console.log(url);
                $.ajax({
                  url:url,
                }).done(function(result){
                    if(result)
                      {
                        $("#md_content").html('').append(result);
                      }
                    });
              });
          })
      </script>
@endsection