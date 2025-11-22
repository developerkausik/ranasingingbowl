@extends('admin/layout/base')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile</h4>
                        <p class="card-description"> Update Site Profile </p>
                        <div class="alert alert-danger" id="msg" style="display: none;"></div>
                        <form class="forms-sample" id="newFrmId" name="newFrmName" method="POST" action="#"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id"
                                value="@if(isset($settings->id) && $settings->id > 0){{ $settings->id }}@endif">
                            <div class="form-group">
                                <label for="exampleInputName1">Company Name</label>
                                <input type="text" class="form-control" id="companename" name="companename"
                                    placeholder="Company Name"
                                    value="@if(isset($settings->companename) && $settings->companename != ''){{ $settings->companename }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Registered Office</label>
                                <textarea class="form-control" id="address" name="address">@if(isset($settings->address) && $settings->address != ''){{ $settings->address }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    value="@if(isset($settings->email) && $settings->email != ''){{ $settings->email }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Contact Number</label>
                                <input type="tel" class="form-control" id="ph_no" name="ph_no"
                                    placeholder="Contact Number"
                                    value="@if(isset($settings->ph_no) && $settings->ph_no != ''){{ $settings->ph_no }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Fax</label>
                                <input type="tel" class="form-control" id="fax" name="fax"
                                    placeholder="Fax"
                                    value="@if(isset($settings->fax) && $settings->fax != ''){{ $settings->fax }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Corporate Office</label>
                                <textarea class="form-control" id="head_address" name="head_address">@if(isset($settings->head_address) && $settings->head_address != ''){{ $settings->head_address }}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Email</label>
                                <input type="email" class="form-control" id="alt_email" name="alt_email" placeholder="Email"
                                    value="@if(isset($settings->alt_email) && $settings->alt_email != ''){{ $settings->alt_email }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Contact Number</label>
                                <input type="tel" class="form-control" id="alt_ph_no" name="alt_ph_no"
                                    placeholder="Contact Number"
                                    value="@if(isset($settings->alt_ph_no) && $settings->alt_ph_no != ''){{ $settings->alt_ph_no }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Fax</label>
                                <input type="tel" class="form-control" id="alt_fax" name="alt_fax"
                                    placeholder="Fax"
                                    value="@if(isset($settings->alt_fax) && $settings->alt_fax != ''){{ $settings->alt_fax }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Instagram Link</label>
                                <input type="text" class="form-control" id="insta_link" name="insta_link"
                                    placeholder="Instagram Link"
                                    value="@if(isset($settings->insta_link) && $settings->insta_link != ''){{ $settings->insta_link }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Facebook Link</label>
                                <input type="text" class="form-control" id="fb_link" name="fb_link"
                                    placeholder="Facebook Link"
                                    value="@if(isset($settings->fb_link) && $settings->fb_link != ''){{ $settings->fb_link }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Linkedin Link</label>
                                <input type="text" class="form-control" id="linkedin_link" name="linkedin_link"
                                    placeholder="Linkedin Link"
                                    value="@if(isset($settings->linkedin_link) && $settings->linkedin_link != ''){{ $settings->linkedin_link }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Twitter Link</label>
                                <input type="text" class="form-control" id="twitter_link" name="twitter_link"
                                    placeholder="Twitter Link"
                                    value="@if(isset($settings->twitter_link) && $settings->twitter_link != ''){{ $settings->twitter_link }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">WhatsApp Link</label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                    placeholder="WhatsApp Link"
                                    value="@if(isset($settings->whatsapp) && $settings->whatsapp != ''){{ $settings->whatsapp }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Youtube Link</label>
                                <input type="text" class="form-control" id="youtube_link" name="youtube_link"
                                    placeholder="Youtube Link"
                                    value="@if(isset($settings->youtube_link) && $settings->youtube_link != ''){{ $settings->youtube_link }}@endif">
                            </div>
                            <div class="form-group">
                                <label>Upload Background Sound</label>
                                @if (isset($settings->sound) && $settings->sound != '')
                                    <div class="input-group col-xs-12" style="margin-bottom: 20px;">
                                        <audio controls>
                                            <source src="{{ URL::asset($settings->sound) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                @endif
                                <input type="file" name="sound" id="sound" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled
                                        placeholder="Upload Sound">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn-sm btn-info" type="button">Upload</button>
                                    </span>
                                </div>
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
            tinymce.init({
                selector: 'textarea',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
            $('.file-upload-browse').click(function() {
                $('#sound').click()
            })
            $('#sound').change(function() {
                var filename = $('#sound').val();
                $('.file-upload-info').val(filename);
            });

            $('#newFrmId').submit(function() {
                var form = $("#newFrmId");
                var formData = new FormData(form[0]);
                $('#msg').hide();
                $('#proccedtologin').show();
                $.ajax({
                    url: "{{ route('adminSettingsDataSubmit') }}",
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
