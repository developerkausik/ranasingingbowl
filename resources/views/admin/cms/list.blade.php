@extends('admin/layout/base')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9"><h4 class="card-title">List of CMS</h4></div>
                            <div class="col-sm-3">
                                <a class="btn-sm btn-dark btn-icon-text float-end" href="{{ route('adminCmsAdd') }}"><i
                                        class="icon-plus"></i>
                                    Add New</a>
                            </div>
                        </div>
                        <p id="msg">
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th> Sl No </th>
                                        <th> Created At </th>
                                        <th> Updated At </th>
                                        <th> Page Name</th>
                                        <th> Cms Title</th>
                                        <th> Image</th>
                                        <th> Edit</th>
                                        <th> Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @if (isset($cms) && !empty($cms))
                                        @foreach ($cms as $key => $val)
                                            @php
                                                $edit_id = $val->id;
                                            @endphp
                                            <tr>
                                                <td class="py-1">
                                                    {{ $i }}
                                                </td>
                                                <td>{{ $val->created_at }}</td>
                                                <td>{{ $val->updated_at }}</td>
                                                <td>{{ $val->page_name }}</td>
                                                <td>{{ $val->title }}</td>
                                                <td><img src="{{ ($val->image != '') ? URL::asset($val->image) : URL::asset('uploads/no_image.jpg') }}" alt=""></td>
                                                <td>
                                                    <a href="{{ route('adminCmsUpdate', Crypt::encryptString($edit_id)) }}"
                                                        class="btn btn-otline-info text-info"><i class="icon-pencil"></i> Edit</a>
                                                </td>
                                                <td>
                                                    <a href="JavaScript:void(0)"
                                                        class="btn btn-otline-info text-danger delete"
                                                        data-id="{{ Crypt::encryptString($edit_id) }}"><i
                                                            class="icon-trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            @php
                                                $i++;
                                            @endphp
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
                if (msg == true) {
                    var id = $(this).data('id');
                    $('#proccedtologin').show();
                    $.ajax({
                        url: "{{ route('adminCmsDelete') }}",
                        data: {
                            'id': id
                        },
                        type: 'post',
                        dataType: 'json',
                        error: function(xhr, textStatus, errorThrown) {
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
        })
    </script>
@endsection
