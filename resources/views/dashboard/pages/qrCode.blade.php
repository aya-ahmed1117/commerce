<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QRCODE</title>
</head>
<body>

    <input id="text" type="text" hidden value="{{ $blah_blah }}">
    {{-- <div id="qrcode"></div> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script type="text/javascript">
        const qrcode = document.getElementById("qrcode");
        const textInput = document.getElementById("text");

        const qr = new QRCode(qrcode);

        textInput.oninput = (e) => {
            qr.makeCode(e.target.value.trim());
        };

        qr.makeCode(textInput.value.trim());
    </script>
</html>
