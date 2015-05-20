<?php
class Facts extends AppModel {

	var $name = 'Facts';
	
        var $validate = array(   
        'fact'=>array(
			'notempty' => array(
				'rule' => array('minLength',1),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Enter Fact Text.'
				)
		)
	);

}


?>