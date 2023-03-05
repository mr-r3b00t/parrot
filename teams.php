<?php

// Replace the <YOUR_WEBHOOK_URL_HERE> with the actual webhook URL provided by your Teams channel
$webhook_url = "https://XXXXXXXXXX.webhook.office.com/webhookb2/XXXXXXXXXXXXXXXXXXXXX>
// Get the source IP
$source_ip = $_SERVER['REMOTE_ADDR'];

// Get the web server's public IP
$public_ip = file_get_contents('https://api.ipify.org');

// Get the user agent
$user_agent = $_SERVER['HTTP_USER_AGENT'];

// The message to send
$message = array(
    "text" => "Source IP: " . $source_ip . "\nPublic IP: " . $public_ip . "\nUser Agent: " . $user_agent,
    "title" => "PHP message",
    "summary" => "This is a summary of the message",
);

// Convert the message to JSON format
$json_message = json_encode($message);

// Set the cURL options to call the webhook
$curl_options = array(
    CURLOPT_URL => $webhook_url,
    CURLOPT_POST => true,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
    CURLOPT_POSTFIELDS => $json_message,
);

// Call the webhook using cURL
$ch = curl_init();
curl_setopt_array($ch, $curl_options);
$result = curl_exec($ch);
curl_close($ch);

// Output the result
echo "Result: " . $result;

?>
