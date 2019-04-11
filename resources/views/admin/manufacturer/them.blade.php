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

                  <form class="forms-sample" action="admin/manufacturer/them" method="POST" enctype="multipart/form-data">
                  	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                      <label for="exampleInputName1">ID</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="id" placeholder="id">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" placeholder="Name">
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