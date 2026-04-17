@extends('admin.master')
@section('breadcrumb')
 <a href="{{ route('payment.index') }}" class="btn btn-primary btn-sm">Go Back</a>
@endsection
@section('content')

	<div class="col-md-8">
		<!-- Input Fields -->
		<div class="panel">
			<div class="panel-body">  
				<div class="form-group">
				    <div class="col-lg-12">
						<div class="bs-component">
						    <h3>Trip Information</h3>
						    <table class="table admin-form table-striped dataTable" id="datatable3">
                                <tbody>
                                <tr>
                                    <td class=""> Trip Name</td>
                                    <td class="" style="color: {{$data->trip ? '' : 'red'}}">{{$data->trip ? $data->trip->trip_title : 'Trip Deleted'}}</td>
                                </tr>
                                <tr>
                                    <td class="">Trip Starts</td>
                                    <td class="">{{ $data->start_date }} </td>
                                </tr>
                                <tr>
                                    <td class="">Trip Ends</td>
                                    <td class="">{{ $data->end_date }} </td>
                                </tr>
                                <tr>
                                    <td class="">Num of people</td>
                                    <td class="">{{ $data->no_of_people }} </td>
                                </tr>
                                </tbody>
                            </table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="bs-component">
						    <h3>Personal Information</h3>
						    <table class="table admin-form table-striped dataTable" id="datatable3">
                                <tbody>
                                    <tr>
                                        <td class="">Name</td>
                                        <td class="">{{ $data->first_name }} {{$data->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Email</td>
                                        <td class="">{{ $data->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Phone</td>
                                        <td class="">{{ $data->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Country</td>
                                        <td class="">{{ $data->country }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                           
						</div>
					</div>
                    <div class="col-lg-12">
						<div class="bs-component">
						    <h3>Other Information</h3>
						    <table class="table admin-form table-striped dataTable" id="datatable3">
                                <tbody>
                                    <tr>
                                        <td class="">Payment type</td>
                                        <td class="">{{ $data->payment_type ? $data->payment_type : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Paid Status</td>
                                        <td class="">{{ $data->paid_status == 0 ? 'Unpaid' : 'Paid' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Message</td>
                                        <td class="">{{ $data->message }}</td>
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

