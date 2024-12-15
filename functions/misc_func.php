<?php
// require("../vendor/autoload.php");

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function genHid($prefix)
{
    # code...
    return uniqid($prefix) . date('syimhd');
}

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function passwordHash($value)
{
    return md5(sha1(sha1(sha1($value))));
}

function generateOtp($length = 6)
{
    $char = '0123456789';
    $charLen = strlen($char);
    $otp = '';
    for ($i = 0; $i < $length; $i++) {
        # code...
        $otp .= $char[rand(0, $charLen - 1)];
    }
    return $otp;
}

// function sendOtp($otp, $email)
// {

//     $config = new MailSlurp\Configuration;
//     $config->setApiKey('x-api-key', '83f26fe3b20959fd872bc6a55d35b10561524a1535459d27703d54ded3573743');

//     $inbox_controller = new MailSlurp\Apis\InboxControllerApi(null, $config);
//     $inbox_options = new MailSlurp\Models\CreateInboxDto();
//     $inbox_options->setInboxType('SMTP_INBOX');
//     $inbox_options->setName("OTP Validation");
//     $inbox = $inbox_controller->createInboxWithOptions($inbox_options);
//     $access_details = $inbox_controller->getImapSmtpAccess($inbox->getId());

//     // echo "\nMy email address = " . $inbox->getEmailAddress();
//     // echo "\nMy server host = " . $inbox->getName();

//     // Create an instance; passing `true` enables exceptions
//     $mail = new PHPMailer(true);

//     // Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//     $mail->isSMTP();
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//     $mail->Host       = $access_details->getSecureSmtpServerHost();
//     $mail->Username   = $access_details->getSecureSmtpUsername();
//     $mail->Password   = $access_details->getSecureSmtpPassword();
//     $mail->Port       = $access_details->getSecureSmtpServerPort();
//     $mail->SMTPAuth   = true;

//     $mail->SMTPOptions = array(
//         'ssl' => array(
//             'verify_peer' => false,
//             'verify_peer_name' => false,
//             'allow_self_signed' => true
//         )
//     );


//     // Recipients
//     $mail->setFrom($inbox->getEmailAddress(),);
//     $mail->addAddress($email, 'Test');

//     // Content
//     $mail->isHTML(true);
//     $mail->Subject = 'OTP Validation';
//     $mail->Body    = 'Dear new User, You OTP is ' . $otp;
//     $mail->AltBody = 'Dear new User, You OTP is ' . $otp;

//     if ($mail->send()) {
//         return true;
//     } else {
//         return false;
//     }
// }
