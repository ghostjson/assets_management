@extends('templates.admin')

@section('body')
    <div class="container" style="margin-top: 20px">
        <div class="row">

        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h2>Assignments</h2>
                        <div>
                            @if(count($assigns) > 0)
                                <a href="{{ route('assignDownload') }}">
                                    <button type="button" class="btn btn-default btn-sm">Download CSV</button>
                                </a>
                            @endif
                            <a href="{{ route('assignAssetView') }}">
                                <button type="button" class="btn btn-default btn-sm">New Assign</button>
                            </a>
                        </div>


                    </div>
                    <div class="card-body">
                        <table id="assets" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Employee Email</th>
                                <th>Asset Name</th>
                                <th>Asset Number</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($assigns as $assign)
                                <tr>
                                    <td>
                                        <a href="{{ route('employeeView', $assign->user->id) }}">
                                            {{ $assign->user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $assign->user->email }}</td>
                                    <td>
                                        <a href="{{ route('assetView', $assign->asset->id) }}">
                                            {{ $assign->asset->name }}
                                        </a>
                                    </td>
                                    <td>{{ $assign->asset->number }}</td>
                                    <td>{{ $assign->created_at }}</td>
                                    <td>
                                        <a href="{{ route('assetReturned', $assign->asset->id) }}">
                                            <span class="badge badge-pill badge-success">Returned</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Employee Name</th>
                                <th>Employee Email</th>
                                <th>Asset Name</th>
                                <th>Asset Number</th>
                                <th>Asset Model</th>
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
