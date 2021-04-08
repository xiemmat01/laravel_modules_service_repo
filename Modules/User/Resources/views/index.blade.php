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
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user as $item)
                            <tr>
                                <td>{!! $item->name !!}</td>
                                <td>{!! $item->email !!}</td>
                                <td>
                                    @if ($item->level == 1)
                                        Admin
                                    @elseif ($item->level == 0)
                                        Member
                                    @else
                                        Super Admin
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary .edit">Edit</button>
                                    <a href="{!! url('user', $item->id) !!}" class="btn btn-danger"
                                        onclick="return messages('Bạn có muốn xóa User này')">
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
                    <h4 class="modal-title ">ADD NEW USER</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="{!! url('user') !!}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" class="form-control"
                                placeholder="Please enter name" value="" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Please enter email" value=""
                                required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Please enter password"
                                required value="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="repassword">Re-password</label>
                            <input type="password" name="repassword" class="form-control"
                                placeholder="Please enter re-password" value="" required>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="mr-1 ml-2">
                                <input type="radio" name="level" id="level0" class="form-check-input" value="1">
                                <label class="form-check-label" for="level0">Admin</label>
                            </div>
                            <div class="ml-1">
                                <input type="radio" name="level" id="level3" class="form-check-input" value="2">
                                <label class="form-check-label" for="level3">Member</label>
                            </div>
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
    {{-- modal edit --}}
    <div class="modal" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">EDIT USER</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form action="{{ url('user') }}" method="post" id="editForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-form-label" for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" class="form-control"
                                placeholder="Please enter name" value="" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Please enter email" value="" required>
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
                                <input type="radio" name="level" id="level1" class="form-check-input" value="1">
                                <label class="form-check-label" for="level1">Admin</label>
                            </div>
                            <div class="ml-1">
                                <input type="radio" name="level" id="level2" class="form-check-input" value="1">
                                <label class="form-check-label" for="level2">Member</label>
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
