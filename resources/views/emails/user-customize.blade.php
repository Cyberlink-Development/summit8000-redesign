<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

            <h2>Dear {{ $customize->name }},</h2>

            <p>
                Thank you for submitting your customize trip request for
                <strong>{{ $customize->title }}</strong>.
            </p>

            <p>
                Our team will review your request and contact you shortly.
            </p>

            <p>
                Regards,<br>
                {{ $setting->site_name ?? 'Summit8000' }}
            </p>

        </div>
    </body>
</html>
