<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Smarthr - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - Syscon_mad</title>
		<!-- Favicon -->
        <link rel="shortcut icon" type="{{ URL::to('/assets/image/x-icon') }}" href="assets/img/favicon.png">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href={{ URL::to('/assets/css/bootstrap.min.css') }}>
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href={{ URL::to('/assets/css/font-awesome.min.css') }}>
		
		<!-- Main CSS -->
        <link rel="stylesheet" href={{ URL::to('/assets/css/style.css') }}>


        <title>{{ config('app.name') }} |  @lang('auth.login.title')</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
       

    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				{{-- <a href="job-list.html" class="btn btn-primary apply-btn">Apply Job</a> --}}
				<div class="container">
				
					<!-- Account Logo -->
					<div class="account-logo">
						<a href="index.html"><img src="assets/img/logo2.png" alt="Dreamguy's Technologies"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">{{ __('Login') }}</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							
							<!-- Account Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
								<div class="form-group">
									<label>{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col">
											<label>{{ __('Password') }}</label>
										</div>
										<div class="col-auto">
											{{-- <a class="text-muted" href="forgot-password.html">
												Forgot password?
											</a> --}}
                                            
            
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
										</div>
									</div>
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
                                    {{-- //////////////// --}}
                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- /////////////// --}}

								<div class="form-group text-center">
									{{-- <button class="btn btn-primary account-btn" type="submit">Login</button> --}}
                                    <button type="submit" class="btn btn-primary account-btn">
                                        {{ __('Login') }}
                                    </button>
								</div>
								<div class="account-footer">
									<p>Don't have an account yet? <a href="{{url('/register')}}">Register</a></p>
								</div>
							</form>
							<!-- /Account Form -->
							
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src={{ URL::to('/assets/js/jquery-3.5.1.min.js') }}></script>
		
		<!-- Bootstrap Core JS -->
        <script src={{ URL::to('/assets/js/js/popper.min.js') }}></script>
        <script src={{ URL::to('/assets/js/bootstrap.min.js') }}></script>
		
		<!-- Custom JS -->
		<script src={{ URL::to('/assets/js/app.js') }}></script>
		
        
    </body>
</html>