<?phP
include 'config.php';

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require('mailer/PHPMailer.php');
require('mailer/Exception.php');
require('mailer/SMTP.php');



$email=$_SESSION['emailfo'];


if (isset($_POST['btn-reotp'])) {
  header("location:otp.php");

  $otp = rand(100000, 999999);

  echo "hello
  6565";





  $mail = new PHPMailer(true);


  try {

    //Server settings

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'omniiyu2022@gmail.com';
    $mail->Password   = 'nsumutuneupweefn';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;



    //Recipients
    $mail->setFrom('omniiyu2022@gmail.com', 'Verification-OmniFood');
    $mail->addAddress($email);     //Add a recipient

    $mail->isHTML(true);
    $mail->Subject = ' forgot-password-Verification';
    $mail->Body    = '                   
    <head>
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
    $mail->MsgHTML = ($otp);



    $mail->send();

    $sql = "INSERT INTO otps(otp)VALUES ('$otp')";
    $run = mysqli_query($conn, $sql);
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}









if (!empty($_POST['otppass'])) {
  $verify = $_POST['otppass'];

  $result = mysqli_query($conn, "SELECT *FROM otps WHERE OTP='" . $_POST['otppass'] . "' ");

  $result2 = mysqli_query($conn, "SELECT *FROM otps WHERE exp!=1 AND NOW()<=DATE_ADD(date_dt,INTERVAL 1 MINUTE)");




  $stat = mysqli_num_rows($result);
  $stat2 = mysqli_num_rows($result2);




  if (!empty($stat)) {

    if (!empty($stat2)) {

      $news = mysqli_query($conn, "UPDATE otps SET exp=1 WHERE otp='" . $_POST['otppass'] . "'");

      


       header('location:forgetpassword.php');
    } else {
      
      echo "timer out";
    }
  } else {
    $news = mysqli_query($conn, "UPDATE otps SET exp=1 WHERE otp='" . $_POST['otppass'] . "'");
    $inmsg = 1;
  }
}







?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="home-img/Apple-Logo-Modern-Icon.png">
  <link rel="stylesheet" href="otpstyle.css">
  <title>forgetpassword</title>
</head>

<style>
  form {

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;


  }

  .notic {

    width: 7rem;
    height: 2.3rem;
    background-color: #e0313156;
    border: 1px solid #e03131;
    margin-top: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    visibility: hidden;

  }

  .pronotic {
    visibility: visible;
  }

  .reotp {
    border: none;
    background-color: white;
    cursor: pointer;

  }



  .icon {
    width: 100%;
    height: 5.5rem;
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
    height: 7.5rem;
    display: flex;
    justify-content: center;
    align-items: center;


  }

  .decerror {
    margin-bottom: 1rem;

  }

  .otpsub {
    margin-top: 1.5rem;
  }

  .maindec {
    margin-top: 1rem;
  }

  .open-blur {
    filter: blur(10px);
  }




  .popup1 {
    width: 360px;
    background-color: white;
    border-radius: 6px;

    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%)scale(1);
    display: flex;
    flex-direction: column;

    box-shadow: 2px 2px 40px rgb(0 0 0 / 19%);
    align-items: center;
    height: 23rem;
    visibility: hidden;
    transition: transform 0.4s, top 0.4s;


  }


  .open-popup {
    visibility: visible;
    top: 50%;
    transform: translate(-50%, -50%)scale(1);




  }
</style>

<body>



  <div class="container1" id="blur">




    <div class="popup" id="popup">

      <div class="flex1">
        <img src="../friuts/mail-img/mail-removebg-preview.png" alt="">
        <h1>OTP Verification</h1>
        <div class="dec">
          <p>We've sent a Verification code to your <br> email- <?php echo "$email" ?></p>
        </div>

        <div class="pat">

          <form action="" method="POST">

            <input type="text" name="otppass" id="popotp" placeholder="Enter OTP">
            <button type="submit" id="otpsub">submit</button>


            <button class="reotp" name="btn-reotp">resend-otp</button>

          </form>
        </div>




        <div class="contdown">

          <div class="btnGroup">
            <span class="Btn" id="verifiBtn">

            </span>
            <span class="timer">
              <span id="counter"></span>
            </span>
          </div>

        </div>

        <div class="notic" id="notic">
          <span id="msg"></span>
        </div>
      </div>


    </div>


  </div>





  <div class="popup1" id="popup1">

    <div class="errorimg">
      <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
      </svg>
    </div>

    <div class="maindec">
      <h1>Thank you</h1>
    </div>

    <div class="decerror">
      <h3>you have successfully registration</h3>
    </div>


    <button type="submit" id="otpsub" onclick="closepopup()"><a href="login.php">close</a></button>
  </div>







  <script>
    let x = "<?php echo "$inmsg" ?>";

    let promsg = document.getElementById("notic");

    console.log(x);

    if (x == 1) {

      console.log(x);

      promsg.classList.add("pronotic");

      document.getElementById("msg").innerHTML = "otp invalid";

    }
  </script>





  <script>
    function countdown() {
      var seconds = 59;

      function tick() {
        var counter = document.getElementById("counter");
        seconds--;
        counter.innerHTML =
          "0:" + (seconds < 10 ? "0" : "") + String(seconds);
        if (seconds > 0) {
          setTimeout(tick, 1000);
        } else {

          alert("faild");

          document.getElementById("counter").innerHTML = "time out";

        }
      }
      tick();
    }
    countdown();
  </script>





</body>

</html>