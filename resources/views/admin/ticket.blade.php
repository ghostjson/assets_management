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
                        <h3>Subject: {{ $ticket->subject }}</h3>
                        <br>
                        <h3>Content</h3>
                        <p>
                            {{ $ticket->content }}
                        </p>

                        <br>

                        @if(count($assets) > 0)
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


                                </div>
                            </div>
                        @endif
                        @if($ticket->status !== 'completed')
                            <form method="post" action="{{ route('completeTicket', $ticket->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="notes">Notes</label>
                                    <textarea class="form-control" id="notes" name="notes" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Complete</button>

                            </form>
                        @else
                            <div class="row">
                                <div class="col">
                                    <h3>Remarks</h3>
                                    <p>
                                        {{ $ticket->notes }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
@endsection
