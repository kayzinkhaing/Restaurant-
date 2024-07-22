<?php require_once APPROOT . '/views/inc/user/header.php'; ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php'; ?>

<?php
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$errors = [];
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['contact_nom']);
    $email = trim($_POST['contact_email']);
    $message = trim($_POST['contact_message']);

    // Basic validation
    if (empty($name)) {
        $errors['contact_nom'] = 'Name is required';
    }
    if (empty($email)) {
        $errors['contact_email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['contact_email'] = 'Invalid email format';
    }
    if (empty($message)) {
        $errors['contact_message'] = 'Message is required';
    }

    if (empty($errors)) {
        // No errors, send email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'kayzinkhaing1331@gmail.com'; // Use environment variables for security
            $mail->Password = 'fjao fval immz iylg';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('kayzinkhaing1331@gmail.com', 'Restaurant');
            $mail->addAddress('kayzinkhaing1331@gmail.com'); // Change to your recipient email

            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";
            $mail->AltBody = "Name: $name\nEmail: $email\nMessage: $message";

            $mail->send();
            $successMessage = 'Thank you for reaching out! Your message has been received and we will get back to you soon.';
        } catch (Exception $e) {
            $errors['mail'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>

<style>
    .message-box {
        border: 1px solid #ddde2a;
        padding: 15px;
        margin: 15px 0;
        text-align: center;
        background-color: #e25be3a3;
    }
    .error {
        color: red;
    }
</style>

          <section id="contact">
            <?php if (!empty($successMessage)): ?>
                <div class="message-box"><?php echo $successMessage; ?></div>
            <?php endif; ?>
    <div class="sectionheader">
        <h1>DEAR CUSTOMERS</h1>
    </div>
    <article>
        <p>You can say anything to us.</p>
        
        <label for="checkcontact" class="contactbutton">Click Here<div class="mail"></div></label>
        <input id="checkcontact" type="checkbox">

        <form action="contact" method="post" class="contactform">
          

            <p class="input_wrapper">
                <input type="text" name="contact_nom" id="contact_nom" value="<?php echo htmlspecialchars($name ?? ''); ?>">
                <label for="contact_nom">NAME</label>
                <?php if (isset($errors['contact_nom'])): ?>
                    <p class="error"><?php echo $errors['contact_nom']; ?></p>
                <?php endif; ?>
            </p>
            <p class="input_wrapper">
                <input type="text" name="contact_email" id="contact_email" value="<?php echo htmlspecialchars($email ?? ''); ?>">
                <label for="contact_email">EMAIL</label>
                <?php if (isset($errors['contact_email'])): ?>
                    <p class="error"><?php echo $errors['contact_email']; ?></p>
                <?php endif; ?>
            </p>
            <p class="textarea_wrapper">
                <textarea name="contact_message" id="contact_message"><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                <?php if (isset($errors['contact_message'])): ?>
                    <p class="error"><?php echo $errors['contact_message']; ?></p>
                <?php endif; ?>
            </p>
            <p class="submit_wrapper">
                <input type="submit" value="Send a Message">
            </p>           
        </form>
    </article>
</section>

<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>
