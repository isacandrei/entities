<?php
/**
 * Part of the Joomla GSoC Webservices Project
 *
 * @copyright  Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Entity\Tests\Models;

use Joomla\Entity\Model;

/**
 * Class Content
 * @package Joomla\Entity\Tests
 * @since 1.0
 */
class Content extends Model
{
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = array(
		'params' => 'array'
	);

	/**
	 * The attributes that should be mutated to dates. Already aliased!
	 *
	 * @var array
	 */
	protected $dates = array(
		'checked_out_time',
		'publish_up',
		'publish_down',
		'created',
		'modified'
	);

	/**
	 * Array with alias for "special" columns such as ordering, hits etc etc
	 *
	 * @var    array
	 */
	protected $columnAlias = array(
		'createdAt' => 'created',
		'updatedAt' => 'modified'
	);

}
