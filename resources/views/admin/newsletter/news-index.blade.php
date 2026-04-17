@extends('admin.master')
@section('title','User List')
@section('breadcrumb')
<a href="{{ route('newsletter.create') }}" class="btn btn-primary btn-sm">Add Newsletter</a>
@endsection
@section('content')

<div class="tray tray-center" style="">
<div class="panel">
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
                <h4>Newsletter List </h4>
                <table class="table admin-form theme-warning fs13" id="datatable3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Publish Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key=>$value)
                        <tr>
                            <td>{{ $key+=1 }}</td>
                            <td>{{ $value->title }}</td>
                            <td>{{ $value->publish_date }}</td>
                            <td>
                                <a href="{{ route('newsletter.edit',$value->id) }}">Edit</a>
                                 <a href="{{ route('newsletter.delete',$value->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
			</div>
		</div>
	</div>
</div>
</div>
@stop
@section('libraries')
<script src="{{asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script> 
<script src="{{asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script> 
<script src="{{asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script> 
<script src="{{asset( env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript">

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
      "sSwfPath": "{{asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')}}"
    }
  });
</script>
@endsection
