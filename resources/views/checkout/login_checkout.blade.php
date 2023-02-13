@extends('layout')
@section('content')

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="post" action="{{URL::to('/user-login')}}">
							<input type="text" placeholder="Name" />
							<input type="password" placeholder="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{URL::to('/add_customer')}}" method="post">
                        {{csrf_field()}} 
							<input name="customer_name" type="text" placeholder="Name"/>
							<input name="customer_email" type="email" placeholder="Email Address"/>
							<input name="customer_password" type="password" placeholder="Password"/>
                            <input name="customer_phone" type="text" placeholder="SDT"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->

@endsection