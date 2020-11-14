@extends('FrontEnd.master');

@section('title')
    Register a customer
@endsection


@section('content')
    <!-- sign up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Sign Up to your account</h3>
			<div class="login-agileinfo">
            <form action="{{route('save-customer')}}" method="post" enctype="multipart/form-data">
                @csrf
					<input class="agile-ltext" type="text" name="username" placeholder="Username" required="">
					<input class="agile-ltext" type="email" name="email" placeholder="Your Email" required="">
					<input class="agile-ltext" type="text" name="phone_no" placeholder="Your Phone" required="">
					<input class="agile-ltext" type="password" name="password" placeholder="Password" required="">
					<div class="wthreelogin-text">
						<ul>
							<li>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>
									<span> I agree to the terms of service</span>
								</label>
							</li>
						</ul>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" value="Sign Up">
				</form>
			</div>
		</div>
	</div>
	<!-- //sign up-page -->
@endsection
