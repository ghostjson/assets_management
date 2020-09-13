@extends('templates.employee')

@section('body')

    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Ticket</h2>
                    </div>
                    <form action="{{ route('createTicket') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 30px;">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2>Recent Tickets</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div>
                                <table class="table align-items-center">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Ticket ID</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="list">

                                        @foreach($tickets as $ticket)
                                            <tr>
                                                <td>#{{$ticket->ticket_id}}</td>
                                                <td>{{$ticket->status}}</td>
                                                <td>{{$ticket->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('ticketView',$ticket->id ) }}">
                                                        <span class="badge badge-pill badge-info">View</span>
                                                    </a>
                                                </td>
                                            </tr>
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

@endsection
