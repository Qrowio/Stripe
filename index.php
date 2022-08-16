<?php

require_once('vendor/autoload.php');

$stripe = new \Stripe\StripeClient(
    'SECRET_KEY'
);

$session = $stripe->checkout->sessions->create([
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
    'line_items' => [
      [
        'price' => 'PRODUCT_PRICE',
        'quantity' => 500,
      ],
    ],
    'mode' => 'payment',
  ]);

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Stripe Integration Example </title>
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    </body>
        <button id="checkout"> Checkout </button>
        <script>
            var stripe = Stripe('PRODUCT_KEY');
            const checkout = document.getElementById("checkout");
            checkout.addEventListener('click', function(e){
                console.log("hi");
                e.preventDefault();
                stripe.redirectToCheckout({
                    sessionId: "<?php echo $session->id; ?>"
            })
            })
        </script>
    </body>
</html>
