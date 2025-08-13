<!-- resources/views/emails/promotional.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .content {
            padding: 20px 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ config('app.name') }}</h2>
    </div>
    
    <div class="content">
        @if($recipientName)
            <p>Halo {{ $recipientName }},</p>
        @else
            <p>Halo,</p>
        @endif
        
        {!! nl2br(e($content)) !!}
    </div>
    
    <div class="footer">
        <p>
            Email ini dikirim oleh {{ config('app.name') }}<br>
            <a href="#unsubscribe">Unsubscribe</a> dari mailing list
        </p>
    </div>
</body>
</html>