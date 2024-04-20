<?php
// Set your secret key from your Stripe Dashboard.
\Stripe\Stripe::setApiKey('YOUR_SECRET_KEY');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
$token = $_POST['stripeToken'];

// Charge the user's card:
$charge = \Stripe\Charge::create(array(
  'amount' => 1000, // Amount in cents
  'currency' => 'usd',
  'description' => 'Example Charge',
  'source' => $token,
));

echo 'Payment successful!';
?>
