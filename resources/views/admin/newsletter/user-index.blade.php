@extends('admin.master')
@section('title','User List')
@section('breadcrumb')
<a href="{{ route('subscriber.create') }}" class="btn btn-primary btn-sm">Add Subscriber</a>
@endsection
@section('content')
<div class="tray tray-center" style="">
<div class="panel">
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
                    <h4>Subscriber List </h4>
                    <a href="{{route('download')}}" class="btn btn-secondary">Download CSV</a>
                
                    <table class="table admin-form theme-warning fs13" id="datatable3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key=>$value)
                                <tr>
                                    <td>{{ $key+=1 }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>
                                        <a href="{{ route('subscriber.update',$value->id) }}">Edit</a>
                                         <a href="{{ route('user.delete',$value->id) }}">Delete</a>
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
    "iDisplayLength": 50,
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
