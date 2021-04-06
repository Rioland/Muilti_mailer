<?php
session_start();
if (empty($_SESSION["password"])) {
    header("location:loginpage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Send BULK E-Mail </title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    * {
        box-sizing: border-box;
        height: auto;
    }

    .filemi {
        width: 60%;
    }

    .bbb:hover {
        color: red;
        font-size: x-large;
    }

    .pro {
        min-height: 697px;
    }
    </style>
    <script src="jq.js"></script>
</head>

<body class="w3-content">
    <br>
    <div class="w3-row">
        <!-- First Container -->
        <div class="w3-half w3-container w3-light-grey w3-padding">
            <div class="rightside">
                <fieldset>
                    <h2 class="w3-center" style="text-shadow:1px 1px 0 #444">Send Mail</h2>

                    <!-- This is the form  -->
                    <form method="post" action="./mailcollector.php" enctype="multipart/form-data">

                        <!-- --- This is sender's Email --- --      -->
                        <div class="w3-row w3-padding">
                            <div class="w3-third">
                                <p style="margin: auto; margin-top:10px;"> Sender's Email: </p>
                            </div>
                            <div class="w3-twothird">
                                <input required class="w3-input w3-border w3-animate-input w3-hover-border-blue"
                                    type="text" style="width:50%; vertical-align:super;" id="senderemail"
                                    name="senderemail" placeholder="Enter sender's email">
                            </div>
                        </div>

                        <!-- -- - this is sender's name --- -  -->
                        <div class="w3-row w3-padding">
                            <div class="w3-third">
                                <p style="margin: auto; margin-top:10px;"> Sender's Name: </p>
                            </div>
                            <div class="w3-twothird">
                                <input required class="w3-input w3-border w3-animate-input w3-hover-border-blue"
                                    type="text" style="width:50%; vertical-align:super;" id="sendername"
                                    name="sendername"
                                    placeholder="Sender's fullname with no space use underscore(_) instead">
                            </div>
                        </div>

                        <!-- This is input for the bulk email Recipient's Emails -->
                        <div class="w3-row w3-padding">
                            <div class="w3-third">
                                <p style="margin: auto; text-align:justify"> Recipient's Email(s):</p>
                            </div>
                            <div class="w3-twothird">
                                <input class="w3-input w3-border w3-animate-input w3-hover-border-blue" type="text"
                                    style="width:50%" id="remail" name="remail"
                                    placeholder="please seperate each email with comma (',') and no space in between">
                            </div>
                        </div>

                        <!-- *REPLY TO* can also be Sender's Email  -->
                        <div class="w3-row w3-padding">
                            <div class="w3-third">
                                <p style="margin: auto; margin-top:10px;"> REPLY-TO: </p>
                            </div>
                            <div class=" w3-twothird">
                                <input class="w3-input w3-border w3-animate-input w3-hover-border-blue" type="text"
                                    style="width:50%" id="rtemail" name="rtemail"
                                    placeholder="enter email you want recipient to reply to">
                            </div>
                        </div>

                        <!-- -- This is Subject of the Email --  -->
                        <div class="w3-row w3-padding">
                            <div class="w3-third">
                                <p style="margin: auto; margin-top:10px;"> Subject: </p>
                            </div>
                            <div class=" w3-twothird">
                                <input required class="w3-input w3-border w3-animate-input w3-hover-border-blue"
                                    type="text" style="width:50%" id="sub" name="sub" placeholder="Subject">
                            </div>

                        </div>

                        <!-- --- This the Message Letter (e-mail) -- -->
                        <div class="w3-row w3-padding">
                            <div class="w3-third">
                                <p style="margin: auto; margin-top:10px;"> Message: </p>
                            </div>
                            <div class=" w3-twothird">
                                <textarea autofocus class="w3-input w3-border w3-animate-input w3-hover-border-blue"
                                    id="msg" name="msg" placeholder="Please write e-mail message here"
                                    style="width:60%"></textarea>
                            </div>
                            <label> Message Type: </label>
                            <input type="radio" id="ishtml" checked name="ishtml" value="isplain">
                            <label>Plaintext</label>
                            <input type="radio" id="ishtml" name="ishtml" value="ishtml"> <label>isHTML</label>


                        </div>

                        <!-- -- This is a multiple file collector input --   -->
                        <div class="w3-row w3-padding">
                            <div class="w3-third">
                                <p style="margin: auto; text-align:justify; ">Attachment (Multiple Available): </p>
                            </div>
                            <div class=" w3-twothird">
                                <input type="file" name="file[]" id="file"
                                    class="w3-input w3-border w3-animate-input w3-hover-border-blue filemi" type="text"
                                    placeholder="email" multiple>
                            </div>
                        </div>
                        <br>

                        <!-- -- Submit Button --  -->
                        <center>
                            <button class="w3-btn w3-round-large w3-light-green" type="submit" id="send"
                                style="width: 60%; height:auto; margin:auto; font-size: xlarger; ">
                                Send Mail<b class="bbb"> &#128640; </b>
                            </button>
                        </center>
                    </form>
                </fieldset>
                <br>

                <!-- -- Mailer 2 referral link --- -->
                <label> For mailer two(II) </label>
                <a href="leafmailer2.8.php"> check here </a>
                <br>
                <input type="hidden" id="err" value="<?php
if (!empty($_SESSION['state'])) {
    echo (trim($_SESSION['state']));
}?>">
            </div>
        </div>

        <!-- Second Container -->
        <div class="w3-half w3-container w3-light-blue w3-padding pro">
            <div>
                <h1> THIS IS THE FIRST MAILER </h1>
            </div>

            <div class="w3-container w3-center">
                <h3>Current Profile</h3>
                <img src="img/avatar1.jpg" alt="Avatar" style="width:80%">
                <h5>Mr. Bash</h5>

                <div class="w3-section">
                    <!-- <button class="w3-button w3-green" id="login">LOG IN</button> -->
                    <a href="logout.php"> <button class="w3-button w3-red">LOG OUT</button> </a>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        if ($("#err").val().trim().length > 0) {
            alert($("#err").val().trim());
            <?php $_SESSION['state'] = '';?>
            $("#err").val("");
        }

        $("form").submit(function(e) {
            var senderEmail = $("#senderemail").val();
            var sendername = $("#sendername").val();
            // var senderEmail = $("#email").val();
            var receiverEmail = $("#remail").val();
            var replytoEmail = $("#rtemail").val();
            var sub = $("#sub").val();
            var message = $("#msg").val();
            var ishtml = $("#ishtml").val();
            var file = $("#file").val();

            if (senderEmail.length > 0 && sendername.length > 0 && receiverEmail.length > 0 &&
                replytoEmail.length > 0 && sub.length > 0 && message.length > 0) {
                $("#send").hide();
                return true;

            } else {
                alert("All fields are required");

                e.preventDefault();

            }
        })
    });
    </script>
    <script src="./myjavacode.js"></script>
</body>

</html>