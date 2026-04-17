@extends('admin.master')
@section('title','Team')
@section('breadcrumb')
<a href="{{ route('teams.create') }}" class="btn btn-primary btn-sm">Create</a>
@endsection
@section('content')
<div class="tray tray-center" style="height: 647px;">
  <!-- Search Results Panel  -->

<div class="tab-content">        
      <!-- User Search Pane -->
    <div class="row">
      <div class="col-md-12">
        <div class="bs-component">
          <div class="panel">
            <div class="panel-heading">
              <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
                <li class="active">
                  <a href="#tab1_1" data-toggle="tab">Board of Directors</a>
                </li>
                <li>
                  <a href="#tab1_2" data-toggle="tab">International Leaders</a>
                </li>
                 <li>
                  <a href="#tab1_3" data-toggle="tab">Office Staffs</a>
                </li>
                 <li>
                  <a href="#tab1_4" data-toggle="tab">Field Staffs</a>
                </li>
              </ul>
            </div>
            <div class="panel-body">
              <div class="tab-content pn br-n">
                <div id="tab1_1" class="tab-pane active">
                  <div class="_row">
                    <div class="col-md-12">
                      <div id="board-of-director" class="tab-pane active">
                       <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable1">
                        <thead>
                          <tr class="bg-light">
							<th class="">SN</th>
							<th class="">Name</th>
						    <th class="">Ordering</th>                            
							<th class="text-left">Action</th>
							</tr>
                        </thead>
                        <tbody>
                          @if(count($bod) > 0)	            
							@foreach($bod as $row)
							<tr class="id{{$row->id}}">
								<td class="">{{$loop->iteration}}</td>
								<td class="">{{ ucfirst($row->name) }}</td>
								<td>{{$row->ordering}}</td>
								<td class="text-left">  
								<a href="{{ url('admin/teams/'.$row->id.'/edit') }}">Edit</a>
									|
									<span class="trash"><a href="#{{$row->id}}" class="btn-delete">Delete</a> </span>
									
								</td>
							</tr>
							@endforeach
							@endif                    
                            </tbody>
                          </table>
                        </div>
                        </div>
                    </div>
                  </div>
                </div>
                    <div id="tab1_2" class="tab-pane">
                      <div class="_row">
                        <div class="col-md-12">
                          <div id="international_coordinator" class="tab-pane">
                           <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable2">
                        <thead>
                       <tr class="bg-light">
								<th class="">SN</th>
								<th class="">Name</th>  
								<th class="">Ordering</th>                            
								<th class="text-left">Action</th>
							</tr>
                        </thead>
                        <tbody>
                           @if(count($int) > 0)	            
							@foreach($int as $row)
							<tr class="id{{$row->id}}">
								<td class="">{{$loop->iteration}}</td>
								<td class="">{{ ucfirst($row->name) }}</td>
								<td>{{$row->ordering}}</td>
								<td class="text-left">  
								<a href="{{ url('admin/teams/'.$row->id.'/edit') }}">Edit</a>
									|
									<span class="trash"><a href="#{{$row->id}}" class="btn-delete">Delete</a> </span>
									
								</td>
							</tr>
							@endforeach
							@endif  
                          </tr>                    
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
                 <div id="tab1_3" class="tab-pane">
                      <div class="_row">
                        <div class="col-md-12">
                          <div id="office_staff" class="tab-pane ">
                           <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable3">
                        <thead>
                       <tr class="bg-light">
								<th class="">SN</th>
								<th class="">Name</th>  
								<th class="">Ordering</th>                            
								<th class="text-left">Action</th>
							</tr>
                        </thead>
                        <tbody>
                           @if(count($office) > 0)	            
							@foreach($office as $row)
							<tr class="id{{$row->id}}">
								<td class="">{{$loop->iteration}}</td>
								<td class="">{{ ucfirst($row->name) }}</td>
								<td>{{$row->ordering}}</td>
								<td class="text-left">  
								<a href="{{ url('admin/teams/'.$row->id.'/edit') }}">Edit</a>
									|
									<span class="trash"><a href="#{{$row->id}}" class="btn-delete">Delete</a> </span>
									
								</td>
							</tr>
							@endforeach
							@endif  
                          </tr>                    
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
                 <div id="tab1_4" class="tab-pane">
                      <div class="_row">
                        <div class="col-md-12">
                          <div id="field_staff" class="tab-pane active">
                           <div class="table-responsive mhn20 mvn15">
                      <table class="table admin-form theme-warning fs13" id="datatable4">
                        <thead>
                       <tr class="bg-light">
								<th class="">SN</th>
								<th class="">Name</th>
								<th class="">Ordering</th>                            
								<th class="text-left">Action</th>
							</tr>
                        </thead>
                        <tbody>
                           @if(count($field) > 0)	            
							@foreach($field as $row)
							<tr class="id{{$row->id}}">
								<td class="">{{$loop->iteration}}</td>
								<td class="">{{ ucfirst($row->name) }}</td>
								<td>{{$row->ordering}}</td>
								<td class="text-left">  
								<a href="{{ url('admin/teams/'.$row->id.'/edit') }}">Edit</a>
									|
									<span class="trash"><a href="#{{$row->id}}" class="btn-delete">Delete</a> </span>
								</td>
							</tr>
							@endforeach
							@endif  
                          </tr>                    
                        </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</div>

@endsection

@section('libraries')
<!-- Datatables -->
<script src="{{asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>

<!-- Datatables Tabletools addon -->
<script src="{{asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js')}}"></script>

<!-- Datatables ColReorder addon -->
<script src="{{asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js')}}"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="{{asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

<script type="text/javascript">
jQuery(document).ready(function() {
  $('.btn-delete').on('click',function(e){
    e.preventDefault();
    
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    
    $.ajax({
      type:'DELETE',
      url:"{{url('admin/teams') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('tbody tr.id' + id ).remove();
      },
      error:function(data){       
       alert('Error occurred!');
     }
   });
  });
});
 /************/
  $('#datatable1').dataTable({
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
    "iDisplayLength": 20,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "{{asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')}}"
    }
  });
   /************/
  $('#datatable2').dataTable({
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
    "iDisplayLength": 20,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "{{asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')}}"
    }
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
    "iDisplayLength": 20,
    "aLengthMenu": [
    [5, 10, 25, 50, -1],
    [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "{{asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf')}}"
    }
  });
 /************/
  $('#datatable4').dataTable({
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
    "iDisplayLength": 20,
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