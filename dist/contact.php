<?php
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){

        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'contact@paulandrica.com';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';

            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";


            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
              $statusMsg = 'Your message has been sent !';
              $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Your contact request submission failed, please try again.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Contact page of paulandrica.com">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
  <link rel="manifest" href="img/favicon/site.webmanifest">
  <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <script src="https://kit.fontawesome.com/8334532ac1.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Contact</title>
</head>



<body>


  <header>
    <div class="menu-btn">
      <div class="btn-line"></div>
      <div class="btn-line"></div>
      <div class="btn-line"></div>
    </div>
    <div class="menu-btn-container">
    </div>


    <nav class="menu">
      <div class="menu-branding">
        <div class="logo">
          <h1>Paul</h1>
          <h2><span class="text-secondary">Andrica</span></h2>
          <h3>.com</h3>
        </div>
      </div>
      <ul class="menu-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            Home
          </a>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link">
            About me
          </a>
        </li>
        <li class="nav-item">
          <a href="work.php" class="nav-link">
            Portfolio
          </a>
        </li>
        <li class="nav-item current" >
          <a href="contact.php" class="nav-link">
            Contact
          </a>
        </li>

      </ul>
    </nav>
  </header>
  <div class="top-head">

      <div class="head-container">
        <h1 class="lg-heading">
          Contact me
        </h1>
        <h2 class="sm-heading">
          This is how you can reach me
        </h2>

      </div>
  </div>
  <main id="contact">

    <div class="boxes">
      <div class="contactImg"></div>
      <div class="sideInfo">

        <div class="sideInfoContainer">
          <h2><i class="fas fa-mobile-alt"></i> Call me :</h2>
          <button class="copyBtn" data-clipboard-text="0471842990">(+32) 0471842990</button>

          <h2><i class="fas fa-at"></i> E-mail : </h2>
          <button class="copyBtn" data-clipboard-text="andpau96@gmail.com">andpau96@gmail.com</button>
          <h6>Click on the phone number or e-mail adress to copy them to clipboard.</h6>
        </div>


      </div>
      <div class="form">
        <?php if(!empty($statusMsg)){ ?>
        <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
    <?php }?>
        <form action="" method="post">
          <h3 class="text-secondary">Send a message</h3>
          <label for="name">Name </label>
          <input type="text" name="name" placeholder="Your Name" required="">

          <label for="email">E-mail </label>
          <input type="email" name="email" placeholder="email@example.com" required="">
          <label for="subject">Subject </label>
          <input type="text"  name="subject" placeholder="Write subject" required="">

          <label for="message">Message </label>
          <textarea name="message" placeholder="Write me something" style="height:200px" required=""></textarea>

          <input name="submit" type="submit" value="Send">
          <div class="clear"> </div>
        </form>
      </div>

    </div>



    </div>
  </main>

  <footer id="main-footer">
    Copyright &copy; 2019
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="https://unpkg.com/popper.js@1"></script>
  <script src="https://unpkg.com/tippy.js@5"></script>
  <script src="js/jquery.js"></script>
  <script src="js/main.js"></script>
  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>



</body>

</html>
