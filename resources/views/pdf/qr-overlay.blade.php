<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
        }
        .pdf-container {
            position: relative;
            width: 100%;
            height: 100vh;
        }
        .pdf-embed {
            width: 100%;
            height: 100%;
        }
        .qr-code {
            position: absolute;
            bottom: 20mm;
            right: 20mm;
            width: 30mm;
            height: 30mm;
        }
    </style>
</head>
<body>
    <div class="pdf-container">
        <!-- Original PDF -->
        <embed class="pdf-embed" src="data:application/pdf;base64,{{ $pdfData }}" type="application/pdf">
        <!-- QR Code Overlay -->
        <img class="qr-code" src="data:image/svg+xml;base64,{{ $qrData }}">
    </div>
</body>
</html>
