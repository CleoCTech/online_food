@extends('BackEnd.master');

@section('title')
    Order Details
@endsection


@section('content')

    @if (Session::get('sms'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>{{Session::get('sms')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class=".offset-1 col-md-8">
        <div class="card my-5">

            <div class="card-header">  <h1 class="text-center text-muted">Customer Info For This Order</h1><br> </div>
            <div class="card-body">

                <table  class="table table-bordered">
                   <tr>
                       <th>Name</th>
                       <td>{{$customer['name']}}</td>
                   </tr>
                   <tr>
                       <th>Email </th>
                       <td>{{$customer['email']}}</td>
                   </tr>
                   <tr>
                       <th>Phone Number</th>
                       <td>{{$customer['phone_no'] }}</td>
                   </tr>
                </tbody>
                </table>
            </div>
        </div>
        {{--  <div class="card my-5">

            <div class="card-header">  <h1 class="text-center text-muted">Shipping  Info For This Order</h1><br> </div>
            <div class="card-body">

                <table  class="table table-bordered">
                   <tr>
                       <th>Name</th>
                       <td>{{$shipping->name}}</td>
                   </tr>
                   <tr>
                       <th>Email </th>
                       <td>{{$shipping->email}}</td>
                   </tr>
                   <tr>
                       <th>Phone Number</th>
                       <td>{{$shipping->phone_no}}</td>
                   </tr>
                   <tr>
                       <th>Address</th>
                       <td>{{$shipping->address}}</td>
                   </tr>

                </tbody>
                </table>
            </div>
        </div>  --}}
        {{--  <div class="card my-5">

            <div class="card-header">  <h1 class="text-center text-muted">Order  Details For This Order</h1><br> </div>
            <div class="card-body">

                <table  class="table table-bordered">
                   <tr>
                       <th>Order No</th>
                       <td>{{$order_detail->order_id }}</td>
                   </tr>
                   <tr>
                       <th>Order Total </th>
                       <td>{{$order_detail->order_total }}</td>
                   </tr>
                   <tr>
                       <th>Order Status</th>
                       <td>{{$order_detail->order_status }}</td>
                   </tr>

                </tbody>
                </table>
            </div>
        </div>  --}}
    </div>

@endsection
