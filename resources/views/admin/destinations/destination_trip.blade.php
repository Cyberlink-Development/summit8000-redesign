@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
<a href="{{ url('admin/trip/create') }}" class="btn btn-primary btn-sm">Create</a>
@endsection

@section('content')

<section id="" class="table-layout animated fadeIn">
  <!-- begin: .tray-center -->
  <div class="">
    <h4> Trips </h4>
    <!-- recent orders table -->
    <div class="panel">
      <div class="panel-body pn">
        <div class="table-responsive">
          <table class="table admin-form table-striped dataTable" id="datatable3">
            <thead>
              <tr class="bg-light">
                <th > SN </th>
                <th >Trip Title</th>
                <th >Category</th>
                <th >Trip Group</th>
                 <th>Status</th>
                <th class="text-center" >Order</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($data as $row)
              <tr class="id{{ $row->id }}">
                <td >
                  {{ $loop->iteration }}
                </td>
                <td class="post_title title_hi_sh" >
                  <strong> {{ ucfirst($row->trip_title) }} </strong>
                  <div class="row_actions">
                    <span class="id">ID: {{ $row->id }} | </span>
                    <span class="edit"><a
                      href="{{ url('admin/trip/'  . $row->id . '/edit') }}"
                      aria-label="">Edit</a>
                    </span>
                    <span class="trash"> | <a href="#{{ $row->id }}"
                      class="submitdelete1">Delete</a> </span>
                    </div>
                  </td>
                  <td >
                    @if($row->activities)
                    @foreach($row->activities as $value)
                    <span>{{$value->title}}</span><br>
                    @endforeach
                    @endif
                  </td>

                  <td>
                     {{($row->video_status == 1)?'Popular':''}}
                    @if($row->tripgroups)
                    @foreach($row->tripgroups as $_row)
                    <span>{{$_row->title}}</span><br>
                    @endforeach
                    @endif
                  </td>
                  <td class="text-center">
                    <input class="CheckStatus" type="checkbox" name="status" data-rowid="{{$row->id}}" {{($row->status == 1)?'checked':''}} />
                    </td>
                  <td class="text-center" >
                    {{ $row->ordering }}
                  </td>                
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
  <script src="{{ asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
  <!-- Datatables Tabletools addon -->
  <script src="{{ asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
  <!-- Datatables ColReorder addon -->
  <script src="{{ asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
  <!-- Datatables Bootstrap Modifications  -->
  <script src="{{ asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
  <script type="text/javascript">
  (function($) {
      
    $('.CheckStatus').on('click',function(e){
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var id = $(this).attr('data-rowid');
    var url  = '{{ route("admin.tripstatus",["id"=>':id']) }}';
      url = url.replace(':id',id);
      $.ajax({
        type:'put',
        url:url,
        data:{_token:csrf},
        success:function(data){
        },
        error:function(data){
        }
      });
  });
  
    $('.submitdelete1').on('click', function(e) { 
      e.preventDefault();
      if (confirm('Are you sure to delete??')) {
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var str = $(this).attr('href'); 
        var id = str.slice(1);
        $.ajax({
          type: 'delete',
          url: "{{ url('admin') . '/' . 'trip' . '/' }}" + id,
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
    "iDisplayLength": 30,
    "aLengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',
    "oTableTools": {
      "sSwfPath": "{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}"
    }
  });

  </script>

  @endsection
