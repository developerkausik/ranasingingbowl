{{-- filepath: d:\xampp-new\htdocs\ranasingingbowl\resources\views\admin\products\product\list.blade.php --}}
@extends('admin/layout/base')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Product Variant Sound Management</h4>
                        <p class="card-description"> Add/ Update Sound of {{ $variant->product->title }} - {{ $variant->title }}</p>
                        <div class="alert alert-danger" id="msg" style="display: none;"></div>
                        <form class="forms-sample" id="newFrmId" name="newFrmName" method="POST" action="#"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id"
                                value="@if(isset($variant->product_id) && $variant->product_id > 0){{ $variant->product_id }}@endif">
                            <input type="hidden" name="variant_id" id="variant_id"
                                value="@if(isset($variant->id) && $variant->id > 0){{ $variant->id }}@endif">
                            <input type="hidden" name="id" id="id"
                                value="@if(isset($sound->id) && $sound->id > 0){{ $sound->id }}@endif">
                            <div class="form-group">
                                <label for="exampleInputName1">Sound Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Sound Title"
                                    value="@if(isset($sound->title) && $sound->title != ''){{ $sound->title }}@else{{ old('title') }}@endif">
                            </div>
                            <div class="form-group">
                                <label>Upload Sound</label>
                                @if (isset($sound->sound) && $sound->sound != '')
                                    <div class="input-group col-xs-12" style="margin-bottom: 20px;">
                                        <audio controls>
                                            <source src="{{ URL::asset($sound->sound) }}" type="audio/mpeg">
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
                            <button type="button" class="btn btn-danger mr-2"
                                onclick="window.location.href='{{ route('adminProductVariant', Crypt::encryptString($variant->id)) }}'"><i
                                    class="ti-arrow-left btn-icon-prepend"></i> Back to Product</button>
                            <button type="submit" class="btn btn-success mr-2"><i class="ti-file btn-icon-prepend"></i>
                                Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    {{-- Success Message --}}
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="card-title">List of Sounds for {{ $variant->product->title }} - {{ $variant->title }}</h4>
                            </div>
                            {{-- <div class="col-sm-3">
                                <a class="btn-sm btn-dark btn-icon-text float-end" href="{{ route('adminProductAdd') }}">
                                    <i class="icon-plus"></i> Add New
                                </a>
                            </div> --}}
                        </div>

                        <p id="msg"></p>

                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Title</th>
                                        <th>Sound</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @if (isset($result) && !empty($result))
                                        @foreach ($result as $key => $val)
                                            @php $edit_id = $val->id; @endphp
                                            <tr>
                                                <td class="py-1">{{ $i }}</td>
                                                <td>{{ $val->created_at }}</td>
                                                <td>{{ $val->updated_at }}</td>
                                                <td>{{ $val->title }}</td>
                                                <td>
                                                    @if (isset($val->sound) && $val->sound != '')
                                                        <audio controls>
                                                            <source src="{{ URL::asset($val->sound) }}" type="audio/mpeg">
                                                            Your browser does not support the audio element.
                                                        </audio>
                                                    @else
                                                        No Sound
                                                    @endif
                                                </td>
                                                <td><a href="{{ route('adminProductVariantSoundUpdate', [Crypt::encryptString($variant->id), Crypt::encryptString($edit_id)]) }}"
                                                        class="btn btn-outline text-info"> <i class="icon-pencil"></i> Edit
                                                    </a></td>
                                                <td><a href="JavaScript:void(0)"
                                                        class="btn btn-outline-delete text-danger delete"
                                                        data-id="{{ Crypt::encryptString($edit_id) }}"> <i
                                                            class="icon-trash"></i> Delete </a></td>
                                            </tr>
                                            @php $i++; @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scriptContent')
    <style>
        .table-responsive td {
            font-size: 12px !important;
        }

        .table-responsive th {
            font-size: 13px !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#dataTable').on('click', '.delete', function() {
                var msg = confirm('Are you sure want to delete this record?');
                if (msg) {
                    var id = $(this).data('id');
                    $('#proccedtologin').show();
                    $.ajax({
                        url: "{{ route('adminProductVariantSoundDelete') }}",
                        data: {
                            id: id
                        },
                        type: 'post',
                        dataType: 'json',
                        error: function(xhr) {
                            var err = JSON.parse(xhr.responseText);
                            $('#msg').html(err.message);
                            if (err.errors) {
                                $('#msg').append('<ul>');
                                $.each(err.errors, function(key, value) {
                                    $("#msg").find("ul").append('<li>' + value +
                                        '</li>');
                                });
                                $('#msg').append('</ul>');
                            }
                            $('#msg').show();
                            $('#proccedtologin').hide();
                        },
                        success: function(data) {
                            $('#loginmsg').html(data.message);
                            setTimeout(function() {
                                window.location.reload();
                            }, 1000);
                        }
                    });
                }
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
                    url: "{{ route('adminProductVariantSoundDataSubmit') }}",
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
                                "{{ route('adminProductVariantSound', ['id' => 'ID_PLACEHOLDER']) }}";
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
