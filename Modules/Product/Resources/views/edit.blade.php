@extends('master')
@section('content')
    {{-- modal edit --}}
    <div>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">EDIT PRODUCT</h4>
                </div>
                <!-- Modal body -->
                <form action="{{ url('product/edit', $productById->id) }}" method="post">
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
                            <label class="col-form-label">Category Type</label>
                            <select class="form-control" name="listCate" id="">
                                <option value="">Please Choose Category</option>
                                @php
                                    cate_parent($cate, 0, '--', $productById->cate_id);
                                @endphp
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" class="form-control"
                                placeholder="Please enter name" value="{{ $productById->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Price</label>
                            <input type="text" name="price" class="form-control" placeholder="Please enter Price"
                                value="{{ $productById->price }}" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Url Image</label>
                            <input type="text" name="image" class="form-control" placeholder="Please enter Url Image"
                                required value="https://place-hold.it/300x300">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Keywords</label>
                            <input type="text" name="keywords" class="form-control" placeholder="Please enter Keywords"
                                value="{{ $productById->keywords }}" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Description</label>
                            <input type="text" name="description" class="form-control"
                                placeholder="Please enter Description" value="{{ $productById->description }}">
                            {{-- {{old('description') == null ? null : old('description')}} --}}
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <a href="{{ url('user') }}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
