<?php include 'config.php' ?>


<?php


date_default_timezone_set("Asia/Kolkata");

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require('mailer/PHPMailer.php');
require('mailer/Exception.php');
require('mailer/SMTP.php');








if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if(!empty($_POST['emailfo']))
    {



    $_SESSION['emailfo'] = $_POST["emailfo"];

    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if (!preg_match($pattern, $_POST["emailfo"])) {
        $flag = 0;
    } else {
        $flag = 1;
    }

    if ($flag == 1) {


        $query = mysqli_query($conn, "SELECT * FROM reg WHERE email='" . $_POST['emailfo'] . "'");
        //$run=mysqli_query($conn,$sql) ;
        $numrows = mysqli_num_rows($query);


        if ($numrows != 0) {





            $email = $_POST['emailfo'];

            $otp = rand(100000, 999999);





            $mail = new PHPMailer(true);


            try {






                //Server settings

                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'omniiyu2022@gmail.com';
                $mail->Password   = 'nsumutuneupwee';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;



                //Recipients
                $mail->setFrom('omniiyu2022@gmail.com', 'Verification-OmniFood');
                $mail->addAddress($email);     //Add a recipient

                $mail->isHTML(true);

                $mail->Subject = 'forgot-password-Verification';
                $mail->Body    = '<head>
                <title></title>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                <meta content="width=device-width, initial-scale=1.0" name="viewport" />
                <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
                <!--[if !mso]><!-->
                <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css" />
                <!--<![endif]-->
                <style>
                    * {
                        box-sizing: border-box;
                    }
                
                    body {
                        margin: 0;
                        padding: 0;
                    }
                
                    a[x-apple-data-detectors] {
                        color: inherit !important;
                        text-decoration: inherit !important;
                    }
                
                    #MessageViewBody a {
                        color: inherit;
                        text-decoration: none;
                    }
                
                    p {
                        line-height: inherit
                    }
                
                    .desktop_hide,
                    .desktop_hide table {
                        mso-hide: all;
                        display: none;
                        max-height: 0px;
                        overflow: hidden;
                    }
                
                    @media (max-width:670px) {
                
                        .desktop_hide table.icons-inner,
                        .social_block.desktop_hide .social-table {
                            display: inline-block !important;
                        }
                
                        .icons-inner {
                            text-align: center;
                        }
                
                        .icons-inner td {
                            margin: 0 auto;
                        }
                
                        .image_block img.big,
                        .row-content {
                            width: 100% !important;
                        }
                
                        .mobile_hide {
                            display: none;
                        }
                
                        .stack .column {
                            width: 100%;
                            display: block;
                        }
                
                        .mobile_hide {
                            min-height: 0;
                            max-height: 0;
                            max-width: 0;
                            overflow: hidden;
                            font-size: 0px;
                        }
                
                        .desktop_hide,
                        .desktop_hide table {
                            display: table !important;
                            max-height: none !important;
                        }
                    }
                </style>
                </head>
                
                <body style="background-color: #F5F5F5; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
                            role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                              <tr>
                                <td>
                                  <table align="center" border="0" cellpadding="0" cellspacing="0"
                                    class="row-content stack" role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;"
                                    width="650">
                                    <tbody>
                                      <tr>
                                        <td class="column column-1"
                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                          width="100%">
                                          <div class="spacer_block"
                                            style="height:30px;line-height:30px;font-size:1px;"> </div>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
                            role="presentation" style="mso-table-lspace: 0pt;  background-color: #F5F5F5;  mso-table-rspace: 0pt;" width="100%">
                            <tbody>
                              <tr>
                                <td>
                                  <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content"
                                    role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;  background-color: #D6E7F0; color: #333; width: 650px;"
                                    width="650">
                                    <tbody>
                                      <tr>
                                        <td class="column column-1"
                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 25px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                          width="50%">
                                          <table border="0" cellpadding="0" cellspacing="0"
                                            class="image_block block-2" role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                            width="100%">
                                            <tr>
                                              <td class="pad"
                                                style="width:100%;  background-color: #D6E7F0; padding-right:0px;padding-left:0px;padding-top:25px;padding-bottom:25px; ">
                                                <div align="left" class="alignment"
                                                  style="line-height:10px"><img alt="Image"
                                                    src="https://www.clipartmax.com/png/full/189-1899898_apple-logo-modern-icon-apple-icon.png"
                                                    style="display: block; height: auto; border: 0; width: 65px; max-width: 100%;"
                                                    title="Image" width="65" /></div>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                        <td class="column column-2"
                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-right: 25px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                          width="50%">
                                          <table border="0" cellpadding="0" cellspacing="0"
                                            class="empty_block block-2" role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                            width="100%">
                                            <tr>
                                              <td class="pad"
                                                style="padding-right:0px;padding-bottom:25px;padding-left:0px;padding-top:25px;">
                                                <div></div>
                                              </td>
                                            </tr>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                
                <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #F5F5F5;" width="100%">
                    <tbody>
                        <tr>
                            <td>
                                
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3"
                                    role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #D6E7F0; color: #000000; width: 650px;"
                                                    width="650">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-left: 25px; padding-right: 25px; vertical-align: top; padding-top: 5px; padding-bottom: 60px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="image_block block-1" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="padding-top:45px;width:100%;padding-right:0px;padding-left:0px;">
                                                                            <div align="center" class="alignment"
                                                                                style="line-height:10px"><img alt="Image"
                                                                                    class="big" src="https://d2v1hpltdjq1rf.cloudfront.net/static/account/assets/images/ic-forgot.png"
                                                                                    style="display: block; height: auto; border: 0; width: 540px; max-width: 100%;"
                                                                                    title="Image" width="540" /></div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="text_block block-2" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="padding-left:15px;padding-right:10px;padding-top:20px;">
                                                                            <div style="font-family: sans-serif">
                                                                                <div class=""
                                                                                    style="font-size: 12px; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 18px; color: #052d3d; line-height: 1.5;">
                                                                                    <p
                                                                                        style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 75px;">
                                                                                        <span style="font-size:50px;"><strong><span
                                                                                                    style="font-size:50px;"><span
                                                                                                        style="font-size:38px;">Your
                                                                                                        OTP For forgot password
                                                                                                        Is:</span></span></strong></span>
                                                                                    </p>
                                                                                    <p
                                                                                        style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 51px;">
                                                                                        <span style="font-size:34px;"><strong><span
                                                                                                    style="font-size:34px;"><span
                                                                                                        style="color:#2190e3;font-size:34px;"></span>'.$otp.'</strong></span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table border="0" cellpadding="10" cellspacing="0"
                                                                    class="text_block block-3" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad">
                                                                            <div style="font-family: sans-serif">
                                                                                <div class=""
                                                                                    style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                                    <p
                                                                                        style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 16.8px;">
                                                                                        <span style="font-size:16px;"><strong></p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="button_block block-4" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;text-align:center;">
                                                                            <div align="center" class="alignment">
                                                                                <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:52px;width:212px;v-text-anchor:middle;" arcsize="29%" stroke="false" fillcolor="#fc7318"><w:anchorlock/><v:textbox inset="0px,0px,0px,0px"><center style="color:#ffffff; font-family:Tahoma, Verdana, sans-serif; font-size:16px"><![endif]--><a
                                                                                    href="#"
                                                                                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#fc7318;border-radius:15px;width:auto;border-top:0px solid transparent;font-weight:400;border-right:0px solid transparent;border-bottom:0px solid transparent;border-left:0px solid transparent;padding-top:10px;padding-bottom:10px;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;"
                                                                                    target="_blank"><span
                                                                                        style="padding-left:40px;padding-right:40px;font-size:16px;display:inline-block;letter-spacing:normal;"><span
                                                                                            dir="ltr"
                                                                                            style="word-break: break-word; line-height: 32px;"><strong>START
                                                                                                SHOPPING</strong></span></span></a>
                                                                                <!--[if mso]></center></v:textbox></v:roundrect><![endif]-->
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-4"
                                    role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;"
                                                    width="650">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 20px; padding-bottom: 60px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="100%">
                                                                <table border="0" cellpadding="10" cellspacing="0"
                                                                    class="social_block block-1" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad">
                                                                            <div class="alignment" style="text-align:center;">
                                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                                    class="social-table" role="presentation"
                                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block;"
                                                                                    width="188px">
                                                                                    <tr>
                                                                                        <td style="padding:0 15px 0 0px;"><a
                                                                                                href="https://www.facebook.com/"
                                                                                                target="_blank"><img alt="Facebook"
                                                                                                    height="32"
                                                                                                    src="https://cdn.freebiesupply.com/logos/large/2x/facebook-3-logo-png-transparent.png"
                                                                                                    style="display: block; height: auto; border: 0;"
                                                                                                    title="Facebook"
                                                                                                    width="32" /></a></td>
                                                                                        <td style="padding:0 15px 0 0px;"><a
                                                                                                href="https://twitter.com/"
                                                                                                target="_blank"><img alt="Twitter"
                                                                                                    height="32"
                                                                                                    src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-logo-vector-png-clipart-1.png"
                                                                                                    style="display: block; height: auto; border: 0;"
                                                                                                    title="Twitter"
                                                                                                    width="32" /></a></td>
                                                                                        <td style="padding:0 15px 0 0px;"><a
                                                                                                href="https://instagram.com/"
                                                                                                target="_blank"><img alt="Instagram"
                                                                                                    height="32"
                                                                                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Instagram_logo_2016.svg/2048px-Instagram_logo_2016.svg.png"
                                                                                                    style="display: block; height: auto; border: 0;"
                                                                                                    title="Instagram"
                                                                                                    width="32" /></a></td>
                                                                                        <td style="padding:0 15px 0 0px;"><a
                                                                                                href="https://www.youtube.com/"
                                                                                                target="_blank"><img alt="YouTube"
                                                                                                    height="32"
                                                                                                    src="https://www.freeiconspng.com/thumbs/youtube-logo-png/hd-youtube-logo-png-transparent-background-20.png"
                                                                                                    style="display: block; height: auto; border: 0;"
                                                                                                    title="YouTube"
                                                                                                    width="32" /></a></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table border="0" cellpadding="10" cellspacing="0"
                                                                    class="text_block block-2" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad">
                                                                            <div style="font-family: sans-serif">
                                                                                <div class=""
                                                                                    style="font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                                    <p
                                                                                        style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">
                                                                                        NetShop - Lorem ipsum dolor sit amet
                                                                                        hasellus sagittis aliquam luctus. </p>
                                                                                    <p
                                                                                        style="margin: 0; font-size: 14px; text-align: center; mso-line-height-alt: 21px;">
                                                                                        329 California St, San Francisco, CA 94118
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table border="0" cellpadding="10" cellspacing="0"
                                                                    class="divider_block block-3" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad">
                                                                            <div align="center" class="alignment">
                                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                                    role="presentation"
                                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                                    width="60%">
                                                                                    <tr>
                                                                                        <td class="divider_inner"
                                                                                            style="font-size: 1px; line-height: 1px; border-top: 1px dotted #C4C4C4;">
                                                                                            <span> </span></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                <table border="0" cellpadding="10" cellspacing="0"
                                                                    class="text_block block-4" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad">
                                                                            <div style="font-family: sans-serif">
                                                                                <div class=""
                                                                                    style="font-size: 12px; mso-line-height-alt: 14.399999999999999px; color: #4F4F4F; line-height: 1.2; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif;">
                                                                                    <p
                                                                                        style="margin: 0; font-size: 12px; text-align: center; mso-line-height-alt: 14.399999999999999px;">
                                                                                        <span style="font-size:14px;"><a href="#"
                                                                                                rel="noopener"
                                                                                                style="text-decoration: none; color: #2190E3;"
                                                                                                target="_blank"><strong>Help&
                                                                                                    FAQ'.'s</strong></a> |  <strong><a
                                                                                                    href="#" rel="noopener"
                                                                                                    style="text-decoration: none; color: #2190E3;"
                                                                                                    target="_blank">Returns</a> </strong>
                                                                                            |  <span
                                                                                                style="background-color:transparent;font-size:14px;">1-998-9283-19832</span></span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-5"
                                    role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                    class="row-content stack" role="presentation"
                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 650px;"
                                                    width="650">
                                                    <tbody>
                                                        <tr>
                                                            <td class="column column-1"
                                                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                                                width="100%">
                                                                <table border="0" cellpadding="0" cellspacing="0"
                                                                    class="icons_block block-1" role="presentation"
                                                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                    width="100%">
                                                                    <tr>
                                                                        <td class="pad"
                                                                            style="vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
                                                                            <table cellpadding="0" cellspacing="0"
                                                                                role="presentation"
                                                                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                                width="100%">
                                                                                
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table><!-- End -->
                </body>
                
                
                
                </html>';

                $mail->MsgHTML = (file_get_contents('otp.php'));



                $mail->send();

                $sql = "INSERT INTO otps(otp)VALUES ('$otp')";
                $run = mysqli_query($conn, $sql);

                header("location:otpforget.php");
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        } else {

            $emailisuse = 1;
            
        }
    } else {

        $validinfo = 1;
    }

    }
    else
    {
        $allfill=1;
    }

}




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../friuts/home-img/Apple-Logo-Modern-Icon.png">
    <link rel="stylesheet" href="forgetpass.css">
    <link rel="stylesheet" href="signup.css">
    <title>email</title>

    <style>
        .input1:focus {
            outline: none;
        }

        .icon {
            width: 100%;
            height: 7rem;
            color: white;
        }


        .popup1 {
            width: 360px;
            background-color: white;
            border-radius: 13px;
            border: none;

            position: absolute;
            top: 0%;
            left: 50%;
            transform: translate(-50%, -50%)scale(0.1);
            display: flex;
            flex-direction: column;

            box-shadow: 2px 2px 40px rgb(0 0 0 / 19%);
            align-items: center;
            height: 27rem;
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;


        }


        .open-popup {
            visibility: visible;
            top: 50%;
            transform: translate(-50%, -50%)scale(1);




        }



        .errorimg {

            background-color: #e03131;
            border-top-left-radius: 13px;
            border-top-right-radius: 13px;
            width: 100%;
            height: 8.5rem;
            display: flex;
            justify-content: center;
            align-items: center;


        }

        .decerror {
            margin-bottom: 3rem;

        }

        .otpsub {
            margin-top: 1.5rem;
        }

        .maindec {
            margin-top: 1rem;
        }

        .input {
            border-color: black;
        }

        .succse {

            border-color: green;
        }

        .error {

            border-color: #e03131;
        }

        .notic{
            margin-bottom: 1rem;
            margin-top: -1rem;
            color: red;
            
        }
      
    </style>
