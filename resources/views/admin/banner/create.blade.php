@extends('admin/layout/base')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Banner Management</h4>
                        <p class="card-description"> Add/ Update Banner Content </p>
                        <div class="alert alert-danger" id="msg" style="display: none;"></div>
                        <form class="forms-sample" id="newFrmId" name="newFrmName" method="POST" action="#"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id"
                                value="@if (isset($banner->id) && $banner->id > 0) {{ $banner->id }} @endif">
                            {{-- <div class="form-group">
                                <label for="exampleInputName1">Language</label>
                                <select class="form-select" id="language_id" name="language_id" required>
                                    <option value="">Select Language</option>
                                    @if (isset($language) && !empty($language))
                                        @foreach ($language as $key => $val)
                                            <option value="{{ $val->id }}"
                                                @if (isset($banner->language_id) && $banner->language_id == $val->id) selected @endif>
                                                {{ $val->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputName1">Page Name</label>
                                <input type="text" class="form-control" id="page_name" name="page_name"
                                    placeholder="Page Name"
                                    value="@if(isset($banner->page_name) && $banner->page_name != ''){{ $banner->page_name }}@else{{ old('page_name') }}@endif"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="@if(isset($banner->title) && $banner->title != ''){{ $banner->title }}@else{{ old('title') }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description">
                                    @if (isset($banner->description) && $banner->description != '')
                                    {{ $banner->description }}@else{{ old('description') }}
                                    @endif
                                    </textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                @if (isset($banner->image) && $banner->image != '')
                                    <div class="input-group col-xs-12" style="margin-bottom: 20px;">
                                        <img src="{{ asset($banner->image) }}" width="200">
                                    </div>
                                @endif
                                <input type="file" name="image" id="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn-sm btn-info" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger mr-2"
                                onclick="window.location.href='{{ route('adminBanner') }}'"><i
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
                selector: 'textarea',
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
                    url: "{{ route('adminBannerDataSubmit') }}",
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
                                "{{ route('adminBanner') }}";
                        }, 1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
