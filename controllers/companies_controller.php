<?php
require_once ROOT.DS.APP_DIR.DS.'libs/Braintree.php';
Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('rkv2fwwf29nxwndg');
Braintree_Configuration::publicKey('8y4pgkw4wjkxkjr7');
Braintree_Configuration::privateKey('512c50c2ff94f916675008038c5c9090');

class CompaniesController extends AppController {

	var $name = 'Companies';
	var $components = array('Security');
	function index() {
		$this->Company->recursive = 0;
		$this->set('companies', $this->paginate());
	}
	
	function register() {
		
		if (!empty($this->data)) {
		
			//base 64 encode logo
			if (!empty($this->data['Company']['logo']['tmp_name'])) {
				
				$this->data['Company']['logo'] = $this->_handleImage($this->data['Company']['logo']);
				$this->data['Company']['hash'] = Security::hash(strtotime('now'));
				
				$this->Company->create();
				
				if ($this->Company->save($this->data)) {
				
					$this->Session->setFlash(__('The company was saved. Please now sign up to a monthly subscription', true));
					$this->redirect(array('action' => 'activate','company_id'=>$this->Company->id, 'hash'=>$this->data['Company']['hash']));
				
				} else {
					$this->Session->setFlash(__('The company could not be saved. Please, try again.', true));
				}
				
			}
		}
	}
	
	function activate() {
		

		
		if (!empty($this->data)) {
		
			$company = $this->Company->findById($this->data['Company']['company_id']);
			//making sure the right company payment is being applied to
			if ($company['Company']['hash'] !== $this->data['Company']['hash']) {
				return false;
			}
			
			//debug($this->data);
			if ($this->_braintree($this->data, $company)) {
				
				$this->Company->read(null,$this->data['Company']['company_id']);
				$this->Company->set('active', 1);
				if ($this->Company->save()) {
					$this->redirect(array('action' => 'view',$this->data['Company']['company_id']));
				}
				
			} else {
			
			
			
			}
		
		} else {
			
		$this->data = array_merge_recursive($this->data, array('Company'=>$this->params['named']));
			
		}
		
	}
	
	function _braintree($data, $company) {

		
		$result = Braintree_Customer::create(array(
			"id"=>$company['Company']['id'],
		    "firstName" => $data['Company']["first_name"],
		    "lastName" => $data['Company']["last_name"],
		    "company" => $company['Company']["name"],
		    'email' => $company['Company']["email"],
		    "creditCard" => array(
		        "number" => $data['Company']["number"],
		        "expirationMonth" => $data['Company']["month"],
		        "expirationYear" => $data['Company']["year"],
		        "cvv" => $data['Company']["cvv"],
		    )
		));

		
		if ($result->success) {


		} else {
			$this->set('result',$result);
		}
		
		//charge customer
		
		try {
		    $customer = Braintree_Customer::find($company['Company']['id']);
		    $payment_method_token = $customer->creditCards[0]->token;
		
		    $result = Braintree_Subscription::create(array(
		        'paymentMethodToken' => $payment_method_token,
		        'planId' => '94n6'
		    ));
		
		    if ($result->success) {
		    	//replace with flash
		        $this->Session->setFlash("Success! Subscription " . $result->subscription->id . " is " . $result->subscription->status);		
		        return true;
		        
		    } else {
		    	//replace with flash
		        $this->set('result',$result);
		    }
		} catch (Braintree_Exception_NotFound $e) {
			//replcae with flash
		    $this->Session->setFlash("Failure: no customer found with ID ");
		}
		

		
	}
	
	function _handleImage($fileData) {
		if (is_uploaded_file($fileData['tmp_name'])) {

            //Encode file into base64
            return base64_encode(file_get_contents($fileData['tmp_name']));

        }

	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid company', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('company', $this->Company->read(null, $id));
	}


	function login() {
		if (!empty($this->data)) {
		$this->redirect(array('action'=>'view', 1));
    	}
    }

    function logout() {
        $this->redirect($this->Auth->logout());
    }
	
}
