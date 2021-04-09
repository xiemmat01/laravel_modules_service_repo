@extends('master')
@section('content')
{{-- modal edit --}}
<div>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">EDIT USER</h4>
            </div>
            <!-- Modal body -->
            <form action="{{ url('category/edit',$cateById->id) }}" method="post">
                @csrf

                @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label" for="name">Category Type</label>
                        <select class="form-control" name="listCate" id="">
                            <option value="0">Please Choose Category</option>
                            @php
                            cate_parent($cate,0,'--',$cateById->parent_id);
                            debugbar()->info($cateById->parent_id);
                            @endphp
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="name">Name</label>
                        <input class="form-control" type="text" name="name" class="form-control"
                            placeholder="Please enter name" value="{{$cateById->name}}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="email">Order</label>
                        <input type="text" name="order" class="form-control" placeholder="Please enter order"
                            value="{{$cateById->order}}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="password">Keywords</label>
                        <input type="text" name="keywords" class="form-control" placeholder="Please enter keywords"
                            value="{{$cateById->keywords}}">
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="repassword">Description</label>
                        <textarea type="text" name="description" class="form-control"
                            placeholder="Please enter description">{{$cateById->description}}</textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{url('category')}}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection