<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Page</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('asset/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('asset/node_modules/font-awesome/css/font-awesome.min.css')}}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('asset/images/favicon.html')}}" />
</head>

<body class="sidebar-dark">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Login</h3>
              <form method="POST" action="authcheck_dept">
              @csrf

              <div class="results">
              
              @if(Session::get('failed'))

              <div class="alert alert-danger">
              
              {{Session::get('failed')}}

              </div>
              @endif              
              </div>

                <div class="form-group">
                  <label> Email *</label>
                  <input type="text" name="email" class="form-control p_input" value="{{old('email')}}">
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="text" name="password" class="form-control p_input" >
                  <span class="text-danger">@error('password'){{$message}} @enderror</span>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="icheck-square">
                    <input tabindex="1" type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                  </div>
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                </div>
                <div class="d-flex justify-content-center mb-4">
                  <a href="#" class="facebook-login btn btn-facebook mr-2">Facebook</a>
                  <a href="#" class="google-login btn btn-google">Google+</a>
                </div>
                <small class="text-center d-block">For AreaAdmin Login , Click here<a href="/areaadmin_login"> Login</a></small>
                <small class="text-center d-block">For DepartmentalAdmin Login , Click here<a href="/deptadmin_login">Login</a></small>
                <small class="text-center d-block">For New MasterAdmin Account , Click here<a href="/signup">Sign Up</a></small>

              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('asset/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('asset/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('asset/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('asset/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{asset('asset/js/off-canvas.js')}}"></script>
  <script src="{{asset('asset/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('asset/js/misc.js')}}"></script>
  <script src="{{asset('asset/js/settings.js')}}"></script>
  <!-- endinject -->
</body>


</html>
