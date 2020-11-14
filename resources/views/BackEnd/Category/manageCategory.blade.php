@extends('BackEnd.master');

@section('title')
    Manage Category
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

        <div class="card-header"> <h3>DataTable with</h3> </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Order Number</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                    ($i=1)
                    @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $category->category_name}}</td>
                        <td>{{ $category->order_number}}</td>
                        <td>
                            @if ($category->category_status == 1)
                            <a class="btn btn-outline-info" href="{{route('deactivate-category', ['id'=>$category->category_id])}}"><i class="fas fa-arrow-down" title="Click to Deactivate"></i></a>
                            @else
                              <a class="btn btn-outline-success" href="{{route('activate-category', ['id'=>$category->category_id])}}"><i class="fas fa-arrow-up" title="Click to Activate"></i></a>
                            @endif
                        <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#edit{{$category->category_id }}"><i class="fas fa-edit" title="Click to Edit"></i></a>
                            <a class="btn btn-outline-danger" href="{{route('delete-category', ['id'=>$category->category_id])}}"><i class="fas fa-trash" title="Click to Delete"></i></a>
                        </td>
                    </tr>

                     {{--  modal starts here  --}}
                <div class="modal fade" id="edit{{$category->category_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-lable="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('update-category')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Category Name</label>
                                        <input type="text" class="form-control" name="category_name" value="{{ $category->category_name}}">
                                        <input type="hidden" class="form-control" name="category_id" value="{{$category->category_id}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category Description</label>
                                        {{--  <textarea type="text"  class="form-control" name="" id="" cols="30" rows="3"></textarea>  --}}
                                        <input type="number" class="form-control" name="order_number" value="{{ $category->order_number}}">

                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update" name="btn" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{--  modal ends here  --}}
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
