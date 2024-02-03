<!DOCTYPE html>
<html>
<!-- <html lang="ar"> for arabic only -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Express Wash Customer Invoice</title>
    <style>
        @media print {
            @page {
                margin: 0 auto;
                sheet-size: 300px 250mm;
            }

            html {
                direction: rtl;
            }

            html,
            body {
                font-size: 12px;
                margin: 0;
                padding: 0
            }

            #printContainer {
                font-size: 12px;
                width: 250px;
                margin: auto;
                /*padding: 10px;*/
                /*border: 2px dotted #000;*/
                text-align: justify;
            }

            /*span {
                display: inline-block;
                min-width: 350px;
                white-space: nowrap;
                background: red;
            }*/

            .text-center {
                text-align: center;
            }
        }
    </style>
</head>

<body onload="window.print();">
    <h1 id="logo" class="text-center" style="margin-top: 5px; margin-bottom: 5px;">
        <?php
        $session = session();
        if ($session->has('businessProfileImage')) {
            echo '<img class="img-xs rounded-circle larger-profile-img" style="width: 120px; height: 120px; margin-top: 10px; margin-bottom: 10px;" src="' . $session->get('businessProfileImage') . '" alt="Profile image">';
        } else {
            // Default image or alternative content if the session variable is not set
            echo '<img style="width: 120px; height: 120px; margin-top: 5px; margin-bottom: 5px;" src="' . base_url() . './public/assets/images/regexbyte.png" alt="Default Logo">';
        }
        ?>
    </h1>


    <div id='printContainer'>

        <?php
        $session = session();
        if ($session->has('businessName') && $session->has('phoneNumber') && $session->has('business_address')) {
            echo '<h2 id="slogan" style="margin: 0; font-size: 12px;" class="text-center"><span class="text-black fw-bold" style="font-weight: bold;">' . $session->get('businessName') . '</span></h2>';

            echo '<p id="slogan" class="text-center" style="margin: 0; font-size: 12px;"><span class="text-black fw-bold" style="font-weight: normal;">' . $session->get('phoneNumber') . '</span></p>';
            echo '<p id="slogan" class="text-center" style="margin: 0; font-size: 12px;"><span class="text-black fw-bold" style="font-weight: normal;">' . $session->get('business_address') . '</span></p>';

            echo '<br>';
        }
        ?>





        <table>


            <tr>
                <td style="width: 50%;">Invoice# <b>59867</b> </td>
                <td style="width: 50%; text-align: right;">Date:<b><?= $appointmentDate; ?></b></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left; margin-right: 5px;">Time:<b><?= $appointmentTime; ?></b><br></td>
            </tr>

            <tr>
                <td colspan="2"></td>
            </tr>

            <tr>

                <td style=" width: 50%; white-space: nowrap;">Client:<b><?= $clientName; ?></b></td>
            </tr>

            <tr>

                <td style=" width: 50%; white-space: nowrap;">Doctor:<b><?= $doctorName; ?></b></td>
            </tr>

        </table>
        <!-- <p class="text-center"><img src="<?= base_url() ?>global/site/qr.png" alt="QR-code" class="left" /></p> -->
        <hr>

        <table>
            <tr>
                <td><b>Appointment</b></td>
                <td style="padding-left: 100px;"><b>Price</b></td>
            </tr>

            <tr>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td style="margin-left: 20px;"><?= $appointmentTypeName; ?></td>
                <td style="padding-left:100px"><?= $appointmentFee; ?>.00</td>
            </tr>

            <!-- <tr>
            <td> eco badge for waterless car washThe service at Detailing Knights is not only unmatched, it is also mobile, waterless and environmentally friendly. </td>
            <td></td>
        </tr> -->
        </table>
        <hr>
        <table style="width: 100%;">
            <tr>
                <td style="width: 50%; text-align: left;">&nbsp;</td>

                <td style="width: 25%; text-align:  right; padding-right:10px" colspan="2"><b>Total</b> PKR:<?= $appointmentFee; ?>.00</td>
            </tr>

            </tr>


        </table>
        <br>


        <div style="text-align:center">
            <a  style="text-decoration:none" href="www.regexbyte.com">www.regexbyte.com</a>
        </div>


    </div>
</body>

</html>





<?php /*
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointment Details</title>
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
        <p>Client Name: <?= $clientName; ?></p>
        <p>Doctor Name: <?= $doctorName; ?></p>
    <p>appointmentType: <?=$appointmentTypeName; ?></p>
    <p>appointment Fee: <?=  $appointmentFee; ?></p>
    <p>Appointment Date: <?= $appointmentDate; ?></p>
    <p>Appointment Time: <?= $appointmentTime; ?></p>
    
    <!-- Add other fields as needed -->

</body>
</html>
*/ ?>