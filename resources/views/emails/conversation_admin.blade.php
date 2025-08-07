<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Conversation Request - Codevelop</title>
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
            font-size: 22px;
        }
        .email-body {
            padding: 30px;
        }
        .email-body p {
            font-size: 15px;
            line-height: 1.6;
            margin: 10px 0;
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
            padding: 18px;
            font-size: 13px;
            color: #999;
        }
        .highlight {
            font-weight: bold;
            color: #444;
        }
    </style>
</head>
<body>

<div class="email-wrapper">
    <div class="email-header">
        <h1>New Conversation Request</h1>
    </div>
    <div class="email-body">
        <p><strong>Name:</strong> {{ $conversation->first_name }} {{ $conversation->last_name }}</p>
        <p><strong>Email:</strong> {{ $conversation->email }}</p>
        <p><strong>Organization:</strong> {{ $conversation->organization ?? 'N/A' }}</p>
        <p><strong>Message:</strong></p>
        <blockquote>{{ $conversation->message }}</blockquote>

        <p class="highlight">Please respond to the customer at your earliest convenience.</p>
    </div>
    <div class="email-footer">
        &copy; {{ now()->year }} Codevelop Admin Panel. All rights reserved.
    </div>
</div>

</body>
</html>
