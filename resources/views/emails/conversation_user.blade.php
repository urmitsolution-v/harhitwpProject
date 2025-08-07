<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You - Codevelop</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f6f6f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        .email-wrapper {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .email-header {
            background-color: #e9e2da;
            padding: 20px;
            text-align: center;
        }
        .email-header h1 {
            margin: 0;
            color: #2f2f2f;
            font-size: 24px;
        }
        .email-body {
            padding: 30px;
        }
        .email-body p {
            font-size: 16px;
            line-height: 1.6;
            margin: 15px 0;
        }
        .email-body blockquote {
            margin: 20px 0;
            padding: 15px 20px;
            background-color: #f0ede9;
            border-left: 4px solid #e9e2da;
            font-style: italic;
            color: #555;
        }
        .email-footer {
            background-color: #fafafa;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #999;
        }
        .brand {
            font-weight: bold;
            color: #444;
        }
    </style>
</head>
<body>

<div class="email-wrapper">
    <div class="email-header">
        <h1>Thank You for Contacting Codevelop</h1>
    </div>
    <div class="email-body">
        <p>Dear {{ $conversation->first_name }},</p>

        <p>We appreciate you reaching out to <span class="brand">Codevelop</span>. Your message has been received, and a member of our team will review it and respond shortly.</p>

        <p><strong>Your Message:</strong></p>
        <blockquote>{{ $conversation->message }}</blockquote>

        <p>If you have any urgent concerns, feel free to reply to this email.</p>

        <p>Warm regards,<br>
        <strong>The Codevelop Team</strong></p>
    </div>
    <div class="email-footer">
        &copy; {{ now()->year }} Codevelop. All rights reserved.<br>
        Made with ❤️ for innovators.
    </div>
</div>

</body>
</html>
