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

                  <form class="forms-sample" action="admin/produce/sua/{{$pro->id}}" method="POST" enctype="multipart/form-data">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="exampleInputName1">ID</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="id" placeholder="id" value="{{$pro->id}}">
                    </div>

                     <div class="form-group">
                    <label for="exampleFormControlSelect2">Type Produce</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="id_type">
                      <option>-Chọn loại sản phẩm-</option>
                      @foreach($typepro as $t)
                      <option
                      @if($pro->type_produce->id==$t->id)
                      {{"selected"}}
                      @endif
                      value="{{$t->id}}">{{$t->name}}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Manufacturer</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="id_manu">
                      <option>-Chọn hãng sản xuất-</option>
                      @foreach($manu as $m)
                      <option
                      @if($pro->manufacturer->id==$m->id)
                      {{"selected"}}
                      @endif
                      value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name" value="{{$pro->name}}">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Price</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="price" placeholder="vnd" value="{{$pro->price}}">
                    </div>


                    <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <input type="textarea" class="form-control" id="exampleInputName1" name="description" placeholder="" value="{{$pro->description}}">
                    </div>

                    <div class="form-group">
                      <label>Image</label>
                      <input type="checkbox" class="form-check-input" style="margin-left: 6px;" id="changeimage" name="changeimage" >
                      <div class="input-group col-xs-12">
                        <img src="upload/produce/{{$pro->image}}" alt="" width="100px" height="100px"></div>
                        <input type="file" class="form-control file-upload-browse btn btn-primary image" name="image" disabled="">
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
@section('script')
        <script>
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