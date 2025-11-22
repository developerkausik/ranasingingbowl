@extends('admin/layout/base')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password</h4>
                        <p class="card-description"> Update Login Password </p>
                        <div class="alert alert-danger" id="msg" style="display: none;"></div>
                        <form class="forms-sample" id="newFrmId" name="newFrmName" method="POST" action="#"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id"
                                value="@if (isset($users->id) && $users->id > 0) {{ $users->id }} @endif">
                            <div class="form-group">
                                <label for="exampleInputName1">Existing Password</label>
                                <input type="password" class="form-control" id="old_password" name="old_password"
                                    placeholder="Existing Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">New Password :</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="New Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Confirm Password :</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation" placeholder="Confirm Password">
                            </div>
                            <button type="submit" class="btn btn-success mr-2"><i class="ti-file btn-icon-prepend"></i>
                                Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptContent')
    <script>
        $(document).ready(function() {
            $('.file-upload-browse').click(function() {
                $('#image').click()
            })
            $('#image').change(function() {
                var filename = $('#image').val();
                $('.file-upload-info').val(filename);
            });

            $('#newFrmId').submit(function() {
                $('#msg').hide();
                $('#proccedtologin').show();
                $.ajax({
                    url: "{{ route('profilePasswordSubmit') }}",
                    data: $('#newFrmId').serialize(),
                    type: 'post',
                    dataType: 'json',
                    error: function(xhr, textStatus, errorThrown) {
                        var err = JSON.parse(xhr.responseText);
                        $('#msg').html(err.message);
                        if (err.errors) {
                            $('#msg').append('<ul>');
                            $.each(err.errors, function(key, value) {
                                $("#msg").find("ul").append('<li>' + value + '</li>');
                            });
                            $('#msg').append('</ul>');
                        }
                        $('#msg').show();
                        $('#proccedtologin').hide();
                    },
                    success: function(data) {
                        $('#newFrmId')[0].reset();
                        $('#loginmsg').html(data.message);
                        setTimeout(function() {
                            $('#proccedtologin').hide();
                        }, 1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
