<?php

require 'header.php';

$_SESSION["id"] = $_GET['id'];
$_SESSION["ap"] = $_GET['ap'];

if (isset($_POST['connect'])) {
    $mac = $_SESSION["id"];
    $apmac = $_SESSION["ap"];
    $url = $_SERVER['REDIRECT_URL'];

    $controlleruser = $_SERVER['CONTROLLER_USER'];
    $controllerpassword = $_SERVER['CONTROLLER_PASSWORD'];
    $controllerurl = $_SERVER['CONTROLLER_URL'];
    $controllerversion = $_SERVER['CONTROLLER_VERSION'];
    $duration = $_SERVER['DURATION'];
    $debug = false;
    $site_id = $_SERVER['SITE_ID'];

    $unifi_connection = new UniFi_API\Client($controlleruser, $controllerpassword, $controllerurl, $site_id, $controllerversion);
    $set_debug_mode = $unifi_connection->set_debug($debug);
    $loginresults = $unifi_connection->login();

    $auth_result = $unifi_connection->authorize_guest($mac, $duration, null, null, null, $apmac);

    header("Location: $url");
}

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
</head>

<body>
    <div class="container">
        <main>
            <div class="is-flex-direction-column is-justify-content-space-evenly full-height">
                <section>
                    <figure class="image is-square">
                        <img src="../assets/images/logo.png">
                    </figure>
                </section>
                <section>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <p class="has-text-centered">Enjoy free WiFi</p>
                        <br>
                        <div class="buttons is-centered">
                            <input class="button is-dark is-responsive is-fullwidth" type="submit" name="connect" value="Login">
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </div>
</body>

</html>