<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents('php://input'), true);

    // Extract the data
    $name = $data['name'];
    $company = $data['company'];
    $phone = $data['phone'];
    $description = $data['description'];
    $email = $data['email'];

    // Set up the email
    $to = 'pujanvasania@gmail.com';
    $subject = 'New Quotation Request';
    $message = "Name: $name\nCompany: $company\nPhone: $phone\nDescription: $description";
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        echo json_encode(['success' => true]);
    } else {
        // Email sending failed
        echo json_encode(['success' => false]);
    }
} else {
    // Invalid request method
    echo json_encode(['success' => false]);
}
?>
