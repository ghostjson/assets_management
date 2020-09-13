@extends('templates.employee')

@section('body')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('changePassword') }}" enctype="multipart/form-data">
                            @include('templates.messages')
                            @csrf
                            <div class="form-group">
                                <label for="password">Change Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="new password">
                                <input style="margin-top: 20px" type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm password">
                            </div>


                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

