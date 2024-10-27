<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $comment = htmlspecialchars(trim($_POST['comment']));

    if ($name && $email && $comment) {
        $to = 'message.abdulazeez@gmail.com';  // Replace with your email address
        $subject = "From Portfolio - Message from $name";
        $message = "Name: $name\nEmail: $email\n\nMessage:\n$comment";
        $headers = "From: $email\r\nReply-To: $email";

        if (mail($to, $subject, $message, $headers)) {
            header('Location: ?status=success');
            exit;
        } else {
            header('Location: ?status=error');
            exit;
        }
    } else {
        header('Location: ?status=error');
        exit;
    }
} else {
    header('Location: ?status=error');
    exit;
}
?>
