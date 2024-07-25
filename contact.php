<!DOCTYPE html>

<html>

  <body>

    <?php

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

          $to_email = "shlooby07@gmail.com";
          $subject = "New Contact Us Message";
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $res = "";

          foreach($_REQUEST as $key => $val) {

            $res .= "<b>" . $key . "<b/> <p>" . $val . "<p/> <br/>";
          }

          $contactus = "
            <html>
              <p>You have a message from the contact us page on your website:</p>
              " . $res . "
            </html>
          ";

          $mail = mail($to_email,$subject,$contactus,$headers);

          if (!$mail) {

            print_r(error_get_last()['message']);
          } else {

            echo "Thanks, message sent.";
          }
      }

    ?>

  </body>

</html>