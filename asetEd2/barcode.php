<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
            integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous"
            referrerpolicy="no-referrer"></script>
</head>

<body class="body_app">
<nav class="navbar navbar-light bg-light mb-3"></nav>

<style>
    main {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 20px;
    }

    #reader {
        width: 600px;
        border-radius: 30px;
    }

    #result {
        text-align: center;
        font-size: 1.5rem;
    }
</style>

<main>
    <div id="reader" class="rounded"></div>
    <div id="result"></div>
</main>

<script>
const scanner = new Html5QrcodeScanner('reader', {
    qrbox: {
        width: 550,
        height: 350,
    }, 
    fps: 20,
    formatsToSupport: [
    Html5QrcodeSupportedFormats.QR_CODE,
    Html5QrcodeSupportedFormats.CODE_128,
    Html5QrcodeSupportedFormats.CODE_39,
    Html5QrcodeSupportedFormats.UPC_A,
    Html5QrcodeSupportedFormats.UPC_E,
    Html5QrcodeSupportedFormats.EAN_8,
    Html5QrcodeSupportedFormats.EAN_13,
    Html5QrcodeSupportedFormats.CODE_93,
    Html5QrcodeSupportedFormats.ITF,
    Html5QrcodeSupportedFormats.CODABAR,
    Html5QrcodeSupportedFormats.PDF417,
    Html5QrcodeSupportedFormats.DATA_MATRIX,
    Html5QrcodeSupportedFormats.AZTEC,
    Html5QrcodeSupportedFormats.MAXICODE,
    Html5QrcodeSupportedFormats.GS1_DATABAR,
    Html5QrcodeSupportedFormats.MSI,
    Html5QrcodeSupportedFormats.PLESSEY,
    Html5QrcodeSupportedFormats.CODE_11,
    Html5QrcodeSupportedFormats.PHARMACODE,
    Html5QrcodeSupportedFormats.GS1_128
]
,
});

function onScanSuccess(decodedText, decodedResult) {
    console.log(`Code scanned = ${decodedText}`, decodedResult);

    let today = new Date().toISOString().slice(0, 10);
    let time = new Date().toLocaleTimeString();

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'validate_barcode.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
                let no_aset = response.no_aset.replace(/__SLASH__/g, '/');
                window.location.href = `tcpdf/laporanPDF/barcode-tcpdf.php?no_aset=${encodeURIComponent(no_aset)}&barcode=${encodeURIComponent(decodedText)}`;
            } else {
                alert('Barcode not found in the database.');
                window.location.href = 'barcode.php';
            }
        }
    };
    xhr.send(`barcode=${decodedText}`);

    // Display the result in the card
    document.getElementById('result').innerHTML = `
        <div class="card" style="width: 18rem;">
            <img src="barcode-scan.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <form action="../tcpdf/laporanPDF/barcode-tcpdf.php" name="form2" method="post" target="_blank">
                    <p style="font-size: 14px;" class="card-text">Bar Code Read Successfully : <span class="badge bg-primary">${decodedText}</span></p>
                    <p style="font-size: 14px;" class="card-text">Date : <span class="badge bg-primary">${today}</span></p>
                    <p style="font-size: 14px;" class="card-text">Capture Time : <span class="badge bg-primary">${time}</span></p>
                    <input type="hidden" name="number_index" value="${decodedText}" id="result">
                    <input type="hidden" name="time_val" value="${time}" id="capture_time">
                    <input type="hidden" name="date_val" value="${today}" id="capture_date">
                    <button type="submit" name="submit" class="btn btn-outline-primary btn-sm">Validation</button>
                </form>
            </div>
        </div>
    `;

    scanner.clear();
    document.getElementById('reader').remove();
}

function error(err) {
    console.error(err);
}

scanner.render(onScanSuccess, error);
</script>

</body>
</html>
