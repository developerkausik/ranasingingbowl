@extends('admin/layout/base')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Variant Management</h4>
                        <p class="card-description"> Add/ Update Product Variant of {{ $product->title }} </p>
                        <div class="alert alert-danger" id="msg" style="display: none;"></div>
                        <form class="forms-sample" id="newFrmId" name="newFrmName" method="POST" action="#"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id"
                                value="@if (isset($product->id) && $product->id > 0) {{ $product->id }} @endif">
                            <input type="hidden" name="id" id="id"
                                value="@if (isset($result->id) && $result->id > 0) {{ $result->id }} @endif">
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="@if(isset($result->title) && $result->title != ''){{ $result->title }}@else{{ old('title') }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Variant Code</label>
                                <input type="text" class="form-control" id="varient_code" name="varient_code" placeholder="Variant Code"
                                    value="@if(isset($result->varient_code) && $result->varient_code != ''){{ $result->varient_code }}@else{{ old('varient_code') }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description">@if (isset($result->description) && $result->description != ''){{ $result->description }}@else{{ old('description') }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Main Image</label>
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
                            @for($i = 1; $i <= 4; $i++)
                                <div class="form-group">
                                    <label>Upload More Image {{ $i }}</label>
                                    @php
                                        $imageField = 'image' . $i;
                                    @endphp
                                    @if (isset($result->$imageField) && $result->$imageField != '')
                                        <div class="input-group col-xs-12" style="margin-bottom: 20px;">
                                            <img src="{{ asset($result->$imageField) }}" width="200">
                                        </div>
                                    @endif

                                    <input type="file" name="image{{ $i }}" id="image{{ $i }}" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info{{ $i }}" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse{{ $i }} btn-sm btn-info" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            @endfor
                            <div class="form-group">
                                <label for="exampleInputName1">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" @if (isset($result->status) && $result->status == 1) selected @endif>Active</option>
                                    <option value="0" @if (isset($result->status) && $result->status == 0) selected @endif>Inactive</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-danger mr-2"
                                onclick="window.location.href='{{ route('adminProductVariant', Crypt::encryptString($product->id)) }}'"><i
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

            @for($i = 1; $i <= 4; $i++)
                $('.file-upload-browse{{ $i }}').click(function() {
                    $('#image{{ $i }}').click()
                })
                $('#image{{ $i }}').change(function() {
                    var filename = $('#image{{ $i }}').val();
                    $('.file-upload-info{{ $i }}').val(filename);
                });
            @endfor

            $('#newFrmId').submit(function() {
                var form = $("#newFrmId");
                var formData = new FormData(form[0]);
                $('#msg').hide();
                $('#proccedtologin').show();
                $.ajax({
                    url: "{{ route('adminProductVariantDataSubmit') }}",
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
                            var url =
                                "{{ route('adminProductVariant', ['id' => 'ID_PLACEHOLDER']) }}";
                            url = url.replace('ID_PLACEHOLDER', data.id);
                            window.location.href = url;
                        }, 1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
