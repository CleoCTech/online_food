@extends('FrontEnd.master');

@section('title')
    Shipping
@endsection

@section('content')
    <!-- shipping up-page -->
	<div class="login-page about">
		<img class="login-w3img" src="{{asset('/')}}FrontEndSourceFile/images/img3.jpg" alt="">
		<div class="container">
			<h3 class="w3ls-title w3ls-title1">Enter Your Shipping Information</h3>
			<p class="w3ls-title w3ls-title1 text-center">You Can Change Your Shipping Information</p>
			<div class="login-agileinfo">
            <form action="{{route('save-shipping')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">Full Name</label>
                    <input class="agile-ltext" type="text" name="username" placeholder="Username" required="" value="{{$customer->name}}">
                    <label for="">Email</label>
                    <input class="agile-ltext" type="email" name="email" placeholder="Your Email" required="" value="{{$customer->email}}">
                    <label for="">Phone Number</label>
                    <input class="agile-ltext" type="text" name="phone_no" placeholder="Your Phone" required="" value="{{$customer->phone_no}}">
                    <label for="">Address</label>
					<input class="agile-ltext" type="text" name="address" placeholder="Your Address" required="">
					<div class="wthreelogin-text">
						<ul>
							<li>

							</li>
						</ul>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" value="Save">
				</form>
			</div>
		</div>
	</div>
	<!-- //shipping up-page -->
@endsection
