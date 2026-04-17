<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{$setting->site_name}}</title>
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
            <img src="{{ asset('theme-assets/images/logo.png') }}" style="width: 25%"/>
        </div>
    </blockquote>
    <h3>Customize Trip / User Details:</h3>
    <table>

        <tr>
            <td bgcolor="#ddd"  ><strong>Full Name</strong></td>
            <td bgcolor="#ddd" >{{ $name }}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $mail }}</td>
        </tr>
        <tr>
            <td><strong>Phone </strong></td>
            <td>{{ $contact }}</td>
   
        <tr> 
            <td><strong>Number of People</strong></td>
            <td>{{ $num_ppl }}</td>
        </tr>
        <tr>
            <td><strong>Trip Name</strong></td>
            <td>{{tripdetail($trip_id)->trip_title}}</td>
        </tr>
    
        <tr>
            <td><strong> Trip Start Date </strong></td>
            <td>{{ $date }}</td>
        </tr>
        <tr>
            <td><strong> Client Country </strong></td>
            <td>{{ $country }}</td>
        </tr>
        <tr>
            <td><strong>Message</strong></td>
            <td>{!! $messages  !!}</td>
        </tr>
    </table>


</div>
</body>
</html>
