@extends('templates.admin')

@section('body')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h3>Site Settings</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('updateSettings') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                            </div>


                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

