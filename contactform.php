<?php //goes at top

    //php error and success messages, create before check for POST
    $error = ""; $successMessage = "";

    //do server-side validation too, so error shows before submit
    if ($_POST) { //if post variable exists
        
        if (!$_POST["email"]) { //if email var does not exist
            $error .= "an email address is required.<br>";
        }
        
        if (!$_POST["content"]) { //if content var does not exist
            $error .= "the content field is required.<br>";
        }
        
        if (!$_POST["subject"]) { //if subject var does not exist
            $error .= "the subject is required.<br>";
        }
        
        //built-in function to validate email if it exists
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "the email address is invalid.<br>";
        }
        
        //checks error message, sets it
        if ($error != "") { //set html 
            $error = '<div class="alert alert-danger" role="alert"><p>there were error(s) in your form:</p>' . $error . '</div>';
        } else { //if no errors, sets up email
            $emailTo = "mrrichards@muhlenberg.edu";
            $subject = $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: ".$_POST['email'];
            
            //tries to send mail, sets message depending on function outcome
            if (mail($emailTo, $subject, $content, $headers)) {
                $successMessage = '<div class="alert alert-success" role="alert">your message was sent, we\'ll get back to you ASAP!</div>';
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>your message couldn\'t be sent - please try again later</div>';
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    </head>
    
    <style type="text/css">
        .container {
            padding-top: 1em;
            width: 50%;
            margin: 0 auto;
        }
        
    </style>
  <body>
      
      <div class="container">
        <img src="https://66.media.tumblr.com/tumblr_mbjtvhkDQh1qdtqmi.gif">
      
        <h1>contact me!</h1>
          <div id="error"><? echo $error.$successMessage; ?></div> <!--carries down PHP var, display one or other (if statement)-->
          
          <!--input names are passed to POST variables!-->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <!--protect against hacking attempt-->
              <fieldset class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                <small class="text-muted">we'll never share your email with anyone else.</small>
              </fieldset>
              <fieldset class="form-group">
                <label for="subject">subject</label>
                <input type="text" class="form-control" id="subject" name="subject" >
              </fieldset>
              <fieldset class="form-group">
                <label for="exampleTextarea">enter your message</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
              </fieldset>
              <button type="submit" id="submit" class="btn btn-outline-dark">submit</button>
          </form>
          
        </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
          
          
    <script type="text/javascript">
          
          $("form").submit(function(e) {
          
            //JS validation    
              var error = "";
              
              if ($("#email").val() == "") {
                  
                  error += "the email field is required.<br>"
                  
              }
              
              if ($("#subject").val() == "") {
                  
                  error += "the subject field is required.<br>"
                  
              }
              
              if ($("#content").val() == "") {
                  
                  error += "the content field is required."
                  
              }
              
              if (error != "") {
                  
                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>there were error(s) in your form:</strong></p>' + error + '</div>');
                  
                  return false;
                  
              } else {
                  
                  return true;
                  
              }
          })
          
    </script>
          
  </body>
</html>
