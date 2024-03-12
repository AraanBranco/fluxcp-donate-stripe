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

$title    = 'Donate - Admin';
$transactionTable = (string)Flux::config('StripeTransactions');

$sql  = 'SELECT COUNT(*) AS count FROM `'.$server->loginDatabase.'`.`'.$transactionTable.'` WHERE DATE(`created_at`) = CURDATE()';
$sth  = $server->connection->getStatement($sql);
$sth->execute();
$donates = $sth->fetch();
?>
