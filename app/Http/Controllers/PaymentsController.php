<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Paypal;

class PaymentsController extends Controller
{

  private $_apiContext;

  public function __construct()
  {
    $this->_apiContext = PayPal::ApiContext(
        config('services.paypal.client_id'),
        config('services.paypal.secret'));

  $this->_apiContext->setConfig(array(
  'mode' => 'sandbox',
  'service.EndPoint' => 'https://api.sandbox.paypal.com',
  'http.ConnectionTimeOut' => 30,
  'log.LogEnabled' => true,
  'log.FileName' => storage_path('logs/paypal.log'),
  'log.LogLevel' => 'FINE'
  ));

  }

  public function getCheckout()
{
	$payer = PayPal::Payer();
	$payer->setPaymentMethod('paypal');

	$amount = PayPal:: Amount();
	$amount->setCurrency(request()->currency);
	$amount->setTotal(request()->pay); // This is the simple way,
	// you can alternatively describe everything in the order separately;
	// Reference the PayPal PHP REST SDK for details.

  $item = PayPal::Item();
  $item->setName('Phone LCD Replacement with Repair Center')
        ->setCurrency(request()->currency)
        ->setQuantity(1)
        ->setPrice(request()->pay);

  $amount = PayPal::Amount();
  $amount->setCurrency(request()->currency)
  ->setTotal(request()->pay);


	$transaction = PayPal::Transaction();
	$transaction->setAmount($amount);
	$transaction->setDescription('Thank you for repairing with us.');
  $transaction->setCustom(request()->custom);

	$redirectUrls = PayPal:: RedirectUrls();
	$redirectUrls->setReturnUrl( route('getDone', request()->custom) );
	$redirectUrls->setCancelUrl(action('PaymentsController@getCancel'));

	$payment = PayPal::Payment();
	$payment->setIntent('sale');
	$payment->setPayer($payer);
	$payment->setRedirectUrls($redirectUrls);
	$payment->setTransactions(array($transaction));

	$response = $payment->create($this->_apiContext);
	$redirectUrl = $response->links[1]->href;

	return redirect( $redirectUrl );
}

public function getDone(\App\Repair $repair, Request $request)
{
	$id = $request->get('paymentId');
	$token = $request->get('token');
	$payer_id = $request->get('PayerID');

	$payment = PayPal::getById($id, $this->_apiContext);

	$paymentExecution = PayPal::PaymentExecution();

	$paymentExecution->setPayerId($payer_id);
	$executePayment = $payment->execute($paymentExecution, $this->_apiContext);

    // Clear the shopping cart, write to database, send notifications, etc.

    $transaction = $payment->getTransactions();
    $resources = $transaction[0]->getRelatedResources();
    $sale = $resources[0]->getSale();

    $transaction_id = $sale->getId();
    $amount_paid = $sale->getAmount()->getTotal();
    $amount = $sale->getAmount();
    $currency = $amount->currency;
    $type = 1;
    $status = 1;
    $repair_id = $repair->id;


    $payment = \App\Payment::create(compact('transaction_id', 'amount_paid', 'currency', 'type', 'status', 'repair_id'));

    $repair->payment_id = $payment->id;
    $repair->save();

    // Thank the user for the purchase
	   return redirect( route('track-by-id', $repair_id));
}

public function getCancel()
{
    // Curse and humiliate the user for cancelling this most sacred payment (yours)
	return redirect(route('track'));
}

}
