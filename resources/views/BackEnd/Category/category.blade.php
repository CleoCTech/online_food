@extends('BackEnd.master');

@section('title')
    Category Page
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
                    <div class="card-header text-center">Category</div>
                    <div class="card-body">
                    <form action="{{ route('save-category')}}" method="post">
                        @csrf
                                <div class="form-group">
                                    <label for="">Category Name</label> 
                                    <input type="text" class="form-control" name="category_name">
                                </div>
                                <div class="form-group">
                                    <label for="">Order Number</label>
                                    <input type="number" class="form-control" name="order_number">
                                </div>
                                <div class="form-group">
                                    <label for="">Add On</label>
                                    <input type="date" class="form-control" name="add_on">
                                </div>
                                <div class="form-group">
                                    <label for="">Category Status</label>
                                    <div class="radio">
                                        <input type="radio"  name="status" value="1">Active
                                        <input type="radio"  name="status" value="0">Inactive
                                    </div>

                                </div>
                                <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Add Category</button>
                            </form>
                    </div>
                </div>
           </div>
       </div>
   </div>
@endsection
