<?php
/**
 * Part of the Joomla GSoC Webservices Project
 *
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Entity\ModelHelpers\Tests;

use Joomla\Entity\Tests\Models\Banner;
use Joomla\Entity\Tests\Models\User;
use Joomla\Entity\Tests\SqliteCase;
use Joomla\Entity\Model;

/**
 * @since  1.0
 */
class SerializationTest extends SqliteCase
{
	/**
	 * @covers Model::toArray()
	 * @return void
	 */
	public function testToArray()
	{
		/**
		 * @improvement add cases (optional):
		 * - model with nested relations
		 */

		$model = new Banner(self::$driver);
		$banner = $model->find(4, ['id', 'createdAt']);

		$expected = ['id' => '4', 'created' => '2011-01-01 00:00:01'];
		$this->assertEquals(
			$expected,
			$banner->toArray()
		);

		$userModel = new User(self::$driver);
		$user = $userModel->find(42, ['id']);
		$userArray = $user->toArray();

		$expected = [
			"id" => 42,
			"sentMessages" => [
				0 => [
					"message_id" => 1,
					"subject" => "message1",
					"user_id_from" => "42"
				]
			]
		];

		$this->assertEquals(
			$expected,
			$userArray
		);

		$relationsArray = $user->getRelationsAsArray();

		$this->assertEquals(
			$expected["sentMessages"],
			$relationsArray["sentMessages"]
		);
	}

	/**
	 * @covers Model::jsonSerialize()
	 * @covers Model::toJson()
	 * @return void
	 */
	public function testJsonSerialize()
	{
		$model = new User(self::$driver);
		$user = $model->find(42, ['id', 'username', 'password']);

		$json = '{"id":42,"username":"admin","sentMessages":[{"message_id":1,"subject":"message1","user_id_from":"42"}]}';

		$this->assertEquals(
			$json,
			$user->toJson()
		);

		$user->addHidden('sentMessages');

		$json = '{"id":42,"username":"admin"}';

		$this->assertEquals(
			$json,
			$user->toJson()
		);
	}

}