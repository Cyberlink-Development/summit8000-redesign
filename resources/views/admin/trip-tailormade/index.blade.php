@extends('admin.master')
@section('title','Trip Booking')
@section('breadcrumb')
{{--    <a href="{{ route('post-trip-review') }}" class="btn btn-primary btn-sm">Create</a>--}}
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
                        <th class="">Detail</th>
                        <th class="">Trip</th>
                        <th class="">Duration / Date</th>
                        <th class="">Total People</th>
                        <th class="">Inquiry On</th>
                        <th class="">Comments</th>
                        <th class="text-left">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($tailormade) > 0)
                        @foreach($tailormade as $key=>$row)
                        <tr class="bg-light">
                        <td class="">{{$key+=1}}</td>                          
                        <td class="">{{ ucfirst($row->full_name) }} <br> {{ ($row->email) }} <br> {{$row->contact}} <br> {{$row->country}}</td> 
                       <td class="">{{ucfirst($row->title)}} <br>{{ tripname($row->trip_id) }}</td>
                        <td class="">{{$row->duration}} Days<br>{{$row->start_date}}</td>
                        <td class="">{{ ($row->num_ppl) }}</td>
                        <td class="">{{$row->created_at->format('d M Y')}}</td>
                        <td class=""><textarea>{!!$row->message!!}</textarea></td>
                         <td class="text-left">
                          <form action="{{ route('category-inquiry.destroy', $row->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="fa fa-trash form-control" style="color:red;"></button>
                          </form>
                              
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

