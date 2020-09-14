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
                            <div class="form-group">
                                <label for="notification_mail">Notification Mail</label>
                                <input type="email" value="{{ \App\Models\Setting::get('notification_mail') }}" class="form-control" id="notification_mail" name="notification_mail">
                            </div>
                            <div class="form-group">
                                <label for="website_theme_color">Theme Color</label>
                                <input type="color" value="{{ \App\Models\Setting::get('website_theme_color') }}" class="form-control" id="website_theme_color" name="website_theme_color">
                            </div>



                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

