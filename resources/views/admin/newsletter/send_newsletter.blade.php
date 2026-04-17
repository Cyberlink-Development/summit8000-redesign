@extends('admin.master')
@section('title','Send Newsletter')
@section('breadcrumb')
 <button type="button" class="btn btn-sm btn-success send-email"><i class="fa fa-paper-plane"aria-hidden="true"></i> Send Email </button>
 @endsection
@section('content')
 <h1>Send Newsletter </h1>
    <div class="container">
        <div class="form-group">
        <div class="col-lg-9">
            <div class="bs-component">
                <label for="inputSelect"> Newsletter </label>
                <select name="news_id" class="form-control" id="news">
                <option  selected disabled>Open this select menu</option>
                    @foreach ($news as $value)
                 <option value="{{ $value->id }}">{{ $value->title }}</option>
                  @endforeach
                </select>
                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt;
                    &gt;
                </div>
            </div>
        </div>
        <br/>
    </div>

        <hr/>
     <table class="table admin-form table-striped dataTable" id="datatable3">
        <thead>
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            </tr>
            <input type="checkbox" id="checkAll"> Check All
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <td><input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}"></td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    {!! $users->links() !!}

@stop
@section('libraries')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">

 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".send-email").click(function(){
        var selectRowsCount = $("input[class='user-checkbox']:checked").length;
        var news_id=$('#news').find(":selected").val();
        // alert(news_id);

        if (selectRowsCount > 0 && news_id !="Open this select menu"){

            var ids = $.map($("input[class='user-checkbox']:checked"), function(c){return c.value; });
            
            
            $.ajax({
               type:'POST',
               url:"{{ route('ajax.send.email') }}",
               data:{
                   ids:ids,
                   news_id:news_id
               },
               success:function(data){
                  
                   toastr.success(data.message);
                   location.reload();
               }
            });

        }else{
            alert("Please select at least one user from list.");
        }
       
    });

</script>
@stop

