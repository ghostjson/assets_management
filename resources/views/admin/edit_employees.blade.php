@extends('templates.admin')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h3>Edit Employee</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('employeesEdit', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }}" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Email</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" @if($role->id == $user->role_id) selected @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
