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
            <form action="{{ url('user/edit',$userById->id) }}" method="post">
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
                            placeholder="Please enter name" value="{{ $userById->name }}" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            placeholder="Please enter email" value=" {{ $userById->email }} " required>
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
                    <div class="form-check form-check-inline">
                        <div class="mr-1 ml-2">
                            @if ($userById->level == 1)
                            <input type="radio" name="level" id="level1" class="form-check-input" value="1" checked>
                            <label class="form-check-label" for="level1">Admin</label>
                            <input type="radio" name="level" id="level2" class="form-check-input" value="2">
                            <label class="form-check-label" for="level2">Member</label>
                            @elseif ($userById->level == 2)
                            <input type="radio" name="level" id="level1" class="form-check-input" value="1">
                            <label class="form-check-label" for="level1">Admin</label>
                            <input type="radio" name="level" id="level2" class="form-check-input" value="2" checked>
                            <label class="form-check-label" for="level2">Member</label>
                            @else
                            <input type="radio" name="level" id="level1" class="form-check-input" value="1" checked>
                            <label class="form-check-label" for="level1">Admin</label>
                            <input type="radio" name="level" id="level2" class="form-check-input" value="2">
                            <label class="form-check-label" for="level2">Member</label>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{url('user')}}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection