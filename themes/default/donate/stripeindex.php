<?php if (!defined('FLUX_ROOT')) exit; ?>
<link rel="stylesheet" href="<?php echo $this->themePath('css/stripe.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
<script async src="https://js.stripe.com/v3/buy-button.js"></script>

<h2>Donate via Stripe</h2>
<?php if (Flux::config('AcceptDonations')): ?>
	<?php if (!empty($errorMessage)): ?>
		<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
	<?php endif ?>

	<p>By donating, you're supporting the costs of <em>running</em> this server and <em>maintaining</em> it.  In return, you will be rewarded <span class="keyword">donation credits</span> that you may use to purchase items from our <a href="<?php echo $this->url('purchase') ?>">item shop</a>.</p>
	<h3>Are you ready to donate?</h3>
	<p>All donations to us are made via Stripe, you donate via Credit Card, Google Play or Apple Pay!</p>

	<?php
        $currency         = Flux::config('DonationCurrency');
        $dollarAmount     = (float)+Flux::config('CreditExchangeRate');
        $customDataArray    = array('server_name' => $session->loginAthenaGroup->serverName, 'account_id' => $session->account->account_id);
        $customDataEscaped  = htmlspecialchars(base64_encode(serialize($customDataArray)));
        $creditAmount     = 1;
        $rateMultiplier   = 10;

        while ($dollarAmount < 1) {
            $dollarAmount  *= $rateMultiplier;
            $creditAmount  *= $rateMultiplier;
        }
	?>

	<div class="generic-form-div" style="margin-bottom: 10px">
		<table class="generic-form-table">
			<tr>
				<th><label>Current Credit Exchange Rate:</label></th>
				<td><p><?php echo $this->formatCurrency($dollarAmount) ?> <?php echo htmlspecialchars($currency) ?>
				= <?php echo number_format($creditAmount) ?> credit(s).</p></td>
			</tr>
			<tr>
				<th><label>Minimum Donation Amount:</label></th>
				<td><p><?php echo $this->formatCurrency(Flux::config('MinDonationAmount')) ?> <?php echo htmlspecialchars($currency) ?></p></td>
			</tr>
		</table>
	</div>

    <p class="enter-donation-amount">
        <label>
            Enter an amount you would like to donate:
            <input class="money-input" type="text" name="amount"
                value="<?php echo htmlspecialchars($params->get('amount') ?: 0) ?>"
                size="<?php echo (strlen((string)+Flux::config('CreditExchangeRate')) * 2) + 2 ?>" />
            <?php echo htmlspecialchars(Flux::config('DonationCurrency')) ?>
        </label>
        or
        <label>
            <input class="credit-input" type="text" name="credit-amount"
                value="<?php echo htmlspecialchars(intval($params->get('amount') / Flux::config('CreditExchangeRate'))) ?>"
                size="<?php echo (strlen((string)+Flux::config('CreditExchangeRate')) * 2) + 2 ?>" />
            Credits
        </label>
    </p>
    <div class="button-payment-stripe">
        <stripe-buy-button
            buy-button-id="<?php echo FLUX::config('StripeButtonId') ?>"
            publishable-key="<?php echo FLUX::config('StripePublishableKey') ?>"
            client-reference-id="<?php echo $customDataEscaped ?>"
        >
        </stripe-buy-button>
    </div>
<?php else: ?>
	<p><?php echo Flux::message('NotAcceptingDonations') ?></p>
<?php endif ?>
