@extends('admin.master')
@section('title', '')

@section('breadcrumb')
<a href="{{route('admin.faq.create',$tirp_id)}}" class="btn btn-primary btn-sm">Create</a>
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
								<th class="">Title </th>   
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
								<td class="">{{ ucfirst($row->title) }}</td>					
								<td> {{ $row->ordering }} </td>
								<td> {{ $row->created_at }} </td>
								<td class="text-left">  
									<a href="{{ route('admin.faq.edit',['admin'=>$tirp_id,'faq'=>$row->id]) }}">Edit</a> 
									| <a href="{{$row->id}}" class="btn-delete">Delete</a>								
								</td>
							</tr>
							@endforeach
							@else
							 <tr>
							 	<td colspan="5" class="text-center"> Data Not Available! </td>
							 </tr>
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
    var id = $(this).attr('href');
    var trip_id = '{{$tirp_id}}';
    var url = '{{route("admin.faq.destroy",["admin"=>':admin',"faq"=>':faq'])}}';
       url = url.replace(':admin',trip_id);
	   url = url.replace(':faq',id);    
    $.ajax({
      type:'DELETE',
      url:url,
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