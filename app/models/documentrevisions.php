<?php
class Documentrevisions extends AppModel {

	var $name = 'Documentrevisions';
	var $actsAs = array(
		'UploadPack.Upload' => array(
			'documentrevisions' => array()
		)
	);
	

}


?>