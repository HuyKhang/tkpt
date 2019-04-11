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

                  <form class="forms-sample" action="admin/produce/them" method="POST" enctype="multipart/form-data">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="exampleInputName1">ID</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="id" placeholder="id">
                    </div>

                     <div class="form-group">
                    <label for="exampleFormControlSelect2">Type Produce</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="id_type">
                      <option>-Chọn loại sản phẩm-</option>
                      @foreach($typepro as $t)
                      <option value="{{$t->id}}">{{$t->name}}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect2">Manufacturer</label>
                    <select class="form-control" id="exampleFormControlSelect2" name="id_manu">
                      <option>-Chọn hãng sản xuất-</option>
                      @foreach($manu as $m)
                      <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputName1">Price</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="price" placeholder="vnd">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">Description</label>
                      <input type="textarea" class="form-control" id="exampleInputName1" name="description" placeholder="">
                    </div>

                    <div class="form-group">
                      <label>Image</label>
                      <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-browse btn btn-primary" name="image" placeholder="Upload Image">
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