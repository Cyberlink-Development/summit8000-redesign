<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>One Himalaya Ltd</title>
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
            <img src="{{  asset('theme-assets/images/logo.png') }}" style="width: 25%"/>
        </div>
    </blockquote>
    <h3>Category Inquiry Details:</h3>
    <table>

        <tr>
            <td bgcolor="#ddd"  ><strong>Full Name</strong></td>  
            <td bgcolor="#ddd" >{{ $full_name }}</td>
        </tr>
        @if($trip_name != null)
        <tr>
            <td><strong>Trip Name</strong></td>
            <td>{{ $trip_name }}</td>
        </tr>
        @endif
        @if($title != null)
        <tr>
            <td><strong>Activity Name</strong></td>
            <td>{{ $title }}</td>
        </tr>
        @endif
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $mail }}</td>
        </tr>
        <tr>
            <td><strong>Phone </strong></td>
            <td>{{ $contact }}</td>
        </tr>
        <tr>
            <td><strong>Country</strong></td>
            <td>{{ $country }}</td>
        </tr>
        @if($start_date != null)
        <tr>
            <td><strong>Trip Start Date</strong></td>
            <td>{{ $start_date }}</td>
        </tr>
        @endif
        @if($num_ppl != null)
        <tr>
            <td><strong>Total Number Of Peoples</strong></td>
            <td>{{ $num_ppl }}</td>
        </tr>
        @endif
        @if($duration != null)
        <tr>
            <td><strong>Duration</strong></td>
            <td>{{ $duration }}@if($duration == 1) Day @else Days @endif</td>
        </tr>
        @endif
        @if($destination != null)
        <tr>
            <td><strong>Destination</strong></td>
            <td>{{ $destination }}</td>
        </tr>
        @endif
        <tr>
            <td><strong>Message</strong></td>
            <td>{!! $messages  !!}</td>
        </tr>
    </table>


</div>
</body>
</html>
