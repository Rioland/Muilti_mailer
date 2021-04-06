<?php
session_start();
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$getin = htmlentities($_POST['remail']);
$all_recivers = explode(",", $getin);
$lent = sizeof($all_recivers);

$snderemail = htmlentities($_POST['senderemail']);
$sendername = htmlentities($_POST['sendername']);

$replytoEmail = htmlentities($_POST['rtemail']);
$sub = $_POST['sub'];

$message = $_POST['msg'];
$ishtml = $_POST['ishtml'];

$move_on = false;
$allsent = false;
if (isset($_FILES['file']['name'][0]) and !empty($_FILES['file']['name'][0])) {
    print($_FILES['file']['name'][0]);
    // echo "set";
    $arrarang = reArray($_FILES['file']);
    for ($i = 0; $i < count($arrarang); $i++) {
        if ($arrarang[$i]['error']) {
            $_SESSION["state"] = $arrarang[$i]['name'] . " has error " . $arrarang[$i]['error'];

            // break;
            header("location:index.php");
            die();
        } else {
            $allowedExtensions = array("pdf", "doc", "docx", "jpg","gif", "png", "jpeg", "zip", "apk", "txt");
            $ext = explode(".", $arrarang[$i]['name']);
            $ext = end($ext);
            if (!in_array($ext, $allowedExtensions)) {
                $_SESSION["state"] = $ext . " not allow";
                // break;

                header("location:index.php");
                die();

            } else {
                // move_uploaded_file($arrarang[$i]['tmp_name'], "attach/" . $arrarang[$i]['name']);

                $move_on = true;
            }

        }

    }

    for ($i = 0; $i < $lent; $i++) {
        $receiverEmail = $all_recivers[$i];
        send("ashleyreneemiller55@gmail.com", "office2021", $snderemail, $sendername, $receiverEmail, $replytoEmail, $sub, $message, $ishtml);

    }

    header("location:index.php");

} else {

    for ($i = 0; $i < $lent; $i++) {
        $receiverEmail = $all_recivers[$i];
        send2("ashleyreneemiller55@gmail.com", "office2021", $snderemail, $sendername, $receiverEmail, $replytoEmail, $sub, $message, $ishtml);

    }

    header("location:index.php");

}

function send($authEmail, $authPassword, $fromEmail, $fromName, $to, $replyto, $sub, $message, $ishtml)
{

    if (class_exists("PHPMailer/src/Exception.php")) {
        require 'PHPMailer/src/Exception.php';
    }
    if (class_exists("PHPMailer/src/PHPMailer.php")) {
        require 'PHPMailer/src/PHPMailer.php';
    }
    if (class_exists("PHPMailer/src/SMTP.php")) {
        require 'PHPMailer/src/SMTP.php';

    }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = $authEmail; //SMTP username
        $mail->Password = $authPassword; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($to); //Add a recipient
        // $mail->addAddress('gmail'); //Name is optional
        $mail->addReplyTo($replyto, 'Information');
        if (isset($_FILES)) {
            $arrarang = reArray($_FILES['file']);
            for ($i = 0; $i < count($arrarang); $i++) {

                move_uploaded_file($arrarang[$i]['tmp_name'], "attach/" . $arrarang[$i]['name']);
                $mail->addAttachment("attach", $arrarang[$i]['name']);

            }
        }

        //Content
        if ($ishtml == "ishtml") {
            $mail->isHTML(true);

        } else {
            $mail->isHTML(false);

        }

        //Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if ($mail->send()) {
            // global $allsent;
            // $allsent = true;
            $_SESSION["state"] = "Message has been sent";
            // echo 'Message has been sent ';
        }
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->getMessage}";
    }

}

function send2($authEmail, $authPassword, $fromEmail, $fromName, $to, $replyto, $sub, $message, $ishtml)
{

    if (class_exists("PHPMailer/src/Exception.php")) {
        require 'PHPMailer/src/Exception.php';
    }
    if (class_exists("PHPMailer/src/PHPMailer.php")) {
        require 'PHPMailer/src/PHPMailer.php';
    }
    if (class_exists("PHPMailer/src/SMTP.php")) {
        require 'PHPMailer/src/SMTP.php';

    }

    $mail = new PHPMailer(true);
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = $authEmail; //SMTP username
        $mail->Password = $authPassword; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 587; //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($to); //Add a recipient
        // $mail->addAddress('gmail'); //Name is optional
        $mail->addReplyTo($replyto, 'Information');

        //Content
        if ($ishtml == "ishtml") {
            $mail->isHTML(true);

        } else {
            $mail->isHTML(false);

        }

        //Set email format to HTML
        $mail->Subject = $sub;
        $mail->Body = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if ($mail->send()) {
            // global $allsent;
            // $allsent = true;
            $_SESSION["state"] = "Message has been sent";

            // echo 'Message has been sent ';
        }
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->getMessage}";
    }

}

function pre_r($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function reArray($postArray)
{
    $file_ary = array();
    $array_count = count($postArray['name']);
    $file_key = array_keys($postArray);
    for ($i = 0; $i < $array_count; $i++) {
        foreach ($file_key as $key) {
            $file_ary[$i][$key] = $postArray[$key][$i];
        }
    }
    return $file_ary;

}