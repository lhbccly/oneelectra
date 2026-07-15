<?php
// -------------------------- EDIT THESE TWO LINES --------------------------
$receive_mail = "info@oneelectra.com"; // Your Hostinger mailbox (where enquiries arrive)
$website_domain_email = "info@oneelectra.com"; // Same Hostinger email (Hostinger requires domain email as sender to avoid spam)
// --------------------------------------------------------------------------

// Get form data from your HTML
$customer_name = $_POST['name'];
$customer_email = $_POST['email'];
$customer_company = $_POST['company'];
$customer_msg = $_POST['message'];

// Email subject your Hostinger inbox will show
$email_subject = "New Enquiry | One Electra EV Website";

// Build email message body
$email_content = "You received a new customer enquiry from One Electra website:\n\n";
$email_content .= "Customer Full Name: " . $customer_name . "\n";
$email_content .= "Customer Email: " . $customer_email . "\n";
$email_content .= "Company Name: " . $customer_company . "\n\n";
$email_content .= "Customer Request:\n" . $customer_msg;

// Hostinger required mail headers (stops emails landing in spam folder)
$mail_headers = "From: One Electra <".$website_domain_email.">\r\n";
$mail_headers .= "Reply-To: ".$customer_email."\r\n";
$mail_headers .= "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Send email to your Hostinger mailbox
$mail_status = mail($receive_mail, $email_subject, $email_content, $mail_headers);

// Redirect user back to contact page with success/error message
if($mail_status){
    header("Location: contact.html?msg=success");
    exit;
}else{
    header("Location: contact.html?msg=failed");
    exit;
}
?>