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

$this->loginRequired();

$txnTable = Flux::config('StripeTransactions');

/** Completed Transactions **/

$sqlpartial  = "WHERE account_id = ? AND payment_status = 'paid' ";
$sqlpartial .= "ORDER BY created_at DESC";

$sql = "SELECT COUNT(id) AS total FROM {$server->loginDatabase}.$txnTable $sqlpartial";
$sth = $server->connection->getStatement($sql);

$sth->execute(array($session->account->account_id));
$completedTotal = $sth->fetch()->total;

$col = "*";
$sql = "SELECT $col FROM {$server->loginDatabase}.$txnTable $sqlpartial";
$sth = $server->connection->getStatement($sql);

$sth->execute(array($session->account->account_id));
$completedTxn = $sth->fetchAll();

/** Failed Transactions **/

$sqlpartial  = "WHERE account_id = ? AND payment_status <> 'paid' ";
$sqlpartial .= "AND credits < 1 ORDER BY created_at DESC";

$sql = "SELECT COUNT(id) AS total FROM {$server->loginDatabase}.$txnTable $sqlpartial";
$sth = $server->connection->getStatement($sql);

$sth->execute(array($session->account->account_id));
$failedTotal = $sth->fetch()->total;

$col = "*";
$sql = "SELECT $col FROM {$server->loginDatabase}.$txnTable $sqlpartial";
$sth = $server->connection->getStatement($sql);

$sth->execute(array($session->account->account_id));
$failedTxn = $sth->fetchAll();
?>
