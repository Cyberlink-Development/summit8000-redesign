@extends('admin.master')
@section('breadcrumb')
    <a href="{{ Request::segment(1) }}/create" class="btn btn-primary btn-sm">Create</a>
@endsection
@section('content')
    <div class="tray tray-center" style="height: 647px;">
        <!-- Search Results Panel  -->
        <div class="panel">
            <div class="panel-body ph20">
                <div class="tab-content">
                    <!-- User Search Pane -->
                    <div id="users" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form theme-warning fs13">
                                <thead>
                                    <tr class="bg-light">
                                        <th class="">SN</th>
                                        <th class="">Name</th>
                                        <th class="">Email</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr class="id{{ $row->id }}">
                                            <td> {{ $loop->iteration }} </td>
                                            <td class=""> {{ $row->first_name }} {{ $row->last_name }}</td>
                                            <td class="">{{ $row->email }}</td>
                                            <td class="text-center">
                                                <a href="<?= url('member/' . $row->id . '/edit') ?>">Edit</a> | 
                                  <a href="#{{ $row->id }}" class="btn-delete">Delete</a>
                                </td>
                                @endforeach
                              </tr>                    
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>

@endsection

@section('scripts')
    <script type="text/javascript">
      $(document).ready(function(){
        $('.btn-delete').on('click',function(e){
        e.preventDefault();
        if(!confirm('Are you sure to delete?')) return false;
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var str = $(this).attr('href');
        var id = str.slice(1);
        $.ajax({
          type:'DELETE',
          url:"{{ url('member') . '/' }}" + id,
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
    </script>
@endsection
