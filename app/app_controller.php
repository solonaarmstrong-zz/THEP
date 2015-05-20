<?php

class AppController extends Controller {

	var $uses = array('Facts','News','Testimonials');
	
	function getFacts(){	
		return $this->Facts->find(null,null,'rand()',1,null,null);
	}
        
        function getHomeNews(){	
		return $this->News->find('all', array('limit'=>2,'order' => array('News.id DESC')));
	}
        
        function getNews(){	
		return $this->News->find('all', array('limit'=>1,'order' => array('News.id DESC')));
	}
        
        function getTestimonials(){	
		return $this->Testimonials->find('all', array('limit'=>1,'order' => array('rand()')));
	}
        
        

}

function displayDate($tempDate, $format){
	date_default_timezone_set('America/Vancouver');
	$tempTime = strtotime($tempDate);
	$tempDate = date($format,$tempTime);
	
	return $tempDate;
}

function return_types(){
    
    return array(
        'Fact Sheet'=>'Fact Sheet',
        'Survey Results'=>'Survey Results',
        'Brochures'=>'Brochures',
        'Reports'=>'Reports',
        'Minutes'=>'Minutes',
        'Newsletter'=>'Newsletter',
        'Other'=>'Other'
        
        );
    
}
?>