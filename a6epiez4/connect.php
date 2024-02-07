<?php

require 'header.php';

$url = $_SERVER['REDIRECT_URL'];

?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>
        <?php echo htmlspecialchars($business_name); ?> WiFi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="../assets/styles/bulma.min.css" />
    <link rel="stylesheet" href="../vendor/fortawesome/font-awesome/css/all.css" />
    <link rel="stylesheet" href="../assets/styles/style.css" />
    <meta http-equiv="refresh" content="5;url=<?php echo htmlspecialchars($url); ?>" />
</head>

<body>
<div class="container h-100">
    <div class="login-container">
        <section>
            <figure class="image is-256x256 pluto-logo">
                <img src="../assets/images/logo.png">
            </figure>
        </section>
        <section>
            <p class="has-text-centered">Please wait, you are being connected</p>
        </section>
    </div>
</div>
</body>

</html>