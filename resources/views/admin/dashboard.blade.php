@extends('templates.admin')

@section('body')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                </div>
                <!-- Card stats -->
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Pending Tickets</h2>
                    </div>
                    <div class="card-body">
                        <table id="tickets" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pending_tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->ticket_id }}</td>
                                    <td>{{ $ticket->user->name }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>
                                        <a href="{{ route('adminTicketView', $ticket->id) }}">
                                            <span class="badge badge-pill badge-info">View</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>All Tickets</h2>
                    </div>
                    <div class="card-body">
                        <table id="all_tickets" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->ticket_id }}</td>
                                    <td>{{ $ticket->user->name }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>
                                        <a href="{{ route('adminTicketView', $ticket->id) }}">
                                            <span class="badge badge-pill badge-info">View</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Ticket ID</th>
                                <th>Employee Name</th>
                                <th>Date</th>
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
            $('#tickets').DataTable({
                dom: 'Bfrtip'
            });
        });
        $(document).ready(function () {
            $('#all_tickets').DataTable({
                dom: 'Bfrtip'
            });
        });
    </script>
@endsection
