@extends('templates.admin')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h3>New Asset</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('assetsCreate') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" class="form-control" id="type" name="type" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Number</label>
                                <input type="text" class="form-control" id="number" name="number" required>
                            </div>
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" class="form-control" id="model" name="model" required>
                            </div>
                            <div class="form-group">
                                <label for="serial_number">Serial Number</label>
                                <input type="text" class="form-control" id="serial_number" name="serial_number" required>
                            </div>
                            <div class="form-group">
                                <label for="mac_id">MAC ID</label>
                                <input type="text" class="form-control" id="mac_id" name="mac_id">
                            </div>
                            <div class="form-group">
                                <label for="memory">Memory</label>
                                <input type="text" class="form-control" id="memory" name="memory" required>
                            </div>
                            <div class="form-group">
                                <label for="storage">Storage</label>
                                <input type="text" class="form-control" id="storage" name="storage" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount">
                            </div>
                            <div class="form-group">
                                <label for="bill">Bill</label>
                                <input type="file" class="form-control" id="bill" name="bill">
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
