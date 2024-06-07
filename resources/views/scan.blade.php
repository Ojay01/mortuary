@extends('layouts.admin')
@section('title', 'Scanner')
@section('content')
    <script src="https://unpkg.com/html5-qrcode/html5-qrcode.min.js"></script>
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">QR Code /</span> Scanner
        </h4>
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div id="reader-container">
                            <div id="reader" style="width: 100%; height: auto;"></div>
                            <div id="message" class="alert alert-success mt-3" style="display: none;">Scan successful! Redirecting...</div>
                        </div>
                        <div id="pc-message" class="alert alert-warning mt-3" style="display: none;">
                            Please use a mobile device to scan the QR code.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</div>

<script>
    // Function to detect if the device is a mobile device
    function isMobileDevice() {
        return /Mobi|Android/i.test(navigator.userAgent);
    }

    window.onload = function() {
        if (isMobileDevice()) {
            // Initialize the QR code scanner if on a mobile device
            let html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", { fps: 10, qrbox: 250 }
            );

            function onScanSuccess(decodedText, decodedResult) {
                console.log(`Code matched = ${decodedText}`, decodedResult);
                // Stop the scanner
                html5QrcodeScanner.clear().then(() => {
                    console.log("QR Code scanning stopped.");

                    // Show flash message
                    document.getElementById('message').style.display = 'block';

                    // Redirect after a short delay
                    setTimeout(() => {
                        window.location.href = `/corpse/${decodedText}/profile`;
                    }, 2000); // 2 seconds delay
                }).catch(err => {
                    console.error("Failed to clear QR Code scanner.", err);
                });
            }

            function onScanFailure(error) {
                console.warn(`Code scan error = ${error}`);
            }

            // Render the QR code scanner
            html5QrcodeScanner.render(onScanSuccess, onScanFailure);
        } else {
            // Show message if on a PC
            document.getElementById('reader-container').style.display = 'none';
            document.getElementById('pc-message').style.display = 'block';
        }
    };
</script>
@endsection
