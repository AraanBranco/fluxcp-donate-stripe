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

if (!defined('FLUX_ROOT')) exit;

require_once 'Stripe.php';
if (isset($_POST)) {
    $request = new Stripe($server);
    $request->process();
}
?>
