
<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.head')
 <style>
     .login-page{
       background-image: url("/template/images/office.jpeg");
     }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo">
        <a href="#"><b>Đăng nhập</b></a>
      </div>
     @include('admin.alert')
      <form action="/admin/users/login/store" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Tên đăng nhập">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Ghi nhớ tôi
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
          </div>
          <!-- /.col -->
        </div>
        @csrf
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@include('admin.footer')

</body>
</html>
