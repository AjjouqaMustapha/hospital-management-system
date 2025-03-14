@extends('dashboard.layouts.master2')
@section('css')

<style>
	.loginform {
		display: none;
	}
</style>
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('dashboard./plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}"
	rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
	<div class="row no-gutter">
		<!-- The image half -->
		<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
			<div class="row wd-100p mx-auto text-center">
				<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
					<img src="{{URL::asset('dashboard./img/media/login.png')}}"
						class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
				</div>
			</div>
		</div>
		<!-- The content half -->
		<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
			<div class="login d-flex align-items-center py-2">
				<!-- Demo content-->
				<div class="container p-0">
					<div class="row">
						<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
							<div class="card-sigin">
								<div class="mb-5 d-flex"> <a href="{{ url('/' . $page = 'index') }}"><img
											src="{{URL::asset('dashboard./img/brand/favicon.png')}}"
											class="sign-favicon ht-40" alt="logo"></a>
									<h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
								</div>
								<div class="card-sigin">
									<div class="main-signup-header">
										<h2>{{trans('dashboard/login_trans.welcome_back')}}</h2>
										@if($errors->any())
											<div class="col-lg-12 col-md-12 col-xl-12 rounded">
												<!--Page Widget Error-->
												<div class="card bd-0 mg-b-20 bg-danger-transparent alert p-0 rounded">
													<div class="card-header text-danger font-weight-bold rounded">
														<i class="far fa-times-circle"></i> {{ implode('', $errors->all(':message')) }}
														<button aria-label="Close" class="close" data-dismiss="alert"
															type="button"><span aria-hidden="true">×</span></button>
													</div>
												</div>
												<!--Page Widget Error-->
											</div>
										@endif
										<div class="mb-3">
											<label for="userrole">{{trans('dashboard/login_trans.role_login')}}</label>
											<select name="somename" class="form-control SlectBox SumoUnder"
												tabindex="-1" id="userrole">
												<option selected disabled>{{trans('dashboard/login_trans.menu_choose')}}</option>
												<option value="user">{{trans('dashboard/login_trans.marid')}}</option>
												<option value="admin"> {{trans('dashboard/login_trans.admin')}}</option>
											</select>
										</div>

										{{--form user--}}
										<div class="loginform" id="user">
											<h5 class="font-weight-semibold mb-4">{{trans('dashboard/login_trans.login_as_user')}}</h5>
											<form method="POST" action="{{ route('login.user') }}">
												@csrf
												<div class="form-group">
													<label>{{trans('dashboard/login_trans.your_email')}}</label> <input class="form-control"
														placeholder="Enter your email" type="text" name="email"
														value="{{old('email')}}" required autofocus
														autocomplete="username">
												</div>
												<div class="form-group">
													<label>{{trans('dashboard/login_trans.your_password')}}</label> <input class="form-control"
														placeholder="Enter your password" type="password"
														type="password" name="password" required
														autocomplete="current-password" required>
												</div>
												<div class="block mt-4">
													<label for="remember_me" class="inline-flex items-center">
														<input id="remember_me" type="checkbox"
															class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
															name="remember" >
														<span
															class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __(trans('dashboard/login_trans.remember_me')) }}</span>
													</label>
												</div>
												<button class="btn btn-main-primary btn-block">{{trans('dashboard/login_trans.login')}}</button>
												<div class="row row-xs">
													<div class="col-sm-6">
														<button class="btn btn-block"><i class="fab fa-facebook-f"></i>
														{{trans('dashboard/login_trans.facebook')}}</button>
													</div>
													<div class="col-sm-6 mg-t-10 mg-sm-t-0">
														<button class="btn btn-info btn-block"><i
																class="fab fa-twitter"></i>{{trans('dashboard/login_trans.twitter')}}</button>
													</div>
												</div>
											</form>
											<div class="main-signin-footer mt-5">
												@if (Route::has('password.request'))
													<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
														href="{{ route('password.request') }}">
														{{ __(trans('dashboard/login_trans.fpassword')) }}
													</a>
												@endif
												<p>{{trans('dashboard/login_trans.no_account')}} <a
														href="{{ url('/' . $page = 'signup') }}">{{trans('dashboard/login_trans.create_account')}}</a></p>
											</div>
										</div>


										{{--form admin--}}
										<div class="loginform" id="admin">
											<h5 class="font-weight-semibold mb-4">{{trans('dashboard/login_trans.login_as_admin')}}</h5>
											<form method="POST" action="{{ route('login.admin') }}">
												@csrf
												<div class="form-group">
													<label>{{trans('dashboard/login_trans.your_email')}}</label> <input class="form-control"
														placeholder="Enter your email" type="text" name="email"
														value="{{old('email')}}" required autofocus
														autocomplete="username">
												</div>
												<div class="form-group">
													<label>{{trans('dashboard/login_trans.your_password')}}</label> <input class="form-control"
														placeholder="Enter your password" type="password"
														type="password" name="password" required
														autocomplete="current-password" required>
												</div>
												<div class="block mt-4">
													<label for="remember_me" class="inline-flex items-center">
														<input id="remember_me" type="checkbox"
															class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
															name="remember">
														<span
															class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __(trans('dashboard/login_trans.remember_me')) }}</span>
													</label>
												</div>
												<button class="btn btn-main-primary btn-block"> {{trans('dashboard/login_trans.login')}}</button>
												<div class="row row-xs">
													<div class="col-sm-6">
														<button class="btn btn-block"><i class="fab fa-facebook-f"></i>
														{{trans('dashboard/login_trans.facebook')}}</button>
													</div>
													<div class="col-sm-6 mg-t-10 mg-sm-t-0">
														<button class="btn btn-info btn-block"><i
																class="fab fa-twitter"></i> {{trans('dashboard/login_trans.twitter')}}</button>
													</div>
												</div>
											</form>
											<div class="main-signin-footer mt-5">
												@if (Route::has('password.request'))
													<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
														href="{{ route('password.request') }}">
														{{ __(trans('dashboard/login_trans.fpassword')) }}
													</a>
												@endif
												<p>{{trans('dashboard/login_trans.no_account')}} <a
														href="{{ url('/' . $page = 'signup') }}">{{trans('dashboard/login_trans.create_account')}}</a></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- End -->
			</div>
		</div><!-- End -->
	</div>
</div>
@endsection
@section('js')

<script>
	$('#userrole').change(function () {
		var myID = $(this).val();
		$('.loginform').each(function () {
			myID === $(this).attr('id') ? $(this).show() : $(this).hide();
		})
	})
</script>

@endsection