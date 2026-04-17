@extends('admin.master')
@section('title','Trip Booking')
@section('breadcrumb')
@endsection
@section('content')
    <div class="tray tray-center" style="height: 647px;">
        <div class="panel">
            <div class="panel-body ph20">
                <div class="tab-content">
                    <div id="users" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form table-striped dataTable" id="datatable3">
                                <thead>
                                <tr class="bg-light">
                                    <th class="">SN</th>  
                                    <th>Name</th>                                 
                                    <th class="">Email</th>
                                    <th class="">Trip</th>
                                    <th>Payment</th>
                                    <th class="text-left">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                  @if(count($data) > 0)
                                    @foreach($data as $key=>$row)
                                      <tr class="bg-light">
                                        <td class="">{{$key+=1}}</td>
                                        <td>
                                          <a href="{{route('payment.show',$row->id)}}">{{ $row->first_name }} {{$row->last_name}}</a>
                                        </td>
                                        <td class="">
                                          {{ $row->email }}
                                        </td>
                                        <td class="" style="color: {{$row->trip ? '' : 'red'}}">
                                            {{$row->trip ? $row->trip->trip_title : 'Trip Deleted'}}
                                        </td>
                                        <td>
                                          {{ucfirst($row->payment_type)}} | {{$row->paid_status == 0 ? 'Unpaid' : 'Paid'}}
                                        </td>
                                        <td class="text-left">
                                          <a href="{{route('payment.show',$row->id)}}">View</a> |
                                          <span class="trash"><a href="{{route('payment.delete',$row->id)}}" onclick="return confirm('Confirm Delete?')" class="btn-btn-danger">Delete</a></span>
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
  </script>
@endsection

