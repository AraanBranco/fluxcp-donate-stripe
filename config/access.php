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
	'modules' => array(
		'donate' => array(
            'stripeindex'    => AccountLevel::ANYONE,
            'stripenotify'   => AccountLevel::ANYONE,
            'stripehistory'  => AccountLevel::NORMAL,
            'stripeadmin'    => AccountLevel::ADMIN
        ),
	)
);
