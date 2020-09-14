@extends('templates.admin')

@section('body')

    <style>
        .select2-selection.select2-selection--single {
            height: 40px;
            padding: 5px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h3>New Assignment</h3>

                        @include('templates.messages')

                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('assignCreate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <select class="form-control" id="employee_name" name="user_id">
                                    <option></option>
                                    @foreach($employees as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="type">Email</label>
                                <input type="text" disabled class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="type">Asset Number</label>
                                <select class="form-control" id="assets_number" name="asset_id">
                                    <option></option>
                                    @foreach($assets as $id => $number)
                                        <option value="{{ $id }}">{{ $number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="software">Software</label>
                                <input class="form-control" id="software" name="software">
                            </div>
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" disabled class="form-control" id="model" name="model" >
                            </div>
                            <div class="form-group">
                                <label for="serial_number">Serial Number</label>
                                <input type="text" disabled class="form-control" id="serial_number" name="serial_number"
                                       >
                            </div>
                            <div class="form-group">
                                <label for="mac_id">MAC ID</label>
                                <input type="text" disabled class="form-control" id="mac_id" name="mac_id">
                            </div>
                            <div class="form-group">
                                <label for="memory">Memory</label>
                                <input type="text" disabled class="form-control" id="memory" name="memory" >
                            </div>
                            <div class="form-group">
                                <label for="storage">Storage</label>
                                <input type="text" disabled class="form-control" id="storage" name="storage" >
                            </div>
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks" rows="3"></textarea>
                            </div>


                            <button type="submit" class="btn btn-default">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('#employee_name').select2();
            $('#assets_number').select2();
        });

        $(document).ready(function () {
            $('#employee_name').change(function () {
                let id = $(this).val()
                fetch(`/admin/employee/${id}/get`)
                    .then(response => response.json())
                    .then(data => {
                        $('#email').val(data.email);
                    });
            })

            $('#assets_number').change(function () {
                let id = $(this).val()
                fetch(`/admin/asset/${id}/get`)
                    .then(response => response.json())
                    .then(data => {
                        $('#model').val(data.model);
                        $('#serial_number').val(data.serial_number);
                        $('#mac_id').val(data.mac_id);
                        $('#memory').val(data.memory);
                        $('#storage').val(data.storage);
                    });
            })
        });

    </script>
@endsection