</head>

<body>




    <section class="main-login" id="blur">

        <div class="grid-containerf1">
            <div class="grid-2">
                <div class="grid-left">

                    <img src="../friuts/home-img/orange.jpg" class="log-img">

                </div>
                <div class="grid-right">
                    <form class="form-login" name="form1" method="POST">
                        <h2>recover your password</h2>

                        <div class="in-flex">
                            <label>Email</label>
                            <input type="email" placeholder="Enter Email Address" class="input" id="input"  onkeyup="emaildemo(document.form1.emailfo)" name="emailfo">
                        </div>
                        <p class="notic" id="noticemail"></p>


                        <div class="in-flex cheak">
                            <div class="cheak-flex">

                            </div>


                        </div>

                        <button type="submit" class="input m-b">Submit</button>

                    </form>

                </div>
            </div>
        </div>
    </section>

    

    <div class="popup1" id="popup1">

        <div class="errorimg">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <div class="maindec">
            <h2>warning!</h2>
        </div>

        <div class="decerror">
            <h3>please complete all fields require</h3>
        </div>


        <button type="submit" id="otpsub" onclick="closepopup()">close</button>
    </div>



    <div class="popup1" id="popup2">

        <div class="errorimg">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <div class="maindec">
            <h2>warning!</h2>
        </div>

        <div class="decerror">
            <h3>please valid information</h3>
        </div>


        <button type="submit" id="otpsub" onclick="closepopup2()">close</button>

    </div>





    <div class="popup1" id="popup3">

        <div class="errorimg">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <div class="maindec">
            <h2>warning!</h2>
        </div>

        <div class="decerror">
            <h3>Email is not  use </h3>
        </div>


        <button type="submit" id="otpsub" onclick="closepopup3()">close</button>
    </div>




    
    <script>
        var x = "<?php echo "$allfill" ?>";


        let popup = document.getElementById("popup1");

        let blurr = document.getElementById("blur");



        if (x == 1) {

            popup.classList.add("open-popup");
            blurr.classList.add("open-blur");



        }

        function closepopup() {
            popup.classList.remove("open-popup");
            blurr.classList.remove("open-blur");

        }
    </script>


    <script>
        var y = "<?php echo "$validinfo" ?>";

        let popup1 = document.getElementById("popup2");

        let blurr = document.getElementById("blur");



        if (y == 1) {

            popup1.classList.add("open-popup");
            blurr.classList.add("open-blur");



        }

        function closepopup2() {
            popup1.classList.remove("open-popup");
            blurr.classList.remove("open-blur");

        }
    </script>




    <script>
        var j = "<?php echo "$emailisuse" ?>";

        let popup3 = document.getElementById("popup3");

        let blurr = document.getElementById("blur");



        if (j == 1) {

            popup3.classList.add("open-popup");
            blurr.classList.add("open-blur");



        }

        function closepopup3() {
            popup3.classList.remove("open-popup");
            blurr.classList.remove("open-blur");

        }
    </script>






    <script>
        let email1 = document.getElementById("input");



        console.log("hey");



        function emaildemo(email) {



            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (email.value.match(mailformat)) {
                console.log("hey");
                email1.classList.remove("error");
                email1.classList.add("succse");
                
                document.getElementById("noticemail").innerHTML = "";


            } else {
                email1.classList.remove("succse");
                email1.classList.add("error");
                
                document.getElementById("noticemail").innerHTML = "Must be in valid format.";
            }



        }
    </script>

    













</body>

</html>