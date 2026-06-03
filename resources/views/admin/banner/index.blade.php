@extends('admin.master')
@section('title','Banner')
@section('breadcrumb')
     <a href="admin/banner/create" class="btn btn-primary btn-sm">Create</a>
@endsection
@section('content')
<section id="" class="table-layout animated fadeIn">
<div class="">
<div class="panel">         
	<div class="panel-body ph20">
		<div class="tab-content">
			<div id="users" class="tab-pane active">
				<div class="table-responsive mhn20 mvn15">
					<table class="table admin-form theme-warning fs13">
						<thead>
							<tr class="bg-light">
								<th class="">SN</th>
								<th class="">Title</th>
								<th class="">Show in Home</th> 
								<th class="">Image/ Video</th>
								<th class="">Created at</th>                            
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@if(count($data) > 0)	            
							@foreach($data as $row)
							<tr class="id{{$row->id}}">
								<td class="">{{$loop->iteration}}</td>
								<td class="">{{ ucfirst($row->title) }}</td>
								<td class="">
								    <form action="{{route('banner.isdefault',$row->id)}}" method="POST">
										@csrf	
										 @if(($row->status)==0)
                                      <button class="btn btn-danger btn btn-sm" name="status" value="0" type="submit"><i
                                              class="fa fa-times"></i>
                                      </button>
                                 		 @else
                                      <button class="btn btn-success btn btn-sm" name="status" value="1" type="submit"><i
                                              class="fa fa-check"></i>
                                      </button>
                               	   @endif								 									
									
									</form>
								</td>
								<td class="">
							    @if($row->video)
								<video uk-video uk-cover preload="auto" width="200" height="auto" loop playsinline
                                   autoplay muted data-setup='{"fluid": true,"controls": false,"loop":true}'>
                                   <source src="{{asset('uploads/banners/'.$row->video)}}" type="video/mp4" muted>
                               </video>
							    @else
							    <img src="{{url(env('PUBLIC_PATH').'uploads/banners/' . $row->picture )}}" width="200" />
							    @endif
								</td>
								<td class="">{{ ucfirst($row->created_at) }}</td>
								<td class="text-center">  
									<a href="{{ url('admin/banner/'.$row->id.'/edit') }}">Edit</a> 
									|
									<span class="trash"><a href="#{{$row->id}}" class="btn-delete">
										Delete
									</a></span>
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
</section>
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
      url:"{{url('admin/banner') . '/'}}" + id,
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