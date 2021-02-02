<html>
<head>
<title>PHP Send HTML Email Template</title>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="./custom.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
<div id='main'><center><h1>PHP Send HTML Email Template</h1></center>
<div id='container' >
<h2>Send a Greeting to your closed ones....!!</h2>
<hr>
<form id="checkinput" action="index.php" method='POST'>
<div> <div id="book_container" class="card_container1" class>

<img id="img1" src='img/greet_1.jpg' style='border-radius:5px;width:190px;height:200px;' alt=''/>
<br/><br/>
<div><img class="right-icon1"id="right-icon"src="img/right.png"/><input id="rad1" type='radio' name='greet_radio' value="1"></div>
</div>

<div id="book_container" class="card_container2" >
<img id="img2" src='img/gree_2.jpg' style='border-radius:5px;width:190px;height:200px;' alt=''/>
<br/><br/>
<div><img class="right-icon2" id="right-icon"src="img/right.png"/><input id="rad2" type='radio' name='greet_radio' value="2"></div>
</div>
<div id="book_container" class="card_container3" >
<img id="img3" src='img/greet_3.jpg' style='border-radius:5px;width:190px;height:200px;' alt=''/>
<br/><br/>
<div><img class="right-icon3" id="right-icon"src="img/right.png"/><input id="rad3" type='radio' name='greet_radio' value="3"></div>
</div>
</div>
<div id="email_input">
<label><b>Enter Email:</b></label>
<input id="email" type='email' maxlength="50" name='mail_receiver'/></div>
<input type='submit' id='submit' name='send_greet' value='Send Greeting'/>
</form>
</div>
</div>
</body>
</html>

<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("usermail", "username");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("recipient mail", "recipient name");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "
<div style='margin-left:150px;background-image:url(http://archive.customize.org/files/old/wallpaper/files/Surreal_Red_big.jpg); padding:50px;width:600px;'>
<h1 style='color:#FFFFFF;font-family: Arial, Helvetica, sans-serif;text-align:center;line-height:2.5em;'>Diwali Wishes!</h1>
<hr>
<table>
<tr><td style='text-align:center'>
<div>
<a href=''><img src='http://webneel.com/daily/sites/default/files/images/daily/09-2013/14-diwali-greeting-card.jpg' align='left' style='width:250px;height:250px;' alt=''/></a>
<p style='color:#FFFFDD; font-family: Allura,cursive,Arial, Helvetica, sans-serif; font-size:20px'>'Have a prosperous Diwali.Hope this festival of lights,brings you every joy and happiness.May the lamps of joy,illuminate your life and fill your days with the bright sparkles of peace,mirth and good will.'</p>
</div>
</td>
</tr>
<tr>
<td><div style='float:left;'><p style='color:#FFFFFF;font-family: Arial, Helvetica, sans-serif; font-size:20px'>'May the joy, cheer, Mirth and merriment Of this divine festival Surround you forever......'</p></div></td>
</tr>
</table>
</div>;"
);                                 

echo "\nSend Grid Cred".$_ENV['SENDGRID_API_KEY']."\n";
$sendgrid = new \SendGrid($_ENV['SENDGRID_API_KEY']);
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>