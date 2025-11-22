{{-- filepath: d:\xampp-new\htdocs\ranasingingbowl\resources\views\admin\products\product\list.blade.php --}}
@extends('admin/layout/base')

@section('content')
    <div class="content-wrapper">
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
                            <div class="col-sm-8">
                                <h4 class="card-title">List of Variant for {{ $product->title }}</h4>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn-sm btn-danger btn-icon-text float-end"
                                    href="{{ route('adminProduct') }}">
                                    <i class="icon-arrow-left"></i> Back
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn-sm btn-dark btn-icon-text float-end"
                                    href="{{ route('adminProductVariantAdd', Crypt::encryptString($product->id)) }}">
                                    <i class="icon-plus"></i> Add New
                                </a>
                            </div>
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
                                        <th>Code</th>
                                        <th>Image</th>
                                        <th>More Image 1</th>
                                        <th>More Image 2</th>
                                        <th>More Image 3</th>
                                        <th>More Image 4</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                                <td>{{ $val->varient_code }}</td>
                                                <td><img src="{{ URL::asset($val->image) }}" alt="Product Image"></td>
                                                <td><img src="{{ ($val->image1 != '') ? URL::asset($val->image1) : URL::asset('uploads/no_image.jpg') }}" alt="Product Image"></td>
                                                <td><img src="{{ ($val->image2 != '') ? URL::asset($val->image2) : URL::asset('uploads/no_image.jpg') }}" alt="Product Image"></td>
                                                <td><img src="{{ ($val->image3 != '') ? URL::asset($val->image3) : URL::asset('uploads/no_image.jpg') }}" alt="Product Image"></td>
                                                <td><img src="{{ ($val->image4 != '') ? URL::asset($val->image4) : URL::asset('uploads/no_image.jpg') }}" alt="Product Image"></td>
                                                <td>@if ($val->status == 1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">Inactive</label> @endif
                                                </td>
                                                <td>
                                                    <button class="btn-sm btn-outline-dark dropdown-toggle" type="button"
                        id="dropdownMenuSizeButton2" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Action</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2"> <a
                            href="{{route('adminProductVariantSound', Crypt::encryptString($edit_id)) }}"
                            class="btn btn-outline text-warning"> <i class="icon-play"></i> Upload Sound </a> <div class="dropdown-divider"></div> <a href="{{ route('adminProductVariantUpdate', Crypt::encryptString($edit_id)) }}"
                        class="btn btn-outline text-info"> <i class="icon-pencil"></i> Edit
                    </a> <div class="dropdown-divider"></div> <a href="JavaScript:void(0)"
                        class="btn btn-outline-delete text-danger delete"
                        data-id="{{ Crypt::encryptString($edit_id) }}"> <i
                            class="icon-trash"></i> Delete </a>
                    </div>
                                                </td>

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
                        url: "{{ route('adminProductVariantDelete') }}",
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
        });
    </script>
@endsection
