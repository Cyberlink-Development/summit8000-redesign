<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trip Recommendation</title>
</head>
<body style="margin:0; padding:0; font-family: Arial, sans-serif; background-color:#f4f6f8;">

<table width="100%" cellpadding="0" cellspacing="0" style="padding:30px 0;">
<tr>
<td align="center">

<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 4px 12px rgba(0,0,0,0.05);">

    <!-- Header -->
    <tr>
        <td style="background:#0f3e5e; padding:20px; text-align:center; color:#ffffff;">
            <img src="{{ asset('theme-assets/logo.svg') }}" style="width: 150px;" alt="Summit8000" />
        </td>
    </tr>

    <!-- Body -->
    <tr>
        <td style="padding:30px; color:#333333;">

            <h3 style="margin-top:0;">Hello 👋</h3>

            <p>
                <strong>{{ $data->name }}</strong> thought you might be interested in this amazing adventure:
            </p>

            <h2 style="color:#0f3e5e; margin-bottom:10px;">
                {{ $data->title }}
            </h2>

            @if($data->comments)
                <p style="background:#f9fafb; padding:15px; border-left:4px solid #0f3e5e; border-radius:6px;">
                    <strong>Message from {{ $data->name }}:</strong><br>
                    {{ $data->comments }}
                </p>
            @endif

            <p>
                This journey offers breathtaking landscapes, unforgettable experiences,
                and the adventure of a lifetime in the Himalayas.
            </p>

            <!-- CTA Button -->
            <div style="text-align:center; margin:30px 0;">
                <a href="{{ url('page/' . tripurl($trip->uri)) }}"
                   style="background:#0f3e5e; color:#ffffff; padding:12px 25px; text-decoration:none; border-radius:5px; display:inline-block;" target="_blank">
                    View Trip Details
                </a>
            </div>

            <p>
                If this adventure excites you, feel free to reach out to us for more details
                or start planning your journey today.
            </p>

            <p style="margin-top:30px;">
                Warm regards,<br>
                <strong>The Summit 8000 Team</strong>
            </p>

        </td>
    </tr>

    <!-- Footer -->
    <tr>
        <td style="background:#f4f6f8; padding:20px; text-align:center; font-size:12px; color:#777;">
            © {{ date('Y') }} Summit 8000. All rights reserved.
        </td>
    </tr>

</table>

</td>
</tr>
</table>

</body>
</html>
