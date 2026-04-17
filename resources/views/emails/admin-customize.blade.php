<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>{{ $setting->site_name ?? 'Summit8000' }}</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background: #f5f5f5;
            text-align: left;
        }
    </style>
</head>

    <body style="font-family: sans-serif; background:#f9f9f9;">
        <div style="margin:0 auto; max-width:700px; background:#fff; padding:20px;">

            <div style="text-align:center; margin-bottom:20px;">
                <img src="{{ asset('theme-assets/logo.svg') }}" style="width: 150px;" />
            </div>

            <h3 style="margin-bottom:15px;">New Customize Trip Request</h3>

            <table>
                <tr>
                    <th width="40%">Full Name</th>
                    <td>{{ $customize->name }}</td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td>{{ $customize->email }}</td>
                </tr>

                <tr>
                    <th>Phone</th>
                    <td>{{ $customize->phone }}</td>
                </tr>

                <tr>
                    <th>Number of People</th>
                    <td>{{ $customize->no_of_people }}</td>
                </tr>

                <tr>
                    <th>Trip Name</th>
                    <td>{{ $customize->title  }}</td>
                </tr>
                <tr>
                    <th>Trip Start Date</th>
                    <td>{{ $customize->trip_start_date  }}</td>
                </tr>
                <tr>
                    <th>Trip End Date</th>
                    <td>{{ $customize->trip_end_date  }}</td>
                </tr>

                <tr>
                    <th>Message</th>
                    <td>{{ $customize->comments }}</td>
                </tr>
            </table>

        </div>
    </body>
</html>
