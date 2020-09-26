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
                                    Assign ID: {{ $assign->id }}
                                </h2>
                                {{--                                <div class="buttons">--}}
                                {{--                                    <a href="{{ route('assetsEditView', $asset->id) }}">--}}
                                {{--                                        <button type="button" class="btn btn-warning">Edit</button>--}}
                                {{--                                    </a>--}}
                                {{--                                    <a href="{{ route('assetsDelete', $asset->id) }}">--}}
                                {{--                                        <button type="button" class="btn btn-danger">Delete</button>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}
                            </div>
                            <div>
                                <a href="{{ route('assignEditView', $assign->id) }}">
                                    <button type="button" class="btn btn-warning">Edit</button>
                                </a>
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
                                        <h5> User Name </h5>
                                    </td>
                                    <td>
                                        <a href="{{ route('employeeView', $assign->user->id) }}">
                                            <strong>{{ $assign->user->name }}</strong>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $assign->user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Asset Name</td>
                                    <td>
                                        <a href="{{ route('assetView', $assign->asset->id) }}">
                                            <strong>{{ $assign->asset->name }}</strong>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Asset Model</td>
                                    <td>{{ $assign->asset->model }}</td>
                                </tr>
                                <tr>
                                    <td>Asset Number</td>
                                    <td>{{ $assign->asset->number }}</td>
                                </tr>
                                @if($assign->os)
                                    <tr>
                                        <td>OS</td>
                                        <td>{{ $assign->os }}</td>
                                    </tr>
                                @endif
                                @if($assign->software)
                                    <tr>
                                        <td>Software</td>
                                        <td>
                                            <ul>
                                            @foreach($assign->software as $soft)
                                                <li>{{ $soft->product }}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <div class="container card-footer">
                    @if($assign->remarks)
                        <div class="container">
                            <h3>Remarks</h3>
                            <p>
                                {{ $assign->remarks }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
@endsection
