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

                        <br>

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
                                        @foreach($assets as $asset)
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

                                <p style="margin-top: 20px;">
                                    Date: {{ $ticket->created_at }}
                                </p>


                                <div>
                                    <a href="{{ route('ticketAssign', [$ticket->id,$ticket->user->id]) }}">
                                        <button type="button" class="btn btn-default">Assign</button>
                                    </a>
                                    <a href="#">
                                        <button type="button" class="btn btn-success">Complete</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
