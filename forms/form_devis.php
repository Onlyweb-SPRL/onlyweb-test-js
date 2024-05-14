<?php
$lg;

if (isset($_POST['lg'])) {
    $lg = $_POST['lg'];
} else {
    $lg = 'fr';
}

die();

include('../inc/functions_site.php');
include('../inc/config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../inc/PHPMailer/src/Exception.php';
require '../inc/PHPMailer/src/PHPMailer.php';
#require '../inc/PHPMailer/src/SMTP.php';

die();

//START CONTENT
$mail_response;
$calculDevisTotal = '';
if (isset($_POST['calculDevisTotal'])) {
    $calculDevisTotal = $_POST['calculDevisTotal'];
    $calculDevisTotal = strip_tags(str_replace("&nbsp;", " ", $calculDevisTotal));
    $calculDevisTotal = str_replace('[[JUMP]]', '<br>', $calculDevisTotal);
}

// POSTED VALUES
$client_name;
if (isset($_POST['client_name'])) {
    $client_name = stringSanitize($_POST['client_name']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                Nom du client
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                $client_name
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;

}

$client_prenom;
if (isset($_POST['client_prenom'])) {
    $client_prenom = stringSanitize($_POST['client_prenom']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                Prénom du client
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $client_prenom
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;

}
$client_rue;
if (isset($_POST['client_rue'])) {
    $client_rue = stringSanitize($_POST['client_rue']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                Rue
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $client_rue
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;

}
$client_nr;
if (isset($_POST['client_nr'])) {
    $client_nr = stringSanitize($_POST['client_nr']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                N°
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $client_nr
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}
$client_cp;
if (isset($_POST['client_cp'])) {
    $client_cp = stringSanitize($_POST['client_cp']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                Code Postal
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $client_cp
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}
$client_localite;
if (isset($_POST['client_localite'])) {
    $client_localite = stringSanitize($_POST['client_localite']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                Localité
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $client_localite
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}
$client_country;
if (isset($_POST['client_country'])) {
    $client_country = stringSanitize($_POST['client_country']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                Pays
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $client_country
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}
$client_tel;
if (isset($_POST['client_tel'])) {
    $client_tel = stringSanitize($_POST['client_tel']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                Téléphone
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $client_tel
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;

}
$client_mail;
if (isset($_POST['client_mail'])) {
    $client_mail = validateEmail(emailSanitize($_POST['client_mail']));
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                E-mail
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $client_mail
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}


$user_type;
if (isset($_POST['user_type'])) {
    $user_type = stringSanitize($_POST['user_type']);
    switch ($user_type) {
        case 'Particulier':
            # code...

            $mail_response .= <<<EOT
            <tr>
                <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                        width="70" height="30" /></td>
                <td width="200" align="left" style="border:solid 1px #ccc;">
                    <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                        Type de client
                    </p>
                </td>
                <td width="350" align="left" style="border:solid 1px #ccc;">
                    <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                    $user_type
                    </p>
                </td>
                <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                        width="70" height="30" /></td>
            </tr>
EOT;
            break;
        case 'Professionnel':
            $mail_response .= <<<EOT
            <tr>
                <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                        width="70" height="30" /></td>
                <td width="200" align="left" style="border:solid 1px #ccc;">
                    <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                        Type de client
                    </p>
                </td>
                <td width="350" align="left" style="border:solid 1px #ccc;">
                    <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                    $user_type
                    </p>
                </td>
                <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                        width="70" height="30" /></td>
            </tr>
EOT;
            $client_tva;
            if (isset($_POST['client_tva'])) {
                $client_tva = stringSanitize($_POST['client_tva']);
                $mail_response .= <<<EOT
                <tr>
                    <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                            width="70" height="30" /></td>
                    <td width="200" align="left" style="border:solid 1px #ccc;">
                        <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                            N° TVA
                        </p>
                    </td>
                    <td width="350" align="left" style="border:solid 1px #ccc;">
                        <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                        $client_tva
                        </p>
                    </td>
                    <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                            width="70" height="30" /></td>
                </tr>
EOT;

            }
            $client_assujetti;
            if (isset($_POST['client_assujetti'])) {
                $client_assujetti = stringSanitize($_POST['client_assujetti']);
                $mail_response .= <<<EOT
                <tr>
                    <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                            width="70" height="30" /></td>
                    <td width="200" align="left" style="border:solid 1px #ccc;">
                        <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                            Assujetti à la TVA
                        </p>
                    </td>
                    <td width="350" align="left" style="border:solid 1px #ccc;">
                        <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                        $client_assujetti
                        </p>
                    </td>
                    <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                            width="70" height="30" /></td>
                </tr>
EOT;

            }

            break;
    }

}

$contact_nom;
if (isset($_POST['contact_nom'])) {
    $contact_nom = stringSanitize($_POST['contact_nom']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            Personne de contact
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $contact_nom
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}
$controle_date;
if (isset($_POST['controle_date'])) {
    $controle_date = stringSanitize($_POST['controle_date']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            Jour de préférence
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $controle_date
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}
$controle_moment;
if (isset($_POST['controle_moment'])) {
    $controle_moment = stringSanitize($_POST['controle_moment']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            Moment de la journée
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $controle_moment
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}
$devis_comment;
if (isset($_POST['devis_comment'])) {
    $devis_comment = stringSanitize($_POST['devis_comment']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            Remarques
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $devis_comment
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}
$rgpd_check;
if (isset($_POST['rgpd_check'])) {
    $rgpd_check = stringSanitize($_POST['rgpd_check']);
    $mail_response .= <<<EOT
    <tr>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
        <td width="200" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            Accord RGPD
            </p>
        </td>
        <td width="350" align="left" style="border:solid 1px #ccc;">
            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
            $rgpd_check
            </p>
        </td>
        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;" width="70" height="30"  /></td>
    </tr>
EOT;
}

if (!empty($calculDevisTotal)) {
    $mail_response .= <<<EOT
 <tr>
                        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                                width="70" /></td>
                        <td width="200" align="left">
                            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                                Détails de la demande
                            </p>
                        </td>
                        <td width="350" align="left">
                            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                                $calculDevisTotal
                            </p>
                        </td>
                        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                                width="70" /></td>
                    </tr>
EOT;
}

//Recaptcha
$captcha;
if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
}
if (!$captcha) {
    $txt_captcha = quickTranslate("trad_send_msg_captcha", $lg);
    echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>$txt_captcha</div>";
    exit;
}

$ip = $_SERVER['REMOTE_ADDR'];
// post request to server
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) . '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response, true);
// should return JSON with success as true
if ($responseKeys["success"]) {


    $mail_body = <<<EOT
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body bgcolor="#e9e9e9">
    <table cellpadding="0" cellspacing="0" width="100%" style="background-color:#e9e9e9;">
        <tr>
            <td align="center">
                <br>
                <table cellpadding="0" cellspacing="0" width="690" style="background-color:#fff;">
                    <tr>
                        <td align="center">
                            <img src="$project_url/img/mail/logo_top.png" alt="$project_name" style="display: block;" />
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" width="690" style="background-color:#fff;">
                    <tr>
                        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                                width="70" height="30" /></td>
                        <td width="550" align="left">
                            <p
                                style="font-family: Arial, Helvetica, sans-serif; font-size:20px; color:#00c075; font-weight:bold;">
                                Formulaire de devis</p>
                            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                                Bonjour,<br>
                                <br>
                                Une personne vous a envoyé une demande via le formulaire de devis.
                                <br>
                                Voici ses informations:<br>
                            </p>
                        </td>
                        <td width="70"><img src="$project_url/img/mail/blank.png" alt=" " style="display: block;"
                                width="70" height="30" /></td>
                    </tr>
                </table>
                <table cellspacing="0" width="690"   style="background-color:#fff;">

                    $mail_response
                    
                </table>
                <table cellpadding="0" cellspacing="0" width="690" style="background-color:#fff;">
                    <tr>
                        <td align="center">
                            <img src="$project_url/img/mail/logo_bottom.png" alt="$project_name"
                                style="display: block;" />
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" width="690" style="background-color:#fff;">
                    <tr>
                        <td align="center">
                            <p style="font-family: Arial, Helvetica, sans-serif; font-size:14px; color:#313131;">
                            Rue haute Vaulx 12, 4960 Malmedy <br><br>
                                +32 (0)479 39 20 85 | <a href="mailto:info@p-w-b.be"
                                    style="color:#00c075; text-decoration:none;">info@p-w-b.be</a><br><br>
                            </p>
                            <br>
                        </td>
                    </tr>
                </table>
                <br>
            </td>
        </tr>
    </table>
</body>

</html>
EOT;

    $mail = new PHPMailer(true);

    try {
        /*
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.example.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'user@example.com';                     // SMTP username
        $mail->Password   = 'secret';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        */
        //Recipients
        $mail->CharSet = 'UTF-8';
        $mail->setFrom($project_mail_sender, "$client_name $client_prenom");
        $mail->addAddress($project_mail_sender, $project_mail_sender_name);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Formulaire de devis';
        $mail->Body = $mail_body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>$project_mail_success</div>";

        // /fr/merci-pour-votre-message
        header('Location: /fr/merci-pour-votre-message');
        exit;

    } catch (Exception $e) {
        echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }

} else {
    header('Location: /fr/formulaire-de-devis');
    exit;
}
?>
