@extends('admin.master')

@section('breadcrumb')
<a href="{{ route('trip-booking') }}" class="btn btn-primary btn-sm">
    Go Back
</a>
@endsection

@section('content')

<div class="col-md-8">

    <div class="panel">
        <div class="panel-body">

            {{-- Trip Information --}}
            <div class="col-lg-12">
                <div class="bs-component">

                    <h3>Trip Information</h3>

                    <table class="table admin-form table-striped">

                        <tbody>

                            <tr>
                                <td>Trip Name</td>
                                <td>{{ $book->title }}</td>
                            </tr>

                            <tr>
                                <td>Total Travelers</td>
                                <td>{{ $book->total_travellers }}</td>
                            </tr>

                            <tr>
                                <td>Price</td>
                                <td>${{ $book->price ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Payment Status</td>
                                <td>
                                    {{ $book->paid_status == 1 ? 'Paid' : 'Unpaid' }}
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>
            </div>

            {{-- Lead Traveler --}}
            <div class="col-lg-12">

                <div class="bs-component">

                    <h3>Lead Traveler Information</h3>

                    <table class="table admin-form table-striped">

                        <tbody>

                            <tr>
                                <td>Full Name</td>
                                <td>{{ $book->full_name }}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>{{ $book->email }}</td>
                            </tr>

                            <tr>
                                <td>Phone</td>
                                <td>{{ $book->phone }}</td>
                            </tr>

                            <tr>
                                <td>Gender</td>
                                <td>{{ $book->gender }}</td>
                            </tr>

                            <tr>
                                <td>Date of Birth</td>
                                <td>{{ $book->dob }}</td>
                            </tr>

                            <tr>
                                <td>Nationality</td>
                                <td>{{ $book->nationality }}</td>
                            </tr>

                            <tr>
                                <td>Country</td>
                                <td>{{ $book->country }}</td>
                            </tr>

                            <tr>
                                <td>Passport Number</td>
                                <td>{{ $book->passport_number }}</td>
                            </tr>

                            <tr>
                                <td>Heard From</td>
                                <td>{{ $book->hear ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Message</td>
                                <td>{{ $book->message ?? '-' }}</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Additional Travelers --}}
            @if($book->travelers->count())

            <div class="col-lg-12">

                <div class="bs-component">

                    <h3>Additional Travelers</h3>

                    @foreach($book->travelers as $key => $traveler)

                        <div class="panel panel-default" style="margin-bottom:20px; border:1px solid #ddd;">

                            <div class="panel-heading" style="padding:10px 15px; background:#f5f5f5; font-weight:bold;">

                                Traveler #{{ $key + 1 }}

                            </div>

                            <div class="panel-body" style="padding:0;">

                                <table class="table admin-form table-striped" style="margin-bottom:0;">

                                    <tbody>

                                        <tr>
                                            <td width="30%">Full Name</td>
                                            <td>{{ $traveler->full_name }}</td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $traveler->email }}</td>
                                        </tr>

                                        <tr>
                                            <td>Gender</td>
                                            <td>{{ $traveler->gender }}</td>
                                        </tr>

                                        <tr>
                                            <td>Nationality</td>
                                            <td>{{ $traveler->nationality }}</td>
                                        </tr>

                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>{{ $traveler->dob }}</td>
                                        </tr>

                                        <tr>
                                            <td>Mobile</td>
                                            <td>{{ $traveler->mobile }}</td>
                                        </tr>

                                        <tr>
                                            <td>Passport Number</td>
                                            <td>{{ $traveler->passport_no }}</td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

            @endif

            {{-- Flight Information --}}
            <div class="col-lg-12">

                <div class="bs-component">

                    <h3>Flight Information</h3>

                    <table class="table admin-form table-striped">

                        <tbody>

                            <tr>
                                <td width="30%">Flight Status</td>
                                <td>{{ $book->flight_status ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Arrival Date</td>
                                <td>{{ $book->arrival_date ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Arrival Flight Number</td>
                                <td>{{ $book->arrival_flight_number ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Airport Pickup</td>
                                <td>{{ $book->pickup ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Departure Date</td>
                                <td>{{ $book->departure_date ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Departure Flight Number</td>
                                <td>{{ $book->departure_flight_number ?? '-' }}</td>
                            </tr>

                            <tr>
                                <td>Airport Dropoff</td>
                                <td>{{ $book->dropoff ?? '-' }}</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Insurance Information --}}
            <div class="col-lg-12">

                <div class="bs-component">

                    <h3>Insurance Information</h3>

                    <table class="table admin-form table-striped">

                        <tbody>

                            <tr>
                                <td width="30%">Insurance</td>
                                <td>{{ $book->insurance ?? '-' }}</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

            {{-- Terms --}}
            <div class="col-lg-12">

                <div class="bs-component">

                    <h3>Terms & Conditions</h3>

                    <table class="table admin-form table-striped">

                        <tbody>

                            <tr>
                                <td width="30%">Accepted Terms</td>

                                <td>
                                    {{ $book->agree_terms == 1 ? 'Yes' : 'No' }}
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection
