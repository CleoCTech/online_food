@extends('FrontEnd.master');

@section('title')
    Order | Complete
@endsection

@section('content')
<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">
            <div class="card">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismis="alert" aria-label="close">*</a>
                        <p>Session::has('success')</p>
                    </div>
                @endif
                <div class="card-body">
                    <h2 class="text-capitalize">Dear {{Session::get('customer_name')}}.</h2> <h2 class="text-center text-capitalize">Thanks for your order.</h2>
                    <p>We will contact you soon...</p>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
