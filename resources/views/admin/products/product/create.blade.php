@extends('admin/layout/base')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Management</h4>
                        <p class="card-description"> Add/ Update Product Content </p>
                        <div class="alert alert-danger" id="msg" style="display: none;"></div>
                        <form class="forms-sample" id="newFrmId" name="newFrmName" method="POST" action="#"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id"
                                value="@if (isset($result->id) && $result->id > 0) {{ $result->id }} @endif">
                            <div class="form-group">
                                <label for="exampleInputName1">Select Category</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    <option value="">Select Category</option>
                                    @if (isset($category) && !empty($category))
                                        @foreach ($category as $key => $val)
                                            <option value="{{ $val->id }}"
                                                @if (isset($result->category_id) && $result->category_id == $val->id) selected @endif>
                                                {{ $val->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="@if(isset($result->title) && $result->title != ''){{ $result->title }}@else{{ old('title') }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description">@if (isset($result->description) && $result->description != ''){{ $result->description }}@else{{ old('description') }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                @if (isset($result->image) && $result->image != '')
                                    <div class="input-group col-xs-12" style="margin-bottom: 20px;">
                                        <img src="{{ asset($result->image) }}" width="200">
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
                            <div class="form-group">
                                <label for="exampleInputName1">Sort Order</label>
                                <input type="number" class="form-control" id="sort_order" name="sort_order"
                                    placeholder="Sort Order"
                                    value="@if(isset($result->sort_order) && $result->sort_order > 0){{ $result->sort_order }}@else{{ old('sort_order') }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" @if (isset($result->status) && $result->status == 1) selected @endif>Active</option>
                                    <option value="0" @if (isset($result->status) && $result->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-danger mr-2"
                                onclick="window.location.href='{{ route('adminProduct') }}'"><i
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
                    url: "{{ route('adminProductDataSubmit') }}",
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
                                "{{ route('adminProduct') }}";
                        }, 1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
