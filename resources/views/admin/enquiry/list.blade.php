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
                            <div class="col-sm-9"><h4 class="card-title">List of Contact Request</h4></div>
                            {{-- <div class="col-sm-3">
                                <a class="btn-sm btn-dark btn-icon-text float-end" href="{{ route('adminCmsAdd') }}"><i
                                        class="icon-plus"></i>
                                    Add New</a>
                            </div> --}}
                        </div>
                        <p id="msg">
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTable">
                                <thead>
                                    <tr>
                                        <th> Sl No </th>
                                        <th> Enquiry date </th>
                                        <th> Name</th>
                                        <th> Phone Number</th>
                                        <th> Email Id</th>
                                        <th> Country</th>
                                        <th> Message</th>
                                        <th> Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @if (isset($result) && !empty($result))
                                        @foreach ($result as $key => $val)
                                            @php
                                                $edit_id = $val->id;
                                            @endphp
                                            <tr>
                                                <td class="py-1">
                                                    {{ $i }}
                                                </td>
                                                <td>{{ $val->created_at }}</td>
                                                <td>{{ $val->name }}</td>
                                                <td>{{ $val->phone }}</td>
                                                <td>{{ $val->email }}</td>
                                                <td>{{ $val->country }}</td>
                                                <td>{{ $val->message }}</td>
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
                        url: "{{ route('adminContactEnquiryDelete') }}",
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
