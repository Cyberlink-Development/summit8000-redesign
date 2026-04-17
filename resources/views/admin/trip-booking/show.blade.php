@extends('admin.master')
@section('breadcrumb')
 <a href="{{ route('trip-booking') }}" class="btn btn-primary btn-sm">Go Back</a>
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
                                    <td class="">{{ $book->title }}</td>
                                </tr>
                                <tr>
                                    <td class="">Trip Starts</td>
                                    <td class="">{{ $book->trip_start_date }} </td>
                                </tr>
                                <tr>
                                    <td class="">Trip Ends</td>
                                    <td class="">{{ $book->trip_end_date }} </td>
                                </tr>
                                <tr>
                                    <td class="">Trip Days</td>
                                    <td class="">{{ $book->trip_days }} </td>
                                </tr>
                                <tr>
                                    <td class="">Num of people</td>
                                    <td class="">{{ $book->total_travellers }} </td>
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
                                    <td class="">{{ $book->full_name }}</td>
                                </tr>
                                <tr>
                                    <td class="">Gender</td>
                                    <td class="">{{ $book->gender }}</td>
                                </tr>
                                <tr>
                                    <td class="">D.O.B</td>
                                    <td class="">{{ $book->dob }}</td>
                                </tr>
                                <tr>
                                    <td class="">Nationality</td>
                                    <td class="">{{ $book->nationality }}</td>
                                </tr>
                                <tr>
                                    <td class="">Passport No.</td>
                                    <td class="">{{ $book->passport_number }}</td>
                                </tr>
                                <tr>
                                    <td class="">Passport Exp.</td>
                                    <td class="">{{ $book->passport_expire }}</td>
                                </tr>
                                </tbody>
                            </table>
                            
                           
						</div>
					</div>
                    <div class="col-lg-12">
						<div class="bs-component">
						    <h3>Contact Information</h3>
						    <table class="table admin-form table-striped dataTable" id="datatable3">
                                <tbody>
                                    <tr>
                                        <td class="">Email</td>
                                        <td class="">{{ $book->email }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Phone</td>
                                        <td class="">{{ $book->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Country</td>
                                        <td class="">{{ $book->country }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Address</td>
                                        <td class="">{{ $book->address }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Zip/Postal.</td>
                                        <td class="">{{ $book->zip }}</td>
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
                                        <td class="">Tshirt Size</td>
                                        <td class="">{{ $book->tshirt_size ? $book->tshirt_size : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Medication</td>
                                        <td class="">{{ $book->medication ? $book->medication : ''}}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Restrictions</td>
                                        <td class="">{{ $book->restrictions ? $book->restrictions : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Heard From</td>
                                        <td class="">{{ $book->hear ? $book->hear : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Payment type</td>
                                        <td class="">{{ $book->payment_type ? $book->payment_type : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Paid Status</td>
                                        <td class="">{{ $book->paid_status == 0 ? 'Unpaid' : 'Paid' }}</td>
                                    </tr>
                                </tbody>
                            </table>
						</div>
					</div>
                    <div class="col-lg-12">
						<div class="bs-component">
						    <h3>Insurance Information</h3>
						    <table class="table admin-form table-striped dataTable" id="datatable3">
                                <tbody>
                                    <tr>
                                        <td class="">Compnay Name</td>
                                        <td class="">{{ $book->insurance->insurance_company ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Phone</td>
                                        <td class="">{{ $book->insurance->insurance_phone ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Policy No.</td>
                                        <td class="">{{ $book->insurance->policy_no ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
						</div>
					</div>
                    <div class="col-lg-12">
						<div class="bs-component">
						    <h3>Flight Information</h3>
						    <table class="table admin-form table-striped dataTable" id="datatable3">
                                <tbody>
                                    <h5>Arrival Information</h5>
                                    <tr>
                                        <td class="">Airline Name</td>
                                        <td class="">{{ $book->flight->airline_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">No.</td>
                                        <td class="">{{ $book->flight->airline_no ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">From</td>
                                        <td class="">{{ $book->flight->arrival_from ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Date</td>
                                        <td class="">{{ $book->flight->arrival_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Time</td>
                                        <td class="">{{ $book->flight->arrival_time ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
						    <table class="table admin-form table-striped dataTable" id="datatable3">
                                <tbody>
                                <h5>Depature Information</h5>
                                    <tr>
                                        <td class="">Airline Name</td>
                                        <td class="">{{ $book->flight->departure_airline_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">No.</td>
                                        <td class="">{{ $book->flight->departure_airline_no ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">From</td>
                                        <td class="">{{ $book->flight->departure_from ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Date</td>
                                        <td class="">{{ $book->flight->departure_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Time</td>
                                        <td class="">{{ $book->flight->departure_time ?? '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
						</div>
					</div>
                    <div class="col-lg-12">
						<div class="bs-component">
						    <h3>Emergency Information</h3>
						    <table class="table admin-form table-striped dataTable" id="datatable3">
                                <tbody>
                                    <tr>
                                        <td class="">Full Name</td>
                                        <td class="">{{ $book->emergency->emergency_fullname ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Relation</td>
                                        <td class="">{{ $book->emergency->emergency_relation ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Phone</td>
                                        <td class="">{{ $book->emergency->emergency_phone_no ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Email</td>
                                        <td class="">{{ $book->emergency->emergency_email ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Address</td>
                                        <td class="">{{ $book->emergency->emergency_address ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Zip/Postal</td>
                                        <td class="">{{ $book->emergency->emergency_zip ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="">Country</td>
                                        <td class="">{{ $book->emergency->emergency_country ?? '' }}</td>
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

