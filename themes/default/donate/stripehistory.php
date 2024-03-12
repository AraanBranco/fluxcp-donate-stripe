<?php if (!defined('FLUX_ROOT')) exit; ?>
<link rel="stylesheet" href="<?php echo $this->themePath('css/stripe.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />

<h2>Donation History - Stripe</h2>
<h3>Transactions: Completed</h3>
<?php if ($completedTxn): ?>
<p>You have <?php echo number_format($completedTotal) ?> completed transaction(s).</p>
<table class="vertical-table">
	<tr>
		<th>Transaction</th>
		<th>Payment Date</th>
		<th>E-mail</th>
		<th>Amount</th>
		<th>Currency</th>
		<th>Credits</th>
	</tr>
	<?php foreach ($completedTxn as $txn): ?>
        <tr>
            <td><?php echo htmlspecialchars($txn->event_reference_id) ?></td>
            <td><?php echo $this->formatDateTime($txn->created_at) ?></td>
            <td><?php echo htmlspecialchars($txn->email) ?></td>
            <td><?php echo htmlspecialchars($txn->settleAmount) ?></td>
            <td><?php echo htmlspecialchars($txn->settleCurrency) ?></td>
            <td><?php echo number_format($txn->credits) ?></td>
        </tr>
	<?php endforeach ?>
</table>
<?php else: ?>
<p>You have no completed transactions.</p>
<?php endif ?>

<h3>Transactions: Failed</h3>
<?php if ($failedTxn): ?>
<p>You have <?php echo number_format($failedTotal) ?> held transaction(s).</p>
<table class="vertical-table">
	<tr>
		<th>Transaction</th>
		<th>Payment Date</th>
		<th>E-mail</th>
		<th>Amount</th>
		<th>Currency</th>
		<th>Credits</th>
	</tr>
	<?php foreach ($failedTxn as $txn): ?>
        <tr>
            <td><?php echo htmlspecialchars($txn->event_reference_id) ?></td>
            <td><?php echo $this->formatDateTime($txn->created_at) ?></td>
            <td><?php echo htmlspecialchars($txn->email) ?></td>
            <td><?php echo htmlspecialchars($txn->settleAmount) ?></td>
            <td><?php echo htmlspecialchars($txn->settleCurrency) ?></td>
            <td><?php echo number_format($txn->credits) ?></td>
        </tr>
	<?php endforeach ?>
</table>
<?php else: ?>
<p>You have no failed transactions.</p>
<?php endif ?>
