<?php
/**
 * CompanyFixture
 *
 */
class CompanyFixture extends CakeTestFixture {

	public $useDbConfig = 'test';
	
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 10, 'unsigned' => true, 'key' => 'index', 'comment' => 'represent the user id of the creator'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'street' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'zip' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false),
		'city' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'country' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'phone' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'website' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'first_accounting_year' => array('type' => 'date', 'null' => false, 'default' => null),
		'closing_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'blocking_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'currency' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 5, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'vat_registered' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'vat_model' => array('type' => 'boolean', 'null' => false, 'default' => '1', 'comment' => '1 = effective rate, 0 = net tax rate'),
		'vat_both' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'vat_number' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'starting_vat' => array('type' => 'date', 'null' => false, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'expiration_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'current_step' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'represent the current step for the creation, there are 5 steps where 0 is the first and 4 is the final step'),
		'test' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'logo' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'background_color' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 6, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'disabled' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'canton' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 55, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'user_id' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'name' => 'TEST EZYCafé',
			'number' => '1234',
			'street' => 'rue ezy, 1',
			'zip' => 3000,
			'city' => 'Bern',
			'country' => 'CH',
			'phone' => '',
			'email' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet',
			'first_accounting_year' => '2015-03-30',
			'closing_date' => '2015-03-30',
			'blocking_date' => '2015-03-30',
			'currency' => 'Lor',
			'vat_registered' => 1,
			'vat_model' => 1,
			'vat_both' => 1,
			'vat_number' => 'Lorem ipsum dolor sit amet',
			'starting_vat' => '2015-03-30',
			'created' => '2015-03-30 14:22:56',
			'expiration_date' => '2015-03-30',
			'current_step' => 1,
			'test' => 1,
			'logo' => 'Lorem ipsum dolor sit amet',
			'background_color' => 'Lore',
			'disabled' => 1,
			'canton' => 'BE'
		),
				array(
			'id' => 2,
			'user_id' => 2,
			'name' => 'Fuhrer Cross',
			'number' => 'jdkl',
			'street' => '17 Laupenstrasse',
			'zip' => 3270,
			'city' => 'Aarberg',
			'country' => 'CH',
			'phone' => '',
			'email' => 'Lorem ipsum dolor sit amet',
			'website' => 'Lorem ipsum dolor sit amet',
			'type' => 'Lorem ipsum dolor sit amet',
			'first_accounting_year' => '2015-03-30',
			'closing_date' => '2015-03-30',
			'blocking_date' => '2015-03-30',
			'currency' => 'Lor',
			'vat_registered' => 1,
			'vat_model' => 1,
			'vat_both' => 1,
			'vat_number' => 'Lorem ipsum dolor sit amet',
			'starting_vat' => '2015-03-30',
			'created' => '2015-03-30 14:22:56',
			'expiration_date' => '2015-03-30',
			'current_step' => 1,
			'test' => 1,
			'logo' => 'Lorem ipsum dolor sit amet',
			'background_color' => 'Lore',
			'disabled' => 1,
			'canton' => 'AG'
		),
	);

}
