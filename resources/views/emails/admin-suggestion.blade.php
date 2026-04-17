<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tell a Friend</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color:#f4f6f8;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 0;">
<tr>
<td align="center">

<table width="650" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.05);">

    <!-- Header -->
    <tr>
        <td style="background:#0f3e5e; padding:20px; text-align:center; color:#ffffff;">
            <img src="{{ asset('theme-assets/logo.svg') }}" style="width: 150px;" alt="Summit8000" />
            <h2 style="margin:0;">Tell a Friend Request Submitted</h2>
            <p style="margin:5px 0 0; font-size:14px;">
                {{ date('F j, Y') }}
            </p>
        </td>
    </tr>

    <!-- Body -->
    <tr>
        <td style="padding:30px; color:#333333;">

            <h3 style="margin-top:0;">Trip Information</h3>

            <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse: collapse;">

                <tr style="background:#f9fafb;">
                    <td width="30%"><strong>Trip Name:</strong></td>
                    <td>{{ $data->title }}</td>
                </tr>

                <tr>
                    <td><strong>Sender Name:</strong></td>
                    <td>{{ $data->name }}</td>
                </tr>

                <tr style="background:#f9fafb;">
                    <td><strong>Sender Email:</strong></td>
                    <td>{{ $data->email }}</td>
                </tr>

                <tr>
                    <td><strong>Friend Email:</strong></td>
                    <td>{{ $data->femail }}</td>
                </tr>

                <!-- <tr style="background:#f9fafb;">
                    <td><strong>Phone:</strong></td>
                    <td>{{ $data->phone }}</td>
                </tr> -->

                @if(!empty($data->comments))
                <tr>
                    <td valign="top"><strong>Message:</strong></td>
                    <td>{{ $data->comments }}</td>
                </tr>
                @endif

            </table>

            <!--<div style="margin-top:30px; padding:15px; background:#eef2f7; border-radius:6px;">-->
            <!--    <strong>Action Required:</strong><br>-->
            <!--    You may follow up with the sender or track this referral activity from the admin panel.-->
            <!--</div>-->

        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="background:#f4f6f8; padding:20px; text-align:center; font-size:12px; color:#777;">
            © {{ date('Y') }} {{ $setting->site_name ?? 'Your Company' }} <br>
        </td>
    </tr>

</table>

</td>
</tr>
</table>

</body>
</html>
