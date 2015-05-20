<?php
class Resources extends AppModel {

	var $name = 'Resources';
	var $actsAs = array(
		'UploadPack.Upload' => array(
			'resource' => array()
		)
	);
	

}


?>