@extends('templates.admin')

@section('body')
    <div class="container" style="margin-top: 20px">
        <div class="row">

        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h2>Users</h2>
                        <a href="{{ route('employeesCreateView') }}">
                            <button type="button" class="btn btn-default btn-sm">New User</button>
                        </a>

                    </div>
                    <div class="card-body">
                        <table id="assets" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>
                                        <a href="{{ route('employeeView', $employee->id) }}">
                                        {{ $employee->name }}
                                        </a>
                                    </td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->role->name }}</td>
                                    <td>
                                        <a href="{{ route('employeesEditView', $employee->id) }}">
                                            <span class="badge badge-pill badge-warning">Edit</span>
                                        </a>
                                        <a href="{{ route('employeesDelete', $employee->id) }}">
                                            <span class="badge badge-pill badge-danger">Delete</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
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
