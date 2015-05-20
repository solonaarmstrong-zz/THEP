<?php
class User extends AppModel {

	var $name = 'User';
		
	var $validate = array(   
        'firstname'=>array(
			'notempty' => array(
				'rule' => array('minLength',1),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Enter First Name.'
				)
		),   
        'lastname'=>array(
			'notempty' => array(
				'rule' => array('minLength',1),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Enter Last Name.'
				)
		),  
        'email'=>array(
			'notempty' => array(
				'rule' => array('minLength',1),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Enter Email.'
				),
			'checkUnique' => array(
				'rule' => array('checkUnique','email'),
					'message' => 'Email already in use. Please enter a different email.'
				),
			'validEmail' => array(
				'rule' => 'email',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'Enter Valid Email.'
			
			)

			),


		'passwordplain' => array(       
			'passwordlength' => array('rule' => array('between', 6, 15),'message' => 'Enter 6-15 chars')
		) 
    );
	
	function checkUnique($data,$fieldName){
	$valid = false;
		if(isset($fieldName)&&($this->hasField($fieldName))){
		$valid = $this->isUnique(array($fieldName=>$data));
		}
		return $valid;
	}

}
?>