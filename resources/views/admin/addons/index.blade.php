@extends('admin.master')

@section('title', 'Addon')

@section('breadcrumb')

    <a href="{{ route('addon.create') }}" class="btn btn-primary btn-sm">

        Create

    </a>

@endsection

@section('content')

    <section class="table-layout animated fadeIn">

        <div class="">

            <h4> Addon </h4>

            <div class="panel">

                <div class="panel-body pn">

                    <div class="table-responsive">

                        <table class="table admin-form table-striped dataTable" id="datatable3">

                            <thead>

                                <tr class="bg-light">

                                    <th class="text-center">
                                        SN
                                    </th>

                                    <th>
                                        Title
                                    </th>

                                    <th>
                                        Price
                                    </th>

                                    <th>
                                        Order
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Published
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($data as $row)
                                    <tr class="id{{ $row->id }}">

                                        {{-- SN --}}
                                        <td class="text-center">

                                            {{ $loop->iteration }}

                                        </td>

                                        {{-- Title --}}
                                        <td class="post_title title_hi_sh">

                                            <strong>

                                                {{ ucfirst($row->title) }}

                                            </strong>

                                            <div class="row_actions">

                                                <span class="id">
                                                    ID: {{ $row->id }} |
                                                </span>

                                                <span class="edit">

                                                    <a href="{{ route('addon.edit', $row->id) }}">

                                                        Edit

                                                    </a>

                                                </span>

                                                |

                                                <span class="trash">

                                                    <a href="#{{ $row->id }}" class="submitdelete1">

                                                        Delete

                                                    </a>

                                                </span>

                                            </div>

                                        </td>

                                        {{-- Price --}}
                                        <td>

                                            {{ $row->price }}

                                        </td>

                                        {{-- Order --}}
                                        <td>

                                            {{ $row->ordering }}

                                        </td>

                                        {{-- Status --}}
                                        <td>

                                            @if ($row->status == 1)
                                                <span class="label label-success">
                                                    Active
                                                </span>
                                            @else
                                                <span class="label label-danger">
                                                    Inactive
                                                </span>
                                            @endif

                                        </td>

                                        {{-- Created Date --}}
                                        <td class="date">

                                            {{ $row->created_at }}

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection


@section('libraries')

    <!-- Datatables -->
    <script src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

    <!-- Datatables Tabletools addon -->
    <script
        src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>

    <!-- Datatables ColReorder addon -->
    <script
        src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}">
    </script>

    <!-- Datatables Bootstrap Modifications -->
    <script src="{{ asset(env('PUBLIC_PATH') . 'vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>


    <script type="text/javascript">
        (function($) {

            $('.submitdelete1').on('click', function(e) {

                e.preventDefault();

                if (confirm('Are you sure to delete??')) {

                    var csrf = $('meta[name="csrf-token"]').attr('content');

                    var str = $(this).attr('href');

                    var id = str.slice(1);

                    $.ajax({

                        type: 'delete',

                        url: "{{ url('admin/addon') }}/" + id,

                        data: {
                            _token: csrf
                        },

                        success: function(data) {

                            $('tbody tr.id' + id).remove();

                        },

                        error: function(data) {

                            alert('Error occurred!');

                        }

                    });

                }

            });

        }(jQuery));


        $('#datatable3').dataTable({

            "aoColumnDefs": [{
                'bSortable': true,
                'aTargets': [-1]
            }],

            "oLanguage": {

                "oPaginate": {
                    "sPrevious": "Previous",
                    "sNext": "Next"
                }

            },

            "iDisplayLength": 10,

            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],

            "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',

            "oTableTools": {

                "sSwfPath": "{{ asset(env('PUBLIC_PATH')) }}vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"

            }

        });
    </script>

@endsection
