@extends('templates.admin')

@section('body')
    <div class="container" style="margin-top: 20px">
        <div class="row">

        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between">
                        <h2></h2>
                        <div>
                            <a href="{{ route('licensesCreateView') }}">
                                <button type="button" class="btn btn-default btn-sm">Add New Software</button>
                            </a>
                        </div>


                    </div>
                    <div class="card-body">
                        <table id="licenses" class="display nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Software Name</th>
                                <th>Product Type</th>
                                <th>License Type</th>
                                <th>Subscription Name</th>
                                <th>License Count</th>
                                <th>License Expire</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($licenses as $license)
                                <tr>
                                    <td>{{ $license->product }}</td>
                                    <td>{{ $license->product_type }}</td>
                                    <td>{{ $license->license_type }}</td>
                                    <td> {{ is_null($license->subscription_name) ? '' : $license->subscription_name }}</td>
                                    <td>{{ $license->license_count }}</td>
                                    <td>{{ $license->license_expire }}</td>
                                    <td>
                                        <a href="{{ route('licenseEditView', $license->id) }}">
                                            <span class="badge badge-pill badge-default">Edit</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Software Name</th>
                                <th>Product Type</th>
                                <th>License Type</th>
                                <th>Subscription Name</th>
                                <th>License Count</th>
                                <th>License Expire</th>
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
            $('#licenses').DataTable({
                dom: 'Bfrtip'
            });
        });
    </script>
@endsection
