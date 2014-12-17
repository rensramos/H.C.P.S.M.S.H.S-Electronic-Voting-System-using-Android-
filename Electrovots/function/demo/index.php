<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Notifications Demo</title>
<link rel="stylesheet" href="../css/notifications.min.css">
</head>
<body>
<button id="showInfo">Show Info Notification</button>
<button id="showError">Show Error Notification</button>
<button id="showWarning">Show Warning Notification</button>
<button id="showSuccess">Show Success Notification</button>

<script src="../javascript/jFlatStyle.min.js"></script>
<script src="../javascript/notifications.min.js"></script> 
<script>
        $('#showError').on('click', function(e) {
            displayNotification('error', 'This is an error notification', 2000);
            e.preventDefault();
        });
        $('#showInfo').on('click', function(e) {
            displayNotification('info', 'This is an info notification', 2000);
            e.preventDefault();
        });
        $('#showSuccess').on('click', function(e) {
            displayNotification('success', 'This is an success notification', 2000);
            e.preventDefault();
        });
        $('#showWarning').on('click', function(e) {
            displayNotification('warning', 'This is an warning notification', 2000);
            e.preventDefault();
        });
        $('#showNothing').on('click', function(e) {
            displayNotification('unknown', 'This is an unknown notification', 2000);
            e.preventDefault();
        });
    </script> 

</body>
</html>