@extends('templates.admin')

@section('body')
    <div class="container">
        <div class="row" style="margin-top: 30px">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex;justify-content: space-between;">
                        <h2>Ticket : #{{ $ticket->ticket_id }}</h2>
                        <div class="status">
                            <span>Status: </span> {{ $ticket->status }}
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Name</h3>
                        <p>{{ $ticket->user->name }}</p> <br>
                        <h3>Content</h3>
                        <p>
                            {{ $ticket->content }}
                        </p>

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
                                        </tr>
                                        </thead>
                                        <tbody class="list">
                                        @foreach($assigned_assets as $asset)
                                            <tr>
                                                <td>{{ $asset->name }}</td>
                                                <td>{{ $asset->model }}</td>
                                                <td>{{ $asset->serial_number }}</td>
                                                <td>{{ $asset->updated_at }}</td>
                                            <tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h2>Assets</h2>
                        <a href="{{ route('completeTicket', $ticket->id) }}">
                            <button type="button" class="btn btn-success btn-sm">Complete</button>
                        </a>

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
                                <th>Status</th>
                                <th>Memory</th>
                                <th>Storage</th>
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
                                    <td>{{ $asset->status }}</td>
                                    <td>{{ $asset->memory }}</td>
                                    <td>{{ $asset->storage }}</td>
                                    <td>
                                        <a href="{{ route('assignAsset', [$asset->id, $ticket->employee_id]) }}">
                                            <span class="badge badge-pill badge-default">Assign</span>
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
                                <th>Status</th>
                                <th>Memory</th>
                                <th>Storage</th>
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
