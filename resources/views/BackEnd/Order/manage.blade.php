@extends('BackEnd.master');

@section('title')
    Order | Manage
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

    <div class="card my-5">

        <div class="card-header"> <h3 class="card-title" >Order</h3><br> </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Order Date</th>
                        <th>Payment Type</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                    ($i=1)
                    @endphp
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $order->name}}</td>
                        <td>{{ $order->order_total}}</td>
                        <td>{{ $order->order_status}}</td>
                        <td>{{ $order->created_at}}</td>
                        <td>{{ $order->payment_type}}</td>
                        <td>{{ $order->payment_status}}</td>

                        <td>
                            <a class="btn btn-outline-success" href="{{route('view-order', ['order_id', $order->order_id])}}"><i class="fas fa-search" title="View Order Details"></i></a>
                            <a class="btn btn-outline-info" href="{{--{{route('deactivate-food', ['id'=>$food->dish_id])}}--}}"><i class="fas fa-search-plus" title="View Order Invoice"></i></a>
                            <a class="btn btn-outline-info" href="{{--{{route('deactivate-food', ['id'=>$food->dish_id])}}--}}"><i class="fas fa-arrow-circle-down" title="Download Invoice"></i></a>
                            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-id="{{--{{$food->dish_id }}--}}" data-target="#edit{{--{{$food->dish_id }}--}}"><i class="fas fa-edit" title="Click to Edit"></i></a>
                            <a class="btn btn-outline-danger" href="{{--{{route('delete-food', ['id'=>$food->dish_id])}}--}}"><i class="fas fa-trash" title="Click to Delete"></i></a>


                        </td>
                    </tr>

                    {{--  modal starts here  --}}
                        {{--  <div class="modal fade" id="edit{{$food->dish_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update Food</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-lable="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{route('update-food')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" name="dish_name" value="{{$food->dish_name}}">
                                                <input type="hidden" class="form-control" name="dish_id" value="{{$food->dish_id}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Category</label>
                                               <select name="category_id" id="" class="form-control">
                                                   <option value="">---Select Category----</option>
                                                   @foreach ($categories as $category)
                                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                                   @endforeach
                                               </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Food Detail</label>
                                                <textarea name="dish_detail" id="" cols="30" class="form-control" rows="5" value="{{$food->dish_detail}}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Previous Image</label>
                                            <img src="/storage/dish_images/{{$food->dish_image}}" alt="" style="height: 150px; width:150px; border-radius:50%;">
                                                <label for="">Image</label>
                                                <input type="file" class="form-control" name="dish_image" accept="image/*">
                                            </div>

                                            <div class="card">
                                                <div class="card-header" title="You can skip this">
                                                    Dish Attribute
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="">Full Price</label>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="full_price" id=""  class="form-control" placeholder="Full Price" >
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <label for="">Half Price</label>
                                                            </div>
                                                            <div class="col-md-6 mt-2">
                                                                <input type="text" name="half_price" id=""  class="form-control" placeholder="Half Price" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Update" name="btn" class="btn btn-primary">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
                    {{--  modal ends here  --}}
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
