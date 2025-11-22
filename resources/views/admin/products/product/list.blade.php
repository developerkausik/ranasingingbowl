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
                                <h4 class="card-title">List of Products</h4>
                            </div>
                            <div class="col-sm-2">
                                <a href="JavaScript:void(0)" id="resetSearch"
                                    class="btn-sm btn-danger btn-icon-text float-end"><i class="icon-refresh"></i> Reset Search</a>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn-sm btn-dark btn-icon-text float-end" href="{{ route('adminProductAdd') }}">
                                    <i class="icon-plus"></i> Add New
                                </a>
                            </div>
                        </div>

                        <p id="msg"></p>

                        <div class="table-responsive">
                            <table class="table table-striped" id="dataTableAjax">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Sort Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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
            var searchVal = @json($searchValue);

            var table = $('#dataTableAjax').DataTable({
                "lengthMenu": [
                    [25, 50, 100],
                    [25, 50, 100]
                ],
                "ordering": false,
                "bProcessing": true,
                "serverSide": true,
                "ajax": {
                    url: "{{ route('adminProductList') }}", // json datasource
                    type: "post", // type of method  ,GET/POST/DELETE
                    error: function() {
                        $("#dataTableAjax_processing").css("display", "none");
                    }
                }
            });

            if (searchVal !== '') {
                // Set the search box and trigger filtering
                table.search(searchVal).draw();
            }

            // Reset button logic
            $('#resetSearch').on('click', function() {
                /* table.search('').draw(); // Clear search filter
                $('#yourTableId_filter input').val(''); // Clear input box visually */

                // Optional: also clear session via AJAX if needed
                $.ajax({
                    url: "{{ route('adminProductDeleteSearch') }}", // Create this route
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        window.location.href =
                        "{{ route('adminProduct') }}"; // Redirect to the same page
                    },
                });
            });

            $('#dataTableAjax').on('click', '.delete', function() {
                var msg = confirm('Are you sure want to delete this record?');
                if (msg) {
                    var id = $(this).data('id');
                    $('#proccedtologin').show();
                    $.ajax({
                        url: "{{ route('adminProductDelete') }}",
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

            /* sorting */
            $('#dataTableAjax').on('change', '.sortOrder', function() {
                var id = $(this).data('id');
                var sortOrder = $(this).val();
                $('#proccedtologin').show();
                $.ajax({
                    url: "{{ route('adminProductSortOrder') }}",
                    method: 'POST',
                    data: {
                        id: id,
                        sort_order: sortOrder,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#proccedtologin').hide();
                    },
                    error: function(xhr) {
                        $('#proccedtologin').hide();
                    }
                });
            });

        });
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endsection
