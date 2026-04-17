@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
    <a href="{{ route('admin.post.create', Request::segment(2)) }}" class="btn btn-primary btn-sm">Create</a>
@endsection

@section('content')

    <section id="" class="table-layout animated fadeIn">
        <!-- begin: .tray-center -->
        <div class="">
            <h4> Posts </h4>
            <!-- recent orders table -->
            <div class="panel">
                <div class="panel-body pn">
                    <div class="table-responsive">
                        <table class="table admin-form table-striped dataTable" id="datatable3">
                            <thead>
                                <tr class="bg-light">
                                    <th class="text-center"> SN </th>
                                    <th>Post Name</th>
                                    <th></th>
                                    <th>Visiter</th>
                                    <th></th>
                                    <th>Order</th>
                                    <th></th>
                                    <th>Published</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr class="id{{ $row->id }}">
                                        <td class="text-center">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="post_title title_hi_sh">
                                            @if (check_child_post($row->id) || Request::segment(2)=='team-members')
                                                <strong> {{ ucfirst($row->post_title) }} </strong>
                                                <a href="{{ url('admin/' . Request::segment(2) . '/' . $row->id) }}">
                                                    <i class="fa fa-list" aria-hidden="true"></i> </a>
                                            @else
                                                <strong> {{ ucfirst($row->post_title) }}</strong>
                                            @endif

                                            <div class="row_actions"><span class="id">ID: {{ $row->id }} | </span>
                                                <span class="edit"><a
                                                        href="{{ url('admin/' . Request::segment(2) . '/' . $row->id . '/edit') }}"
                                                        aria-label="">Edit</a>
                                                </span>
                                                @if (
                                                    !check_child_post($row->id) > 0 &&
                                                        !has_associatedpost($row->id) > 0 &&
                                                        $row->id != '118' &&
                                                        $row->id != '134' &&
                                                        $row->id != '124' &&
                                                        $row->id != '157')
                                                    
                                                    @if (has_postimage($row->id) <= 0)
                                                        | <span class="trash"><a href="#{{ $row->id }}" class="submitdelete1">Delete</a></span>
                                                    @endif

                                                @endif
                                        </td>
                                        <td></td>
                                        <td class="text-center">{{ $row->visiter }}</td>
                                        <td></td>
                                        <td> {{ $row->post_order }}</td>
                                        <td>
                                            {{-- @if ($row->id == '118' || $row->id == '121' || $row->id == '125' || $row->id == '130' || $row->id == '137') --}}
                                            @if(has_associatedpost($row->id) > 0)
                                                <a href="{{ url('admin/associated/' . Request::segment(2) . '/' . $row->id) }}"><i
                                                    class="fa fa-plus fa fa-2x"></i></a>
                                            @endif
                                            {{-- @endif --}}

                                            @if (has_postimage($row->id) > 0)
                                                <a href="{{ route('admin.multiplephoto', $row->id) }}" title="Photo">
                                                    <i class="fa fa-file-image-o" aria-hidden="true" style="color:#ff5000;"></i>
                                                </a>
                                            @endif
                                        </td>
                                        <td class="date"> {{ $row->created_at }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: .tray-center -->
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
    <!-- Datatables Bootstrap Modifications  -->
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
                        url: "{{ url('admin') . '/' . Request::segment(2) . '/' }}" + id,
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

        /********/
        $('document').ready(function() {
            $('#checkAll').on('click', function(e) {
                if ($(this).is(':checked', true)) {
                    $('.check_box').prop('checked', true);
                } else {
                    $('.check_box').prop('checked', false);
                }
            });
            $('.deleteAll').on(function() {

            });
        });


        /************/
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
