@include('layouts.header')
<body class="hold-transition login-page">
    <div class="login-box">
          <div class="login-logo">
              <b>Admin Login</b>
          </div>
      
          <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
    
            <form action="{{ route('login') }}" method="POST">
                @csrf

                  <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="input email" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
              <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="input Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
                  <div class="row">
                    <div class="col-xs-4">
                          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                    </div>
                  </div>
            </form>
          </div>
          
    </div>
        
    @include('layouts.scripts')
</body>