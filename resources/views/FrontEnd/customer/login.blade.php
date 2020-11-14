@extends('FrontEnd.master');

@section('title')
    Sign In
@endsection


@section('content')
    <!-- sign up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
		<div class="container">

            <h3 class="w3ls-title w3ls-title1">Sign In to your account</h3>
            <strong>{{Session::get('sms')}}</strong>
            {{--  @if (Session::get('sms'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('sms')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               @endif  --}}
			<div class="login-agileinfo">
            <form action="{{route('check-login')}}" method="post" enctype="multipart/form-data">
                @csrf
					<input class="agile-ltext" type="email" name="email" placeholder="Your Email" required="">
					<input class="agile-ltext" type="password" name="password" placeholder="Password" required="">
					<div class="wthreelogin-text">
						<div class="clearfix"> </div>
					</div>
					<input type="submit" value="Login  ">
				</form>
			</div>
		</div>
	</div>
	<!-- //sign up-page -->
@endsection
