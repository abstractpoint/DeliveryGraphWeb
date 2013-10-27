<?php
class FetchesController extends AppController {

	var $name = 'Fetches';

	function index() {
		$this->Fetch->recursive = 0;
		$this->set('fetches', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid fetch', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fetch', $this->Fetch->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Fetch->create();
			if ($this->Fetch->save($this->data)) {
				$this->Session->setFlash(__('The fetch has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fetch could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid fetch', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Fetch->save($this->data)) {
				$this->Session->setFlash(__('The fetch has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fetch could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Fetch->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for fetch', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Fetch->delete($id)) {
			$this->Session->setFlash(__('Fetch deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Fetch was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
