
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medical Details</title>
    <!-- Add your styles here if needed -->
</head>
<body>
    <h1>Appointment Details</h1>
    <?php
    $session = session();
    if ($session->has('businessProfileImage')) {
        echo '<img class="img-xs rounded-circle larger-profile-img" style="width: 90px; height: 90px;" src="' . $session->get('businessProfileImage') . '" alt="Profile image">';
    }
    ?>

<?php
        $session = session();
        if ($session->has('businessName') && $session->has('phoneNumber')) {
          echo '<h1 class="welcome-text">Welcome, <span class="text-black fw-bold">' . $session->get('businessName') . '</span></h1>';
          echo '<h3 class="welcome-sub-text">Contact: ' . $session->get('phoneNumber') . '</h3>';
        }
        ?>
       <!-- Example usage of dynamicData variables -->

       <p>Client ID: <?= $data['clientId'] ?></p>
    <p>Appointment ID: <?= $data['appointmentId'] ?></p>

    <?php
    // Access total fee
    echo '<p>Total Fee: ' . $data['fee'] . '</p>';
    ?>

    <?php
    // Access detailsData array
    if (!empty($detailsData)) {
        echo '<h2>Test Details</h2>';
        foreach ($detailsData as $testItem) {
            echo '<p>Test Fee: ' . $testItem['fee'] . '</p>';
        }
    } else {
        echo '<p>No test details available.</p>';
    }
    ?>



    
    <!-- Add other fields as needed -->

</body>
</html>

