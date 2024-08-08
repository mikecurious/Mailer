<?php
require 'vendor/autoload.php';

use Mailgun\Mailgun;

$mgClient = Mailgun::create('API_KEY');
$domain = "noreply.mam-laka.com";

$result = $mgClient->messages()->send($domain, [
	'from'    => 'Excited User <mailgun@noreply.mam-laka.com>',
	'to'      => 'Baz <YOU@noreply.mam-laka.com>', //change
	'subject' => 'Hello Yobus',
	'text'    => 'Testing some Mailgun awesomeness!'
]);

// Output the result
echo "Message has been sent. Message ID: " . $result->getId();
?>
