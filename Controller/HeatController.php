<?php

App::uses('HeatAppController', 'Heat.Controller');

class HeatController extends HeatAppController {

	/**
	 * name
	 *
	 * @var string
	 */
	public $name = 'Heat';
	public $uses = array('Heat');

	/**
	 * ULOZENI DAT
	 * 
	 * @return type
	 */
	public function save() {
		$this->autoRender = false;

		if (!isset($this->request->data['url'])) {
			return;
		}

		$url = $this->request->data['url'];
		$key = $this->request->data['key'];

		$events = json_decode($this->request->data['events']);

		foreach ($events as $event) {
			$event = (array) $event;
			$event['url'] = $url;
			$event['key'] = $key;

			$this->Heat->create();
			$this->Heat->save($event);
		}
	}

	/**
	 * NACTENI DAT
	 */
	public function load() {
		$this->autoRender = false;

		$key = $this->request->data['key'];
		$url = $this->request->data['url'];

		$events = $this->Heat->find('all', array(
			'fields' => array('COUNT(id) as heat', 'x', 'y'),
			'conditions' => array(
				'url' => $url,
				'key' => $key
			),
			'group' => array('x', 'y'),
			'order' => array('COUNT(id)')
		));

		// ziskani maxima, je to posledni prvek, protoze SQL uz to seradilo
		$max = array_pop($events);
		$max = $max[0]['heat'];

		// priprava pole s daty
		$data = array();
		foreach ($events as $event) {
			if ($event[0]['heat'] / $max < 0.01)
				continue; // mene nez 1% fuck

			$data[] = array(
				'x' => $event['Heat']['x'],
				'y' => $event['Heat']['y'],
				'count' => $event[0]['heat']
			);
		}

		echo json_encode(array(
			'max' => $max,
			'data' => $data
		));
	}

}

