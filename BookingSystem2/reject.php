<!DOCTYPE html>
<html>
<head>
    <title>Reject Button Popup</title>
    <style>
        /* Style for the popup/modal */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 9999;
        }
    </style>
</head>
<body>

<!-- Your form with the reject button -->


<!-- Popup/modal for entering reasons -->
<div id="popup" class="popup">
    <h2>Reason for Rejection</h2>
    <textarea id="reasonInput" rows="4" cols="50"></textarea><br><br>
    <button onclick="submitReason()">Submit</button>
</div>

<script>
    // Get the reject button and the popup
    var rejectButton = document.getElementById("rejectButton");
    var popup = document.getElementById("popup");

    // When the reject button is clicked, display the popup
    rejectButton.onclick = function() {
        popup.style.display = "block";
    }

    // Function to submit the reason
    function submitReason() {
        var reason = document.getElementById("reasonInput").value;
        if(reason.trim() !== "") {
            // If the reason is not empty, you can proceed with your submission logic
            // For example, you can send an AJAX request to submit the reason
            // Here, I'm just hiding the popup for demonstration purposes
            popup.style.display = "none";
            alert("Reason submitted: " + reason); // You can replace this with your logic
        } else {
            alert("Please enter a reason for rejection.");
        }
    }
</script>

</body>
</html>
