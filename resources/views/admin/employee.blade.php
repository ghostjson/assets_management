@extends('templates.admin')

@section('body')
    <div class="container">
        <div class="row" style="margin-top: 30px">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex;justify-content: space-between;">
                        <h2>Name : {{ $user->name }}</h2>
                        <div class="status">
                            <span>Employee ID: </span> {{ $user->id }}
                        </div>
                    </div>
                    <div class="card-body">

                        <div>
                            <h3>Assets Already Have</h3>
                            <div class="table-responsive">
                                <div>
                                    <table class="table align-items-center">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name">Name</th>
                                            <th scope="col" class="sort" data-sort="name">Model</th>
                                            <th scope="col" class="sort" data-sort="name">Serial Number</th>
                                            <th scope="col" class="sort" data-sort="name">Issued Date</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                        @foreach($assigned_assets as $asset)
                                            <tr>
                                                <td>{{ $asset->name }}</td>
                                                <td>{{ $asset->model }}</td>
                                                <td>{{ $asset->serial_number }}</td>
                                                <td>{{ $asset->updated_at }}</td>
                                                <td>
                                                    <a href="{{ route('assetReturned', $asset->id) }}">
                                                        <span class="badge badge-pill badge-success">Returned</span>
                                                    </a>
                                                </td>
                                            <tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>

                        <a href="/">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
