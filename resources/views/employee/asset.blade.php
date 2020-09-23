@extends('templates.employee')

@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="container">
                        <div class="row">
                            <div class="col" style="display: flex;justify-content: space-between">
                                <h2>
                                    {{ $assign->asset->name }}
                                </h2>
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
                                    <td>{{ $assign->asset->name }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{ $assign->asset->type }}</td>
                                </tr>
                                <tr>
                                    <td>Number</td>
                                    <td>{{ $assign->asset->number }}</td>
                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>{{ $assign->asset->model }}</td>
                                </tr>
                                <tr>
                                    <td>Serial Number</td>
                                    <td>{{ $assign->asset->serial_number }}</td>
                                </tr>
                                <tr>
                                    <td>Mac ID</td>
                                    <td>{{ $assign->asset->mac_id }}</td>
                                </tr>
                                <tr>
                                    <td>Memory</td>
                                    <td>{{ $assign->asset->memory }}</td>
                                </tr>
                                <tr>
                                    <td>Storage</td>
                                    <td>{{ $assign->asset->storage }}</td>
                                </tr>
                                <tr>
                                    <td>Software</td>
                                    <td>{{ $assign->software }}</td>
                                </tr>
                                <tr>
                                    <td>OS</td>
                                    <td>{{ $assign->os }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection
