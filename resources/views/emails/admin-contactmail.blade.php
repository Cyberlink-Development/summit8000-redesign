<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Summit8000</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f8; font-family: Arial, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f6f8; padding:30px 0;">
    <tr>
        <td align="center">

            <!-- Main Container -->
            <table width="650" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:6px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.05);">

                <!-- Header -->
                <tr>
                    <td style="background:#0d6efd; padding:20px; text-align:center;">
                        <img src="{{ asset('theme-assets/logo.svg') }}" width="150" alt="Logo" style="margin-bottom:10px;">
                        <h2 style="color:#ffffff; margin:0;">New Contact Inquiry</h2>
                    </td>
                </tr>

                <!-- Content -->
                <tr>
                    <td style="padding:25px;">

                        <p style="font-size:15px; color:#555;">
                            You have received a new contact inquiry. Details are below:
                        </p>

                        <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse; font-size:14px;">

                            <tr style="background:#f8f9fa;">
                                <td width="35%"><strong>Full Name</strong></td>
                                <td>{{ $name }}</td>
                            </tr>

                            <tr>
                                <td><strong>Email</strong></td>
                                <td>{{ $mail }}</td>
                            </tr>

                            <tr style="background:#f8f9fa;">
                                <td><strong>Phone</strong></td>
                                <td>{{ $contact }}</td>
                            </tr>

                            <tr>
                                <td><strong>Country</strong></td>
                                <td>{{ $country }}</td>
                            </tr>

                            <tr style="background:#f8f9fa;">
                                <td><strong>Message</strong></td>
                                <td>{{ $messages }}</td>
                            </tr>

                        </table>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style="background:#f1f1f1; text-align:center; padding:15px; font-size:12px; color:#777;">
                        © {{ date('Y') }} Summit8000. All rights reserved.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
