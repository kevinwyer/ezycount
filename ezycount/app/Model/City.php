<?php
App::uses('AppModel', 'Model');
/**
 * City Model
 *
 */
class City extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'country' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'The country can not be empty',
			),
		),
		'zip' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'The zip code can not be empty',
			),
		),
		'city' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'The city can not be empty',
			),

		),
	);
}