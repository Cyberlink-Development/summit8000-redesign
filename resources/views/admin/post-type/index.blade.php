@extends('admin.master')
@section('title','Post Type')
@section('breadcrumb')
<a href="{{ route('type.posttype.create', Request::segment(2)) }}" class="btn btn-primary btn-sm">Create</a>
@endsection
@section('content')
<div class="tray tray-center" style="">
<div class="panel">
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">

				<table class="table admin-form theme-warning fs13">
						<thead>
							<tr class="bg-light">
								<th class="">SN</th>
								<th class="">Post Type</th>
								<th class="">Is Header? </th>
								<th class="">Is Things To Know? </th>
								<th class=""> Ordering </th>
								<th class="">Date</th>
								<th class="text-left">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)
							@foreach($data as $row)
							<tr class="id{{$row->id}}">
								<td class="">{{$loop->iteration}}</td>
								<td class=""> <a href="{{ url('admin/'.$row->uri)}}">{{ ucfirst($row->post_type) }}</a></td>
								<td class="">{{ ($row->is_menu == 1)?'Yes':'No' }}</td>
								<td class="">{{ ($row->is_footer == 1)?'Yes':'No' }}</td>
								<td> {{ $row->ordering }} </td>
								<td> {{ $row->created_at }} </td>
								<td class="text-left">
									<a href="{{ url('type/posttype/'.$row->id.'/edit') }}">Edit</a>

									@if(!is_empty_posttype($row->id))
									<!--|-->
									<!-- <a href="#{{$row->id}}" class="btn-delete">Delete</a>	 -->
									@endif
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

@section('scripts')
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
      url:"{{url('type/posttype') . '/'}}" + id,
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
