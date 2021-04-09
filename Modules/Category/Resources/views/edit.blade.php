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
            <form action="{{ url('category/edit',$cate->id) }}" method="post">
                @csrf

                <div class="modal-body">
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
                    <div class="form-group">
                        <label class="col-form-label" for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" class="form-control"
                            placeholder="Please enter name" value="{{ $cate->name }}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Please enter email" value=" {{ $cate->email }} " required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Please enter password" value="" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="repassword">Re-password</label>
                        <input type="password" name="repassword" id="repassword" class="form-control"
                            placeholder="Please enter re-password" value="" required>
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