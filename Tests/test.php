<?php
/**
 * Part of the Joomla GSoC Webservices Project
 *
 * @package Joomla\Entity\Tests
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

require __DIR__ . '/../vendor/autoload.php';


use Joomla\Database\DatabaseFactory;
use Joomla\Entity\Tests\Models\User;
use Joomla\Entity\Tests\Models\Content;

$options = array('user' => 'gsoc18_webservices', 'password' => 'gsoc18_webservices', 'database' => 'gsoc18_webservices', 'prefix' => 'kf3n7_');
$attributes = array('table' => '#__users');

$driver = DatabaseFactory::getDriver('mysql', $options);

$modelUser = new User($driver, $attributes);
$modelContent = new Content($driver);

print_r($modelUser->find(948));
