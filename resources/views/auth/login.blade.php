@extends('layouts.app')

@section('content')
<style>
    .login-card .forgot-password-link {
    font-size: 14px;
    color: #fefefe;
    margin-bottom: 10px;
    float: right;
</style>
<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin/assets/css/login.css">
 <main class="d-flex align-items-right min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="admin/assets/images/nnurosign.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7" >
            <div class="card-body">
              <div class="brand-wrapper" >
                <img style="height: 65px; width: 20%" src="admin/assets/images/log.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form  method="POST" action="{{ route('login') }}">
                 @csrf
                  <div class="form-group">
                    <label for="email" class="">{{ __('Location') }}</label>
                    @if (!is_null($locations))
                    <select class="form-control" name="location" id="">
                        <option value="">Select</option>
                        @foreach ($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                    @endif
                    @error('location')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="email" class="">{{ __('Company Name') }}</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">{{ __('Password') }}</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                  <div class="form-group row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label style="width:150px;" class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                 
                  <div class= "text-left">
                  <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-0">
                                <button type="submit" class="btn btn-block login-btn mb-3 ">
                                    {{ __('Login') }}
                                </button>
                        </div>
                        @if (Route::has('password.request'))
                                <div style="margin-left:16px;">
                                    <a class="forgot-password-link"  href="{{ route('password.request') }}" >
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                @endif
                        </div>
                    
                                

                            
                        </div>
                    </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  
@endsection


<!--<input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">