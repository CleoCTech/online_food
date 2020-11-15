@extends('FrontEnd.master');

@section('title')
    Cart
@endsection
@section('content')
    <div class="products">
        <div class="container">
            <div class="col-md-9 product-w3ls-right">
                <div class="card">
                    <h3 class="card-header text-center my-3" style="background-color: lightyellow; height:70px; width:auto;">Cart Items</h3>
                    <div class="card-body">
                        <table class="table table-hover table-responsive table-bordered">
                            <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Remove</th>
                                        <th scope="col">Food Name</th>
                                        <th scope="col">Food Image</th>
                                        <th scope="col">Food Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total Price</th>
                                     </tr>

                            </thead>
                            <tbody>
                                @php
                                    ($i=1);
                                    ($sum=0);
                                @endphp
                                @foreach ($cartDish as $dish)
                              <tr>
                                <th scope="row">{{$i++}}</th>
                                <th scope="row">
                                    <a href="{{route('remove-item',['rowId' =>$dish->rowId])}}" type="button" class="btn btn-danger">
                                        <span aria-hidden="true">x</span>
                                    </a>
                                </th>
                                <td>{{$dish->name}}</td>
                                <td><img src="/storage/dish_images/{{$dish->options->dish_image}}"  style="height: 50px; width:50px; border-radius:50%;" alt="Image" srcset=""></td>
                                @if ($dish->half_price==null)
                                    <td> {{$dish->price}}</td>
                                @else
                                    <td> {{$dish->half_price}}</td>
                                @endif
                                <td>{{$dish->qty}}</td>
                                @if ($dish->options->half_price==null)
                                    <td> {{$subTotal= $dish->price*$dish->qty}}</td>
                                @else
                                <td> {{$subTotal= $dish->options->half_price*$dish->qty}}</td>
                                @endif
                                <td>{{$dish->subTotal}}</td>
                                <input type="hidden" name="" value="{{$sum = $sum + $subTotal}}">
                              </tr>
                              @endforeach
                              <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td class="text-center">= $ {{$sum}}</td>

                                  <?php
                                    Session::put('sum', $sum);
                                  ?>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>

            </div>



            @if (Session::get('customer_id'))
            <div class="col-md-9 product-w3ls-right">
                <a href="{{url('/checkout-payment')}}" class="btn btn-info" style="float: right;">
                        <i class="fa fa-shopping-bag"></i>
                        Checkout
                    </a>
            </div>
            @elseif(Session::get('customer_id'))
                <a href="{{url('/shipping')}}" class="btn btn-info" style="float: right;">
                    <i class="fa fa-shopping-bag"></i>
                    Checkout
                </a>
            @else
            <div class="col-md-9 product-w3ls-right">
                <a href="http://" data-toggle="modal" data-target="#login_or_register" class="btn btn-info" style="float: right;">
                    <i class="fa fa-shopping-bag"></i>
                    Checkout
                </a>
            </div>
            @endif

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="login_or_register" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-body">
                              <h3>Welcome...! To Staple Food</h3>
                              <div class="text-center" style="
                                            margin-top:25px;
                                            height:160px;
                                            width: 160px;
                                            border-radius:50%;
                                            background-color:darkblue;
                                            color:ghostwhite;
                                            padding-top:65px;
                                            font-size:20px;
                                            ">
                                  Keep Your Smile...
                              </div>
                          </div>

                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="card">
                          <div class="card-body">
                              <h3>Are you a new member...!</h3>
                          <a href="{{route('sign-up')}}" class="btn-block btn-primary text-center" style="
                                            height:60px;
                                            width: auto;
                                            padding-top:12px;
                                            margin-top:25px;
                                            font-size:25px;
                                ">
                                <span class="mt-5">Register</span>
                              </a>
                              <h3 class="mt-lg-5 text-center">Or</h3>
                              <h3 class="mt-lg-5 text-center">Already have an account...</h3>
                              <a href="{{route('customer-login')}}" class="btn-block btn-success text-center" style="
                                            height:60px;
                                            width: auto;
                                            padding-top:12px;
                                            margin-top:25px;
                                            font-size:25px;
                                ">
                                <span class="mt-5">Login</span>
                              </a>
                          </div>

                      </div>
                  </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
