@extends('templates.admin')

@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col" style="display: flex;justify-content: space-between">
                                <h2>
                                    {{ $asset->name }}
                                    @if($asset->status === 'assigned')
                                        <span class="badge badge-info" style="position: relative; bottom: 4px">Assigned</span>
                                    @else
                                        <span class="badge badge-info"  style="position: relative; bottom: 4px">Unassigned</span>
                                    @endif
                                </h2>
                                <div class="buttons">
                                    <a href="{{ route('assetsEditView', $asset->id) }}">
                                        <button type="button" class="btn btn-warning">Edit</button>
                                    </a>
                                    <a href="{{ route('assetsDelete', $asset->id) }}">
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="container">
                            <table class="table align-items-center" align="left">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Property Name</th>
                                    <th scope="col" class="sort" data-sort="name">Value</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                <tr>
                                    <td>
                                        <h5> Name </h5>
                                    </td>
                                    <td>{{ $asset->name }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{ $asset->type }}</td>
                                </tr>
                                <tr>
                                    <td>Number</td>
                                    <td>{{ $asset->number }}</td>
                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>{{ $asset->model }}</td>
                                </tr>
                                <tr>
                                    <td>Serial Number</td>
                                    <td>{{ $asset->serial_number }}</td>
                                </tr>
                                <tr>
                                    <td>Mac ID</td>
                                    <td>{{ $asset->mac_id }}</td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>{{ $asset->memory }}</td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>{{ $asset->storage }}</td>
                                </tr>
                                @if($asset->amount)
                                    <tr>
                                        <td>Amount</td>
                                        <td>{{ $asset->amount }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Bill</td>
                                    <td>
                                        <a href="{{ $asset->bill }}" download>Download</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                            @if($asset->remarks)
                                <div class="container">
                                    <h3>Remarks</h3>
                                    <p>
                                        {{ $asset->remarks }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
@endsection
