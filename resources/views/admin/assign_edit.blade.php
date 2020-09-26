@extends('templates.admin')

@section('body')

    <style>
        .select2-selection.select2-selection--single {
            height: 40px;
            padding: 5px;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h3>Edit Assignment</h3>

                        @include('templates.messages')

                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('assignUpdate', $assign->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" disabled class="form-control" id="username" name="username"
                                       value="{{ $assign->user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Email</label>
                                <input type="text" disabled class="form-control" id="email" name="email"
                                       value="{{ $assign->user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="type">Asset Number</label>
                                <input type="text" disabled class="form-control" id="number" name="number"
                                       value="{{ $assign->asset->number }}">
                            </div>
                            <div class="form-group">
                                <label for="software">OS</label>
                                <input class="form-control" id="os" name="os" value="{{ $assign->os }}">
                            </div>
                            <div class="form-group">
                                <label for="software">Software</label>
                                <select class="form-control" id="software" name="software[]" multiple="multiple">
                                    <option></option>
                                    @foreach($licenses as $license) {{-- $license -> License --}}
                                        <option value="{{ $license->id }}"

                                        @foreach($assign->software as $soft)
                                            @if($soft->id === $license->id)
                                                {{ 'selected' }}
                                                @endif
                                            @endforeach

                                        >{{ $license->product }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" disabled class="form-control" id="name" name="name"
                                       value="{{ $assign->asset->name }}">
                            </div>
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" disabled class="form-control" id="model" name="model"
                                       value="{{ $assign->asset->model }}">
                            </div>
                            <div class="form-group">
                                <label for="serial_number">Serial Number</label>
                                <input type="text" disabled class="form-control" id="serial_number" name="serial_number"
                                       value="{{ $assign->asset->serial_number }}">
                            </div>
                            <div class="form-group">
                                <label for="mac_id">MAC ID</label>
                                <input type="text" disabled class="form-control" id="mac_id" name="mac_id"
                                       value="{{ $assign->asset->mac_id }}">
                            </div>
                            <div class="form-group">
                                <label for="memory">Memory</label>
                                <input type="text" disabled class="form-control" id="memory" name="memory"
                                       value="{{ $assign->asset->memory }}">
                            </div>
                            <div class="form-group">
                                <label for="storage">Storage</label>
                                <input type="text" disabled class="form-control" id="storage" name="storage"
                                       value="{{ $assign->asset->storage }}">
                            </div>
                            <div class="form-group">
                                <label for="remarks">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks"
                                          rows="3">{{ $assign->asset->remarks }}</textarea>
                            </div>


                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#software').select2();
        });
    </script>

@endsection

