@extends('admin/layout/base')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">SEO Management</h4>
                        <p class="card-description"> Add/ Update SEO Content </p>
                        <div class="alert alert-danger" id="msg" style="display: none;"></div>
                        <form class="forms-sample" id="newFrmId" name="newFrmName" method="POST" action="#"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id"
                                value="@if (isset($seo->id) && $seo->id > 0) {{ $seo->id }} @endif">
                            <div class="form-group">
                                <label for="exampleInputName1">URL</label>
                                <input type="text" class="form-control" id="current_url" name="current_url"
                                    placeholder="URL"
                                    value="@if(isset($seo->current_url) && $seo->current_url != ''){{ $seo->current_url }}@else{{ old('current_url') }}@endif"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Seo Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                                    value="@if(isset($seo->title) && $seo->title != ''){{ $seo->title }}@else{{ old('title') }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Meta Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description">@if (isset($seo->description) && $seo->description != ''){{ $seo->description }}@else{{ old('description') }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Meta Keywords</label>
                                <textarea class="form-control" id="keyword" name="keyword" placeholder="Keywords">@if (isset($seo->keyword) && $seo->keyword != ''){{ $seo->keyword }}@else{{ old('keyword') }}@endif</textarea>
                            </div>
                            <button type="button" class="btn btn-danger mr-2"
                                onclick="window.location.href='{{ route('adminSeo') }}'"><i
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
            /* tinymce.init({
                selector: '#description',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            }); */
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
                    url: "{{ route('adminSeoDataSubmit') }}",
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
                                "{{ route('adminSeo') }}";
                        }, 1000);
                    }
                });
                return false;
            });
        });
    </script>
@endsection
