<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Website Inquiry</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #0b0f19;
            color: #e2e8f0;
            margin: 0;
            padding: 24px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #111827;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        }
        .header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            padding: 24px;
            text-align: center;
        }
        .header h1 {
            color: #ffffff;
            font-size: 20px;
            margin: 0 0 6px 0;
            letter-spacing: 0.5px;
        }
        .header p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 13px;
            margin: 0;
        }
        .content {
            padding: 24px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 10px 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            font-size: 14px;
        }
        .info-table td.label {
            width: 35%;
            color: #94a3b8;
            font-weight: 600;
        }
        .info-table td.value {
            color: #ffffff;
        }
        .info-table td.value a {
            color: #60a5fa;
            text-decoration: none;
        }
        .message-box {
            background: #1e293b;
            border-radius: 8px;
            padding: 16px;
            border-left: 4px solid #2563eb;
            margin-top: 15px;
        }
        .message-box h3 {
            margin: 0 0 8px 0;
            font-size: 14px;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .message-box p {
            margin: 0;
            color: #f1f5f9;
            font-size: 14px;
            line-height: 1.6;
            white-space: pre-wrap;
        }
        .footer {
            padding: 16px 24px;
            background: #0f172a;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            font-size: 12px;
            color: #64748b;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Client Inquiry</h1>
            <p>Received through aise-digital.com</p>
        </div>
        <div class="content">
            <table class="info-table">
                <tr>
                    <td class="label">Full Name</td>
                    <td class="value"><strong>{{ $contactMessage->first_name }} {{ $contactMessage->last_name }}</strong></td>
                </tr>
                <tr>
                    <td class="label">Email Address</td>
                    <td class="value"><a href="mailto:{{ $contactMessage->email }}">{{ $contactMessage->email }}</a></td>
                </tr>
                <tr>
                    <td class="label">Phone Number</td>
                    <td class="value">
                        @if($contactMessage->phone)
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contactMessage->phone) }}">{{ $contactMessage->phone }}</a>
                        @else
                            <span style="color:#64748b;">Not provided</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="label">Company / Brand</td>
                    <td class="value">{{ $contactMessage->company ?: 'Not provided' }}</td>
                </tr>
                <tr>
                    <td class="label">Service of Interest</td>
                    <td class="value"><span style="color:#38bdf8;font-weight:600;">{{ $contactMessage->service_of_interest ?: 'General Inquiry' }}</span></td>
                </tr>
                <tr>
                    <td class="label">Project Budget</td>
                    <td class="value">{{ $contactMessage->budget ?: 'Not specified' }}</td>
                </tr>
                <tr>
                    <td class="label">Received Date</td>
                    <td class="value">{{ $contactMessage->created_at ? $contactMessage->created_at->format('M j, Y - g:i A') : now()->format('M j, Y - g:i A') }}</td>
                </tr>
            </table>

            <div class="message-box">
                <h3>Message Details</h3>
                <p>{{ $contactMessage->message }}</p>
            </div>
        </div>
        <div class="footer">
            Astra Intelligence Services Egypt (AISE) &bull; Hurghada, Red Sea, Egypt
        </div>
    </div>
</body>
</html>
