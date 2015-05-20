<?php
class Faqs extends AppModel {

	var $name = 'Faqs';
        
        var $order = 'Faqs.sortorder';
        
        var $validate = array(   
        'question'=>array(
			'notempty' => array(
				'rule' => array('minLength',1),
					'required' => true,
					'allowEmpty' => false,
					'message' => 'Enter Title.'
				)
		),
        'answer'=>array(
                    'notempty' => array(
                            'rule' => array('minLength',1),
                                    'required' => true,
                                    'allowEmpty' => false,
                                    'message' => 'Enter Title.'
                            )
            )
	);

}


?>