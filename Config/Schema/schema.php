<?php 
class HeatSchema extends CakeSchema {

	public function before($event = array()) {
		return true;
	}

	public function after($event = array()) {
	}

	public $heats = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'x' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'y' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'key' => 'index'),
		'target' => array('type' => 'string', 'null' => true, 'default' => null),
		'value' => array('type' => 'string', 'null' => true, 'default' => null),
		'url' => array('type' => 'string', 'null' => false, 'default' => null, 'key' => 'index'),
		'key' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'x' => array('column' => 'x', 'unique' => 0),
			'y' => array('column' => 'y', 'unique' => 0),
			'x_y' => array('column' => array('y', 'x'), 'unique' => 0),
			'type' => array('column' => 'type', 'unique' => 0),
			'url' => array('column' => 'url', 'unique' => 0),
			'key' => array('column' => 'key', 'unique' => 0)
		),
	);

}
