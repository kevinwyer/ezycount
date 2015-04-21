<?php
/**
 * UserFixture
 *
 */
class UserFixture extends CakeTestFixture {

	public $useDbConfig = 'test';
	
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'password' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'last_name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'country' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'is_activated' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'is_admin' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'disabled' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
		'didTour' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 1, 'unsigned' => false),
		'language' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);


	public $records = array(
		array(
			'id' => 1,
			'email' => 'support@ezycount.ch',
			'password' => '5bff0dbce977acaa070687d506b64c41eb84e262',
			'first_name' => 'Jeanne',
			'last_name' => 'Doe',
			'country' => 'CH',
			'is_activated' => 1,
			'is_admin' => 1,
			'created' => '2015-03-25 13:28:26',
			'disabled' => 1,
			'didTour' => 1,
			'language' => 'en'
		),
			array(
					'id' => 2,
					'email' => 'arthurgiroux@gmail.com',
					'password' => '5bff0dbce977acaa070687d506b64c41eb84e262',
					'first_name' => 'Arthur T',
					'last_name' => 'Giroux',
					'country' => 'CH',
					'is_activated' => 1,
					'is_admin' => 1,
					'created' => '2015-03-25 13:28:26',
					'disabled' => 1,
					'didTour' => 1,
					'language' => 'fr'
			),
			array(
					'id' => 3,
					'email' => 'fuh.barbara@gmail.com',
					'password' => '5bff0dbce977acaa070687d506b64c41eb84e262',
					'first_name' => 'Barbara ',
					'last_name' => 'Furrer',
					'country' => 'CH',
					'is_activated' => 1,
					'is_admin' => 1,
					'created' => '2015-03-25 13:28:26',
					'disabled' => 1,
					'didTour' => 1,
					'language' => 'de'
			),
	);

}
