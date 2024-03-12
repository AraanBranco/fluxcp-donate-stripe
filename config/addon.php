<?php
/**
 *
 * Module for Donate via Stripe
 *
 * @package		stripe
 * @author		Araan "Morphz" Branco
 * @copyright	Copyright (c) 2024, araanbranco@protonmail.com
 * @license		http://opensource.org/licenses/MIT
 * @link        https://github.com/AraanBranco/fluxcp-donate-stripe
 *
 */

return array(
    'StripeTransactionLogs' => 'stripe_transaction_logs',
    'StripeTransactions'   => 'stripe_transactions',

    // Stripe Options
    'StripeButtonId'            => 'button-id',         // Stripe Button ID
    'StripeSecretKey'           => 'secret-key',        // Stripe Secret Key
    'StripePublishableKey'      => 'publishable-key',   // Stripe Publishable Key
    'StripeWebhookSecret'       => 'webhook-secret',    // Stripe Webhook Secret

    'SubMenuItems' => array(
        'donate' => array(
            'stripeindex'    => 'Make a Donation via Stripe',
            'stripehistory'  => 'Donation History via Stripe',
            'stripeadmin'    => 'Admin for Stripe'
        )
    ),
);
