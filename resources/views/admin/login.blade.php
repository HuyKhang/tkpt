<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RoyalUI Admin</title>
  <base href="{{asset('')}}">
  <!-- plugins:css -->
  <link rel="stylesheet" href="admin_asset/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="admin_asset/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="admin_asset/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="admin_asset/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0"	>
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="admin_asset/images/logo.svg" alt="logo">
              </div>
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
              <form class="pt-3" action="admin/dangnhap" method="POST">
              	<input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="admin_asset/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="admin_asset/js/off-canvas.js"></script>
  <script src="admin_asset/js/hoverable-collapse.js"></script>
  <script src="admin_asset/js/template.js"></script>
  <script src="admin_asset/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
