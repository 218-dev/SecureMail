<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $email = $data['email'];
    $password = $data['password'];
    $recipient = $data['recipient'];
    $subject = $data['subject'];
    $message = $data['message'];

    // إعداد إعدادات SMTP
    ini_set("SMTP", "smtp.gmail.com");
    ini_set("smtp_port", "587");
    ini_set("sendmail_from", $email);

    // إرسال البريد الإلكتروني
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($recipient, $subject, $message, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'تم إرسال البريد بنجاح']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'فشل إرسال البريد']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'طلب غير صالح']);
}
?>
