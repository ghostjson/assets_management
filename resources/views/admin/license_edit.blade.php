@extends('templates.admin')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card" style="margin-top: 20px">
                    <div class="card-header">
                        <h3>Edit License</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('licenseEdit', $license->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="product">Product</label>
                                <input type="text" class="form-control" id="product" value="{{ $license->product }}" name="product" required>
                            </div>
                            <div class="form-group">
                                <label>Product Type</label>
                                <select class="form-control" id="product_type" name="product_type">
                                    <option value="Account" @if($license->product === 'Account') selected @endif >Account</option>
                                    <option value="Software" @if($license->product === 'Software') selected @endif>Software</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>License Type</label>
                                <select class="form-control" id="license_type" name="license_type">
                                    <option value="Software Licensing"  @if($license->license_type === 'Software Licensing') selected @endif>Software Licensing</option>
                                    <option value="Subscription"  @if($license->license_type === 'Subscription') selected @endif>Subscription</option>
                                </select>
                            </div>
                            <div class="form-group" id="subscription_name_field">
                                <label for="subscription_name">Subscription Name</label>
                                <input type="text" class="form-control" id="subscription_name" value="{{ $license->subscription_name }}" name="subscription_name" required>
                            </div>
                            <div class="form-group">
                                <label for="license_count">License Count</label>
                                <input type="number" class="form-control" value="{{ $license->license_count }}" id="license_count" name="license_count" required>
                            </div>
                            <div class="form-group">
                                <label for="license_expire">Expire Date</label>
                                <input type="text" class="form-control datepicker"  value="{{ $license->license_expire }}"  id="license_expire" name="license_expire" required>
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
        $(document).ready(function (){
            if($('#license_type').val() !== "Subscription")
            {
                $('#subscription_name_field').hide();
                $('#subscription_name').attr('disabled', true);
            }
        })

        $("#license_type").change(function(){
            if('Subscription' === $(this).val())
            {
                $('#subscription_name_field').show();
                $('#subscription_name').attr('disabled', false);
            }else{
                $('#subscription_name').attr('disabled', true);
                $('#subscription_name').val('');
                $('#subscription_name_field').hide();
            }
        })
    </script>
@endsection
