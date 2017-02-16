<?php
/**
 *
 */
	require_once('./stripe-php/init.php');

	// error_reporting(E_ALL); 
	// ini_set('display_errors', 1);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey("sk_test_XXXXXXXXXXXXXXXXXXXXXXXX");

	// Token is created using Stripe.js or Checkout!
	// Get the payment token submitted by the form:
	$tokenid = $_POST['tokenid'];
    $academyCost = $_POST['academyCost'];
    $email = $_POST['email'];
    $description = $_POST['purchaseDesc'];

	// // Charge the user's card:
	// $charge = \Stripe\Charge::create(array(
	//   "amount" => 1000,
	//   "currency" => "usd",
	//   "description" => "Example charge",
	//   "source" => $token,
	// ));

	// http://stackoverflow.com/questions/36680906/completely-stuck-with-stripe-checkout
	// Create the charge on Stripe's servers - this will charge the user's card
	try {
		$customer = \Stripe\Customer::create(array(
		  'email' => $_POST['email'],
		  'source'  => $tokenid
		));

		$charge = \Stripe\Charge::create(array(
		  "amount" => $academyCost,
		  "currency" => "usd",
		  "description" => $description,
		  "customer" => $customer->id
		  // "receipt_email" => $email,
		  // "source" => $tokenid
		));

		echo "successful charge!";
	} catch(\Stripe\Error\Card $e) {
		// The card has been declined
		echo "failure - card declined";
	}
