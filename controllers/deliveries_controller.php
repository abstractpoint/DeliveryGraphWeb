<?php
class DeliveriesController extends AppController {

	var $name = 'Deliveries';

	function index() {
		$this->Delivery->recursive = 0;
		$this->set('deliveries', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid delivery', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('delivery', $this->Delivery->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Delivery->create();
			if ($this->Delivery->save($this->data)) {
				$this->Session->setFlash(__('The delivery has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery could not be saved. Please, try again.', true));
			}
		}
		$drivers = $this->Delivery->Driver->find('list');
		$companies = $this->Delivery->Company->find('list');
		$this->set(compact('drivers', 'companies'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid delivery', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Delivery->save($this->data)) {
				$this->Session->setFlash(__('The delivery has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delivery could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Delivery->read(null, $id);
		}
		$drivers = $this->Delivery->Driver->find('list');
		$companies = $this->Delivery->Company->find('list');
		$this->set(compact('drivers', 'companies'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for delivery', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Delivery->delete($id)) {
			$this->Session->setFlash(__('Delivery deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Delivery was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function sms_response() {
		//no view for this method
		$this->autoRender = false;
		
		if (empty($this->params['url']['obj'])) {
			return false;
		}
		
		$this->log($this->params['url']['obj'], 'debug');
		

		$this->Delivery->route_sms($this->params['url']['obj']);

		
	}
	
	function email_response() {
		//no view for this method
		$this->autoRender = false;
		
		$this->log($this->params['url']['obj'], 'debug');
	}
	
	function sign_response() {
		//no view for this method
		$this->autoRender = false;
		
		$this->log($this->params['url']['obj'], 'debug');
	}
}
