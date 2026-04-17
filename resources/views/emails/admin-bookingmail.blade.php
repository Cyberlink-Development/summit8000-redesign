<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Summit Solution</title>
        <style>
            table {
                border-collapse: collapse;
                width:100%;
            }
            table, th, td {
                border: 1px solid #ddd;
                padding:8px;
            }
        </style>
    </head>
    <body style="font-family: sans-serif">
        <div style="margin:0 auto; max-width:700px; width:100%;">
            <blockquote>
                <div style="background:#FFF; padding:8px 0px; margin-bottom:5px;">
                    <img src="{{asset('theme-assets/img/logo-dark.png')}}" style="width: 25%"/>
                </div>
            </blockquote>
            @if($request->trip_name)
                <h3>Trip Information</h3>
            @endif
            @if($request->training_title)
                <h3>Training Information</h3>
            @endif
            @if($request->activity_type=="package")
                <h3>Training Package Details</h3>
            @endif
            <table class="">
                <tbody>
                    @if($request->trip)
                        <tr>
                            <td class=""> Trip Name</td>
                            <td class="">{{ tripname($request->trip )}}</td>
                        </tr>
                    @endif
                    @if($request->training_title)
                        <tr>
                            <td class=""> Training Name</td>
                            <td class="">{{ $training_title }}</td>
                        </tr>
                    @endif
                    @if($request->trip_name)
                        <tr>
                            <td class=""> Trip Name</td>
                            <td class="">{{ $trip_name }}</td>
                        </tr>
                    @endif
                    @if($request->trip_start_date)
                        <tr>
                            <td class="">Trip Starts</td>
                            <td class="">{{ $request->trip_start_date }} </td>
                        </tr>
                    @endif
                    @if($request->start_date)
                        <tr>
                            <td class="">Trip Starts</td>
                            <td class="">{{ $request->start_date }} </td>
                        </tr>
                    @endif
                    @if($request->trip_end_date)
                        <tr>
                            <td class="">Trip Ends</td>
                            <td class="">{{ $request->trip_end_date }} </td>
                        </tr>
                    @endif
                    @if($request->end_date)
                        <tr>
                            <td class="">Trip Ends</td>
                            <td class="">{{ $request->end_date }} </td>
                        </tr>
                    @endif
                    @if($request->trip_days)
                        <tr>
                            <td class="">Trip Days</td>
                            <td class="">{{ $request->trip_days }} </td>
                        </tr>
                    @endif
                    @if($request->total_travellers)
                        <tr>
                            <td class="">Num of people</td>
                            <td class="">{{ $request->total_travellers }} </td>
                        </tr>
                    @endif
                    @if($request->peoples)
                        <tr>
                            <td class="">Num of people</td>
                            <td class="">{{ $request->peoples }} </td>
                        </tr>
                    @endif
                     @if($request->price)
                        <tr>
                            <td class="">Price</td>
                            <td class="">{{ $request->price }} </td>
                        </tr>
                    @endif
                </tbody>
            </table>
                
            <h3>Personal Information</h3>
            <table class="">
                <tbody>
                @if($request->name)
                    <tr>
                        <td class="">Name</td>
                        <td class="">{{ $request->name }}</td>
                    </tr>
                @endif
                @if($request->first_name || $request->last_name)
                    <tr>
                        <td class="">Name</td>
                        <td class="">{{ $request->first_name }} {{ $request->last_name }}</td>
                    </tr>
                @endif
                @if($request->gender)
                    <tr>
                        <td class="">Gender</td>
                        <td class="">{{ $request->gender }}</td>
                    </tr>
                @endif
                @if($request->dob)
                    <tr>
                        <td class="">D.O.B</td>
                        <td class="">{{ $request->dob }}</td>
                    </tr>
                @endif
                @if($request->nationality)
                    <tr>
                        <td class="">Nationality</td>
                        <td class="">{{ $request->nationality }}</td>
                    </tr>
                @endif
                @if($request->passport_number)
                    <tr>
                        <td class="">Passport No.</td>
                        <td class="">{{ $request->passport_number }}</td>
                    </tr>
                @endif
                @if($request->passport_expire)
                    <tr>
                        <td class="">Passport Exp.</td>
                        <td class="">{{ $request->passport_expire }}</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <h3>Contact Information</h3>
            <table class="table admin-form table-striped dataTable" id="datatable3">
                <tbody>
                    @if($request->email)
                        <tr>
                            <td class="">Email</td>
                            <td class="">{{ $request->email }}</td>
                        </tr>
                    @endif
                    @if($request->contact)
                        <tr>
                            <td class="">Contact</td>
                            <td class="">{{ $request->contact }}</td>
                        </tr>
                    @endif
                    @if($request->country)
                        <tr>
                            <td class="">Country</td>
                            <td class="">{{ $request->country }}</td>
                        </tr>
                    @endif
                    @if($request->address)
                        <tr>
                            <td class="">Address</td>
                            <td class="">{{ $request->address }}</td>
                        </tr>
                    @endif
                    @if($request->zip)
                        <tr>
                            <td class="">Zip/Postal.</td>
                            <td class="">{{ $request->zip }}</td>
                        </tr>
                    @endif
                    @if($request->message)
                        <tr>
                            <td class="">Message</td>
                            <td class="">{{ $request->message }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{--<h3>Medication and Restrictions</h3>
            <table class="table admin-form table-striped dataTable" id="datatable3">
                <tbody>
                    <tr>
                        <td class="">Medication</td>
                        <td class="">{{ $request->medication ? $request->medication : ''}}</td>
                    </tr>
                    <tr>
                        <td class="">Restrictions</td>
                        <td class="">{{ $request->restrictions ? $request->restrictions : '' }}</td>
                    </tr>
                </tbody>
            </table>--}}
        </div>
    </body>
</html>
