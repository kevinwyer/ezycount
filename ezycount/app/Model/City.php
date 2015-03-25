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
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The country can not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'zip' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The zip code can not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'city' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'The city can not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),

		),
	);
}
