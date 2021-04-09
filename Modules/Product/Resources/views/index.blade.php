@extends('master')
@section('content')
<section class="mt-4 mb-3">
    <button class="btn btn-info mb-2" data-toggle="modal" data-target="#myModal">Add new</button>
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</section>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Alias</th>
                        <th>Keywords</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                    <tr>
                        <td>{!! $item->name !!}</td>
                        <td>{!! number_format($item->price,0,",",".") !!}</td>
                        <td>{!! $item->alias !!}</td>
                        <td>{!! $item->keywords !!}</td>
                        <td>{!! $item->description !!}</td>
                        <td>
                            <a href="{!!  url('product/edit', $item->id) !!}" class="btn btn-primary .edit">Edit</a>
                            <a href="{!! url('product', $item->id) !!}" class="btn btn-danger"
                                onclick="return messages('Bạn có muốn xóa Product này')">
                                Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- modal add --}}
<div class="modal" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header justify-content-center">
                <h4 class="modal-title ">ADD NEW PRODUCT</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form action="{!! url('product') !!}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Category Type</label>
                        <select class="form-control" name="listCate" id="">
                            <option value="">Please Choose Category</option>
                            @php
                            cate_parent($cate);
                            @endphp
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="name">Name</label>
                        <input class="form-control" type="text" name="name" class="form-control"
                            placeholder="Please enter name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Please enter Price"
                            value="{{old('price')}}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Url Image</label>
                        <input type="text" name="image" class="form-control" placeholder="Please enter Url Image"
                            required value="https://place-hold.it/300x300">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Keywords</label>
                        <input type="text" name="keywords" class="form-control" placeholder="Please enter Keywords"
                            value="{{old('keywords')}}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Description</label>
                        <input type="text" name="description" class="form-control"
                            placeholder="Please enter Description" value="{{old('description')}}">
                        {{-- {{old('description') == null ? null : old('description')}} --}}
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection