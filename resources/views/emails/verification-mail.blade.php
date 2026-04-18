<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #0b3a67;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            margin: -20px -20px 20px -20px;
        }
        .header img {
            max-width: 150px;
            margin-bottom: 10px;
        }
        .content {
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            background-color: #ed1c24;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
            font-weight: bold;
        }
        .button:hover {
            background-color: #c41820;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
        .welcome-box {
            background-color: #f9f9f9;
            border-left: 4px solid #0b3a67;
            padding: 15px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="margin: 0; font-size: 28px;">Welcome to TC Affiliates</h1>
        </div>

        <div class="content">
            <h2 style="color: #0b3a67;">Hello {{ $user->firstname }},</h2>

            <p>Thank you for registering with TC Affiliates! We're excited to have you join our community.</p>

            <div class="welcome-box">
                <strong>Account Details:</strong><br>
                Email: {{ $user->email }}<br>
                Name: {{ $user->firstname }} {{ $user->surname }}<br>
                Referral Code: {{ $user->referral_code }}
            </div>

            <p>To complete your registration and activate your account, please verify your email address by clicking the button below:</p>

            <div style="text-align: center;">
                <a href="{{ $verificationUrl }}" class="button">Verify Email Address</a>
            </div>

            <p style="color: #666; font-size: 13px;">
                If the button above doesn't work, copy and paste this link into your browser:<br>
                <code style="background-color: #f0f0f0; padding: 2px 6px;">{{ $verificationUrl }}</code>
            </p>

            <p>This verification link will expire in 24 hours.</p>

            <p>Once you've verified your email, you'll be able to:</p>
            <ul>
                <li>Access your affiliate dashboard</li>
                <li>Create and manage your referral links</li>
                <li>Track your earnings and referrals</li>
                <li>Request withdrawals</li>
            </ul>

            <p>If you didn't create this account, please ignore this email.</p>

            <p>
                Best regards,<br>
                <strong>The TC Affiliates Team</strong><br>
                <em>Empowering Minds. Achieving Excellence.</em>
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ now()->year }} TC Affiliates. All rights reserved.</p>
            <p>This is an automated message, please do not reply directly to this email.</p>
        </div>
    </div>
</body>
</html>
