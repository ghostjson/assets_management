@extends('templates.employee')

@section('body')
    <div class="container">
        <div class="row" style="margin-top: 30px">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex;justify-content: space-between;">
                        <h2>Token : #{{ $ticket->ticket_id }}</h2>
                        <div class="status">
                            <span>Status: </span> {{ $ticket->status }}
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Content</h3>
                        <p>
                            {{ $ticket->content }}
                        </p>

                        <br>
                        <p>
                            Date: {{ $ticket->created_at }}
                        </p>

                        <a href="/">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
