@extends('templates.admin')

@section('body')
    <div class="container" style="margin-top: 20px">
        <div class="row">

        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h2>Assets</h2>

                        <div>
                            @if(count($assets) > 0)
                                <a href="{{ route('assetsDownload') }}">
                                    <button type="button" class="btn btn-default btn-sm">Download CSV</button>
                                </a>
                            @endif
                            <a href="{{ route('assetsCreateView') }}">
                                <button type="button" class="btn btn-default btn-sm">New Asset</button>
                            </a>
                        </div>


                    </div>
                    <div class="card-body">
                        <table id="assets" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Number</th>
                                <th>Model</th>
                                <th>Serial Number</th>
                                <th>Mac ID</th>
                                <th>Memory</th>
                                <th>Storage</th>
                                <th>Status</th>
        <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($assets as $asset)
                                <tr>
                                    <td><a href="{{ route('assetView', $asset->id) }}">{{ $asset->name }}</a></td>
                                    <td>{{ $asset->type }}</td>
                                    <td>{{ $asset->number }}</td>
                                    <td>{{ $asset->model }}</td>
                                    <td>{{ $asset->serial_number }}</td>
                                    <td>{{ $asset->mac_id }}</td>
                                    <td>{{ $asset->memory }}</td>
                                    <td>{{ $asset->storage }}</td>
                                    <td>
                                        @if($asset->status == 'assigned')
                                            <span class="badge badge-pill badge-dark">
                                                {{ $asset->status }}
                                            </span>
                                        @else
                                            <span class="badge badge-pill badge-success">
                                            Available
                                            </span>
                                        @endif
                                    </td><td></td>
                                    <td>
                                        <a href="{{ route('assetsEditView', $asset->id) }}">
                                            <span class="badge badge-pill badge-warning">Edit</span>
                                        </a>
                                        <a href="{{ route('assetsDelete', $asset->id) }}">
                                            <span class="badge badge-pill badge-danger">Delete</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Number</th>
                                <th>Model</th>
                                <th>Serial Number</th>
                                <th>Mac ID</th>
                                <th>Memory</th>
                                <th>Storage</th>
                                <th>Status</th>

                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#assets').DataTable({
                dom: 'Bfrtip'
            });
        });
    </script>
@endsection
