<?php require_once APPROOT . '/views/inc/user/header.php'; ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php'; ?>
<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

// class ContactController {

//     public function store() {
//         // Include PHPMailer classes
//         require_once 'path/to/vendor/autoload.php'; // Adjust the path as necessary

//         // Create PHPMailer instance
//         $mail = new PHPMailer();

//         // Check if form was submitted
//         if ($_SERVER["REQUEST_METHOD"] == "POST") {
//             // Retrieve and sanitize form data
//             $name = trim(filter_input(INPUT_POST, 'contact_nom', FILTER_SANITIZE_STRING));
//             $email = trim(filter_input(INPUT_POST, 'contact_email', FILTER_SANITIZE_EMAIL));
//             $message = trim(filter_input(INPUT_POST, 'contact_message', FILTER_SANITIZE_SPECIAL_CHARS));

//             // Validate form data
//             if (empty($name) || empty($email) || empty($message)) {
//                 // Handle error (e.g., redirect with an error message)
//                 header("Location: " . URLROOT . "/contact?error=missingfields");
//                 exit;
//             }
//             if (!PHPMailer::validateAddress($email)) {
//                 // Handle error (e.g., redirect with an error message)
//                 header("Location: " . URLROOT . "/contact?error=invalidemail");
//                 exit;
//             }

//             // Configure PHPMailer
//             $mail->isSMTP();
//             $mail->SMTPDebug = 2; // Set to 0 in production
//             $mail->Host = 'smtp.example.com'; // Your SMTP server
//             $mail->Port = 587; // SMTP port
//             $mail->SMTPSecure = 'tls'; // Encryption method
//             $mail->SMTPAuth = true;
//             $mail->Username = 'your-email@example.com'; // Your email
//             $mail->Password = 'your-email-password'; // Your email password

//             $mail->setFrom('your-email@example.com', 'Your Name');
//             $mail->addAddress('recipient@example.com', 'Recipient Name');
//             $mail->Subject = 'Contact Us Message from ' . $name;
//             $mail->Body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

//             // Send email and handle errors
//             if ($mail->send()) {
//                 header("Location: " . URLROOT . "/contact?status=success");
//             } else {
//                 header("Location: " . URLROOT . "/contact?error=" . $mail->ErrorInfo);
//             }
//             exit;
//         }
//     }
// }
?>

<section id="contact">
	<div class="sectionheader">	<h1>CONTACT US</h1></div>
	<article>
	<p>You can say anything for us.</p>
		
			<label for="checkcontact" class="contactbutton">Click Here<div class="mail"></div></label><input id="checkcontact" type="checkbox">
	
			<form action="<?php echo URLROOT; ?>" method="post" class="contactform">
				<p class="input_wrapper"><input type="text" name="contact_nom" value=""  id ="contact_nom"><label for="contact_nom">NAME</label></p>
				<p class="input_wrapper"><input type="text" name="contact_email" value=""  id ="contact_email"><label for="contact_email">EMAIL</label></p>
				<p class="textarea_wrapper"><textarea name="contact_message" id="contact_message"></textarea></p>
				<p class="submit_wrapper"><input type="submit" value="Send a Message"></p>			
			</form>
	</article>
</section>


<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>