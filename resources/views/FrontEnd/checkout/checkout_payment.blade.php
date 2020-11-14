@extends('FrontEnd.master');

@section('title')
    Check Out
@endsection

@section('content')
<div class="products">
    <div class="container">
        <div class="col-md-9 product-w3ls-right">
            <div class="card">
                <div class="card-header text-muted">
                    <h3>Dear {{Session::get('customer_name')}}.</h3> <h4 class="text-center">We have to know which payment method you want.</h4>
                </div>
                <div class="card-mt-4">
                    <h5 class="card-header mt-4 text-center text-muted">Please select your payment method</h5>
                </div>
                <div class="card-body">
                    <div class="checkout-left">
                        <div class="address_from_agile mt-sm-5 mt-4">
                            <form action="{{route('make-order')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Cash On Delivery</th>
                                        <td><input type="radio" name="payment_type" id="" value="Cash">Cash</td>
                                    </tr>
                                    <tr>
                                        <th>Stripe Card</th>
                                        <td><input type="radio"  class="mr-5" name="payment_type" id="" value="Stripe">Stripe</td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td><input type="submit" name="btn" class="btn btn-success mr-5" value="Confirm Order"></td>
                                    </tr>

                                </table>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
