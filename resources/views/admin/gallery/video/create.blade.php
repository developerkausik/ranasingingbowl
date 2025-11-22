@extends('admin/layout/base')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gallery Video Management</h4>
                        <p class="card-description"> Add/ Update Gallery Video Content </p>
                        <div class="alert alert-danger" id="msg" style="display: none;"></div>
                        <form class="forms-sample" id="newFrmId" name="newFrmName" method="POST" action="#"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id"
                                value="@if (isset($result->id) && $result->id > 0) {{ $result->id }} @endif">
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="@if(isset($result->title) && $result->title != ''){{ $result->title }}@else{{ old('title') }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Video Link</label>
                                <input type="text" class="form-control" id="video" name="video" placeholder="Video Link"
                                    value="@if(isset($result->video) && $result->video != ''){{ $result->video }}@else{{ old('video') }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" @if (isset($result->status) && $result->status == 1) selected @endif>Active</option>
                                    <option value="0" @if (isset($result->status) && $result->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-danger mr-2"
                                onclick="window.location.href='{{ route('adminGalleryVideo') }}'"><i
                                    class="ti-close btn-icon-prepend"></i> Cancel</button>
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
            tinymce.init({
                selector: '#description',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
            $('.file-upload-browse').click(function() {
                $('#image').click()
            })
            $('#image').change(function() {
                var filename = $('#image').val();
                $('.file-upload-info').val(filename);
            });
            $('#newFrmId').submit(function() {
                var form = $("#newFrmId");
                var formData = new FormData(form[0]);
                $('#msg').hide();
                $('#proccedtologin').show();
                $.ajax({
                    url: "{{ route('adminGalleryVideoDataSubmit') }}",
                    data: formData,
                    type: 'post',
                    cache: false,
                    processData: false,
                    contentType: false,
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
                        $('#loginmsg').html(data.message);
                        setTimeout(function() {
                            window.location.href =
                                "{{ route('adminGalleryVideo') }}";
                        }, 1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
