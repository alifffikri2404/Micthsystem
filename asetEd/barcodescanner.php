<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="body_app">
<nav class="navbar navbar-light bg-light mb-3"></nav>

<main>
    <div class="container">
        <h2 class="mb-3">Scanner</h2>
        <input type="text" id="barcodeInput" class="form-control" placeholder="Scan barcode here" autofocus>
        <div id="result" class="mt-3"></div>
    </div>
</main>

<script>
    document.getElementById('barcodeInput').addEventListener('input', function() {
        const barcode = this.value.trim();

        if (barcode) {  // Check if barcode is not empty
            let today = new Date().toISOString().slice(0, 10);
            let time = new Date().toLocaleTimeString();

            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'validatebarcodescanner.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        let Full_ID = response.Full_ID.replace(/__SLASH__/g, '/');
                        window.location.href = `pages/forms/signpage.php?Full_ID=${encodeURIComponent(Full_ID)}&barcode=${encodeURIComponent(barcode)}`;
                    } else {
                        alert('Data not found.');
                        window.location.href = 'pages/forms/signpage.php';
                    }
                }
            };
            xhr.send(`barcode=${barcode}`);

            document.getElementById('result').innerHTML = `
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text">Bar Code Read Successfully: <span class="badge bg-primary">${barcode}</span></p>
                        <p class="card-text">Date: <span class="badge bg-primary">${today}</span></p>
                        <p class="card-text">Capture Time: <span class="badge bg-primary">${time}</span></p>
                    </div>
                </div>
            `;

            // Clear the input field for the next scan
            this.value = '';
        }
    });
</script>


</body>
</html>
