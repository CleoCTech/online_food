@extends('BackEnd.master');

@section('title')
    Food Add
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">

                @if (Session::get('sms'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{Session::get('sms')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               @endif

               <div class="card">
                <div class="card-header text-center">Food</div>
                <div class="card-body">
                <form action="{{ route('save-dish')}}" method="post" enctype="multipart/form-data">
                    @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="dish_name">
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
                                <textarea name="dish_detail" id="" cols="30" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="dish_image" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label for="">Food Status</label>
                                <div class="radio">
                                    <input type="radio"  name="dish_status" value="1">Active
                                    <input type="radio"  name="dish_status" value="0">Inactive
                                </div>

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
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Add Food</button>
                        </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
