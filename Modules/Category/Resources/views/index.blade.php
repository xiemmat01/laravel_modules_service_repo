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
                        <th>Alias</th>
                        <th>Keywords</th>
                        <th>Description</th>
                        <th>Parent</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cate as $item)
                    <tr>
                        <td>{!! $item->name !!}</td>
                        <td>{!! $item->alias !!}</td>
                        <td>{{$item->keywords}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->parent_id}}</td>
                        <td>
                            <a href="{!!  url('category/edit', $item->id) !!}" class="btn btn-primary .edit">Edit</a>
                            <a href="{!! url('category', $item->id) !!}" class="btn btn-danger"
                                onclick="return messages('Bạn có muốn xóa Category này')">
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
                <h4 class="modal-title ">ADD NEW CATEGORY</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form action="{!! url('category') !!}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label" for="name">Category Type</label>
                        <select class="form-control" name="listCate" id="">
                            <option value="0">Please Choose Category</option>
                            @php
                            cate_parent($cate);
                            @endphp
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="name">Name</label>
                        <input class="form-control" type="text" name="name" class="form-control"
                            placeholder="Please enter name" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="email">Order</label>
                        <input type="text" name="order" class="form-control" placeholder="Please enter order" value=""
                            required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="password">Keywords</label>
                        <input type="text" name="keywords" class="form-control" placeholder="Please enter keywords"
                            value="">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="repassword">Description</label>
                        <textarea type="text" name="description" class="form-control"
                            placeholder="Please enter description" value=""></textarea>
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