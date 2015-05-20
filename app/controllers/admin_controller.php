<?php
class AdminController extends AppController {
	var $name = 'Admin';
	var $uses = array('User','News','Events','Facts','Resources','Content','Faqs','Testimonials','Documents','Documentrevisions','Documentcomments','Categories');
	var $helpers = array('Html', 'Form', 'UploadPack.Upload','javascript');
	
	
	 var $components = array('Auth'	);
	 //var $components = array('Acl', 'Auth');
	var $user_info = array();
	
		
    function beforeFilter() {
                global $user_info;
		parent::beforeFilter();	
		$this->layout = 'admin';
		
		//$this->Auth->authorize = 'actions';
                $this->Auth->loginAction = array('controller' => 'admin', 'action' => 'login', 'plugin' => null);
		$this->Auth->loginRedirect = '/admin/';
		$this->Auth->logoutRedirect = '/admin/login/';
		$this->Auth->fields = array('username' => 'email', 'password' => 'password');
		$this->Auth->allowedActions = array('login');
		
		$uid = $this->Auth->user('id');
                $user_info = $this->User->read(null, $uid);
                $user_info = $user_info['User'];
                $this->set('user_info', $user_info);
    }
	
	function login() {
	}
	 
	function logout() {
		$this->redirect($this->Auth->logout());
	}
    
			
	function index(){
		
	}
        
        function forum(){
            $category = '';
            if (isset($this->data['Documents']['category'])){
                $category = $this->data['Documents']['category'];
            }
            if ($category != null and $category != ''){
                $this->paginate = array('conditions' => array('Documents.category'=>$category), 'order' => 'Documents.date DESC');
                $rows = $this->paginate('Documents');
            }else{
                $this->paginate = array('order' => 'Documents.date DESC');
                $rows = $this->paginate('Documents');
            }
            
            foreach ($rows as $i => $row){
                $activedocument = $this->Documentrevisions->find('first', array('conditions' => array('Documentrevisions.documentid'=> $row['Documents']['id']),'order' => array('Documentrevisions.date desc','Documentrevisions.id desc')));
                $rows[$i]['activedocument'] = $activedocument;
                $last_user_id = $activedocument['Documentrevisions']['userid'];
                
                if ($activedocument['Documentrevisions']['documentrevisions_file_name'] == ''){
                    
                    $sql = "select documentrevisions_file_name, id from documentrevisions where documentrevisions_file_name <> '' and documentid = '".$row['Documents']['id']."' order by date desc, id desc limit 0,1;";
                    
                    
                    $filedocument = $this->Documentrevisions->query($sql);
                    if (count($filedocument) > 0){
                        //echo('getting file name '.$filedocument[0]['documentrevisions']['documentrevisions_file_name']);
                        //$activedocument['Documentrevisions']['documentrevisions_file_name'] = $filedocument[0]['documentrevisions']['documentrevisions_file_name'];
                        $rows[$i]['activedocument']['Documentrevisions']['documentrevisions_file_name'] = $filedocument[0]['documentrevisions']['documentrevisions_file_name'];
                        $rows[$i]['activedocument']['Documentrevisions']['id'] = $filedocument[0]['documentrevisions']['id'];
                    }
                    //var_dump($filedocument);
                }
                //echo('Last User = '.$last_user_id."<br />");
                
                $lastuser = $this->User->find('first', array('conditions'=>array('User.id'=>$last_user_id)));
                $rows[$i]['lastuser'] = $lastuser;
                
            }
            
            $this->set('rows', $rows);
//            
//            $documents = $this->Documents->find('all', array('order'=>array('Documents.date desc')));
//            $this->set('documents',$documents);
            $categories_array = $this->Categories->find('all',array('order'=>array('Categories.category')));
            $temp = array();
            $temp[''] = 'All Categories';
            foreach ($categories_array as $row){
                $temp[$row['Categories']['category']] = $row['Categories']['category'];
            }

            $this->set('categories', $temp);
            
        }
        
        function forumnew(){
                global $user_info;
		if (!empty($this->data)) {
			$this->Documents->create();
			if ($this->Documents->saveAll($this->data)) {
                            
                            $id = $this->Documents->getInsertID();
                            //send notifications
                            $user = $this->User->find('first', array('conditions' => array('User.id'=>$user_info['id'])));
                            $user_name = $user['User']['firstname'].' '.$user['User']['lastname'];
                            
                            $emails = $this->User->find('all', array('conditions' => array('User.notificationdocument'=>'yes')));
                            foreach($emails as $row){
                                $email = $row['User']['email'];
                                $name = $row['User']['firstname'];
                                
                                $message = 'Dear '.$name.',
A new Forum was created at http://thep.ca/admin/forum

Title: '.$this->data['Documents']['title'].'
Description: '.$this->data['Documents']['description'].'
User: '.$user_name.'

THEP User forum';
                                
                                $subject = 'THEP User forum - New Form Created';
                                
                                mail($email,$subject,$message,'from: system@thep.ca');
                            }
                            
				$this->redirect(array('action'=>'forumview',$id));
			} else {
				
			}
		}
                $categories_array = $this->Categories->find('all',array('order'=>array('Categories.category')));
                $temp = array();
                foreach ($categories_array as $row){
                    $temp[$row['Categories']['category']] = $row['Categories']['category'];
                }

                $this->set('categories', $temp);
	}
        
        function forumdelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'forum'));
		}
		if($this->data['Documents']['deleteforum'] == "true"){ 
			if ($this->Documents->delete($this->data['Documents']['id'])) {
				$this->redirect(array('action'=>'forum'));
			}
		}else{
			$this->set('documents', $this->Documents->read(null, $id));
		}
	}
        
        function forumview($id = null, $action = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'forum'));
		}
                if ($action == 'deleteforum'){
                    $this->data = $this->Documents->read(null, $id);
                    $this->Documents->saveAll($this->data);
                    $sql = "delete from documentrevisions where documentid = '".$id."';";
                    $this->Documentrevisions->query($sql);
                }
		if (!empty($this->data)) {
			if ($this->Documents->saveAll($this->data)) {
				$this->redirect(array('action'=>'forum'));
			} else {
				
			}
		}else{
			//$this->data = $this->Documents->read(null, $id);
			$this->set('documents', $this->Documents->read(null, $id));
                        $sql = "Select Documentrevisions.*, Users.firstname, Users.lastname from documentrevisions as Documentrevisions, users as Users where Documentrevisions.documentid = '".$id."' and Documentrevisions.userid = Users.id order by Documentrevisions.date desc, Documentrevisions.id desc;";
                        $documentrevisions = $this->Documentrevisions->query($sql);
                        $this->set('documentrevisions', $documentrevisions);
                        
                        $sql = "Select Documentcomments.*, Users.firstname, Users.lastname from documentcomments as Documentcomments, users as Users where Documentcomments.userid = Users.id and Documentcomments.revisionid in (select id from documentrevisions where documentid = ".$id.") order by Documentcomments.id;";
                        $documentcomments = $this->Documentrevisions->query($sql);
                        $this->set('documentcomments', $documentcomments);
                        
		}
                $categories_array = $this->Categories->find('all',array('order'=>array('Categories.category')));
                $temp = array();
                foreach ($categories_array as $row){
                    $temp[$row['Categories']['category']] = $row['Categories']['category'];
                }
                $this->set('categories', $temp);
	}
        
        function forumnewdoc(){
                global $user_info;
		if (!empty($this->data)) {
			$this->Documentrevisions->create();
                        $this->data['Documentrevisions']['date'] = date('Y-m-d');
                        $this->data['Documentrevisions']['userid'] = $user_info['id'];
			if ($this->Documentrevisions->saveAll($this->data)) {
                            //var_dump($this->data['Documentrevisions']['documentrevisions']);
                            //send notifications
                            $user = $this->User->find('first', array('conditions' => array('User.id'=>$user_info['id'])));
                            $user_name = $user['User']['firstname'].' '.$user['User']['lastname'];
                            
                            $emails = $this->User->find('all', array('conditions' => array('User.notificationrevision'=>'yes')));
                            foreach($emails as $row){
                                $email = $row['User']['email'];
                                $name = $row['User']['firstname'];
                                
                                $message = 'Dear '.$name.',
A new document has been added to the Forum at http://thep.ca/admin/forum

Document: '.$this->data['Documentrevisions']['documentrevisions']['name'].'
Comments: '.$this->data['Documentrevisions']['comments'].'
User: '.$user_name.'
    
THEP User forum';
                                
                                $subject = 'THEP User forum - New Document Uploaded';
                                
                                mail($email,$subject,$message,'from: system@thep.ca');
                            }
                            
                            
				$this->redirect(array('action'=>'forumview',$this->data['Documentrevisions']['documentid']));
			} else {
				
			}
		}
                //$this->set('types', return_types());
	}
        
        function forumnewcomment(){
                global $user_info;
                $this->layout = false;
                global $user_info;
		if (!empty($this->data)) {
			$this->Documentrevisions->create();
                        $this->data['Documentcomments']['date'] = date('Y-m-d G:i:s');
                        $this->data['Documentcomments']['userid'] = $user_info['id'];
			if ($this->Documentcomments->saveAll($this->data)) {
                            //send notifications
                            $user = $this->User->find('first', array('conditions' => array('User.id'=>$user_info['id'])));
                            $user_name = $user['User']['firstname'].' '.$user['User']['lastname'];
                            
                            $emails = $this->User->find('all', array('conditions' => array('User.notificationcomment'=>'yes')));
                            foreach($emails as $row){
                                $email = $row['User']['email'];
                                $name = $row['User']['firstname'];
                                
                                $message = 'Dear '.$name.',

A new Comment was added to a document at http://thep.ca/admin/forum

Comment: '.$this->data['Documentcomments']['comment'].'
User: '.$user_name.'

THEP User forum';
                                
                                $subject = 'THEP User forum - New Comment';
                                
                                mail($email,$subject,$message,'from: system@thep.ca');
                            }
			} else {
				
			}
		}
                //$this->set('types', return_types());
	}
	
	function users(){
                global $user_info;
                if ($user_info['usertype'] != 'Admin'){
                    header('location: /admin/');
                }
		$users = $this->User->find('all', array('order' => array('User.firstname','User.lastname')));
		$this->set('users', $users);
	}
        
        function categories(){
            $categories = $this->Categories->find('all', array('order' => array('Categories.category')));
            $this->set('rows', $categories);
        }
        
        function categorynew(){
		if (!empty($this->data)) {
                    
                    $this->Categories->set( $this->data );
                    if ($this->Categories->save($this->data)) {
                            $this->redirect(array('action'=>'categories'));
                    } else {
                            //$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
                    }
                    
		}
		
	}
        
        function categoryedit($id){
		
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'categories'));
		}
		if (!empty($this->data)) {
		
                        $oldcategory = $this->Categories->read(null, $id);
			$this->Categories->set( $this->data );

                        if ($this->Categories->saveAll($this->data, array('validate' => false))) {
                                
                                $sql = "update documents set category = '".$this->data['Categories']['category']."' where category = '".$oldcategory['Categories']['category']."';";
                                $this->Categories->query($sql);
                                $this->redirect(array('action'=>'categories'));
                        }
			
		}else{
			$this->data = $this->Categories->read(null, $id);
			$this->set('categories', $this->Categories->read(null, $id));
		}
		
		
//		$categories = $this->Categories->find('first', array('conditions' => array('Categories.id'=> $id)));
//		$this->set('categories', $categories);
	}
        
        function categorydelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'categories'));
		}
		if($this->data['Categories']['deletecategory'] == "true"){ 
			if ($this->Categories->delete($this->data['Categories']['id'])) {
				$sql = "update documents set category = '".$this->data['Categories']['category']."' where id = '".$this->data['Categories']['id']."';";
                                $this->Categories->query($sql);
                                $this->redirect(array('action'=>'categories'));
			}
		}else{
			$this->set('category', $this->Categories->read(null, $id));
                        $categories_array = $this->Categories->find('all',array('order'=>array('Categories.category')));
                        $temp = array();
                        foreach ($categories_array as $row){
                            $temp[$row['Categories']['category']] = $row['Categories']['category'];
                        }
                        $this->set('categories', $temp);
		}
	}
	
	function userdelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'users'));
		}
		if($this->data['User']['deleteuser'] == "true"){ 
			if ($this->User->delete($this->data['User']['id'])) {
				$this->redirect(array('action'=>'users'));
			}
		}else{
			$this->set('user', $this->User->read(null, $id));
		}
	}
	
	function useredit($id){
		
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
		
			$this->User->set( $this->data );
			//if ($this->User->validates(array('fieldList' => array('firstname', 'lastname','email','passwordplain')))) {
                        if ($this->User->validates(array('fieldList' => array('firstname', 'lastname','email')))) {
				$password = $this->data['User']['passwordplain']; 
				if ($password != '' && $password != null){
					$password = $this->Auth->password($password); 
					$this->data['User']['password'] = $password;
				}
				if ($this->User->saveAll($this->data, array('validate' => false))) {
					$this->redirect(array('action'=>'users'));
				}
			} else {
			// invalid
				//$this->data = $this->User->read(null, $id);
				//$this->set('user', $this->User->read(null, $id));
			}
			
		}else{
			$this->data = $this->User->read(null, $id);
			$this->set('user', $this->User->read(null, $id));
		}
		
		
		$user = $this->User->find('first', array('conditions' => array('User.id'=> $id)));
		$this->set('user', $user);
	}
	
	function usernew(){
		if (!empty($this->data)) {
                    
                    $this->User->set( $this->data );
			if ($this->User->validates(array('fieldList' => array('firstname', 'lastname','email','passwordplain')))) {
                            $password = $this->data['User']['passwordplain']; 
                            $password = $this->Auth->password($password); 
                            $this->data['User']['password'] = $password; 
                            $this->User->create();
                            if ($this->User->save($this->data)) {
                                    $this->redirect(array('action'=>'users'));
                            } else {
                                    //$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
                            }
                        }
		}
		
	}
	
	function news(){
		$this->News->recursive = 1;
		$rows = $this->paginate('News');
		$this->set('rows', $rows);
	}
	
	function newsnew(){
		if (!empty($this->data)) {
			$this->News->create();
			if ($this->News->saveAll($this->data)) {
				$this->redirect(array('action'=>'news'));
			} else {
				
			}
		}
	}
	
	function newsedit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'news'));
		}
		if (!empty($this->data)) {
			if ($this->News->saveAll($this->data)) {
				$this->redirect(array('action'=>'news'));
			} else {
				
			}
		}else{
			$this->data = $this->News->read(null, $id);
			$this->set('news', $this->News->read(null, $id));
		}
	}
	
	function newsdelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'news'));
		}
		if($this->data['News']['deletenews'] == "true"){ 
			if ($this->News->delete($this->data['News']['id'])) {
				$this->redirect(array('action'=>'news'));
			}
		}else{
			$this->set('news', $this->News->read(null, $id));
		}
	}
        
        function testimonials(){
		$this->Testimonials->recursive = 1;
		$rows = $this->paginate('Testimonials');
		$this->set('rows', $rows);
	}
	
	function testimonialsnew(){
		if (!empty($this->data)) {
			$this->Testimonials->create();
			if ($this->Testimonials->saveAll($this->data)) {
				$this->redirect(array('action'=>'testimonials'));
			} else {
				
			}
		}
	}
	
	function testimonialsedit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'testimonials'));
		}
		if (!empty($this->data)) {
			if ($this->Testimonials->saveAll($this->data)) {
				$this->redirect(array('action'=>'testimonials'));
			} else {
				
			}
		}else{
			$this->data = $this->Testimonials->read(null, $id);
			$this->set('testimonials', $this->Testimonials->read(null, $id));
		}
	}
	
	function testimonialsdelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'testimonials'));
		}
		if($this->data['Testimonials']['deletetestimonials'] == "true"){ 
			if ($this->Testimonials->delete($this->data['Testimonials']['id'])) {
				$this->redirect(array('action'=>'testimonials'));
			}
		}else{
			$this->set('testimonials', $this->Testimonials->read(null, $id));
		}
	}
        
        function faqs(){
		$this->Faqs->recursive = 1;
		$rows = $this->paginate('Faqs');
		$this->set('rows', $rows);
	}
	
	function faqsnew(){
		if (!empty($this->data)) {
			$this->Faqs->create();
			if ($this->Faqs->saveAll($this->data)) {
				$this->redirect(array('action'=>'faqs'));
			} else {
				
			}
		}
	}
	
	function faqsedit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'faqs'));
		}
		if (!empty($this->data)) {
			if ($this->Faqs->saveAll($this->data)) {
				$this->redirect(array('action'=>'faqs'));
			} else {
				
			}
		}else{
			$this->data = $this->Faqs->read(null, $id);
			$this->set('faqs', $this->Faqs->read(null, $id));
		}
	}
	
	function faqsdelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'faqs'));
		}
		if($this->data['Faqs']['deletefaqs'] == "true"){ 
			if ($this->Faqs->delete($this->data['Faqs']['id'])) {
				$this->redirect(array('action'=>'faqs'));
			}
		}else{
			$this->set('faqs', $this->Faqs->read(null, $id));
		}
	}
        
        function resources(){
		$this->Resources->recursive = 1;
		$rows = $this->paginate('Resources');
		$this->set('rows', $rows);
	}
	
	function resourcesnew(){
		if (!empty($this->data)) {
			$this->Resources->create();
			if ($this->Resources->saveAll($this->data)) {
				$this->redirect(array('action'=>'resources'));
			} else {
				
			}
		}
                $this->set('types', return_types());
	}
	
	function resourcesedit($id = null, $action = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'resources'));
		}
                if ($action == 'deletefile'){
                    $this->data = $this->Resources->read(null, $id);
                    $this->data['Resources']['resource_file_name'] = '';
                    $this->Resources->saveAll($this->data);
                }
		if (!empty($this->data)) {
			if ($this->Resources->saveAll($this->data)) {
				$this->redirect(array('action'=>'resources'));
			} else {
				
			}
		}else{
			$this->data = $this->Resources->read(null, $id);
			$this->set('resources', $this->Resources->read(null, $id));
		}
                $this->set('types', return_types());
	}
	
	function resourcesdelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'resources'));
		}
		if($this->data['Resources']['deleteresources'] == "true"){ 
			if ($this->Resources->delete($this->data['Resources']['id'])) {
				$this->redirect(array('action'=>'resources'));
			}
		}else{
			$this->set('resources', $this->Resources->read(null, $id));
		}
	}
        
        function facts(){
		$this->Facts->recursive = 1;
		$rows = $this->paginate('Facts');
		$this->set('rows', $rows);
	}
	
	function factsnew(){
		if (!empty($this->data)) {
			$this->Facts->create();
			if ($this->Facts->saveAll($this->data)) {
				$this->redirect(array('action'=>'facts'));
			} else {
				
			}
		}
	}
	
	function factsedit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'facts'));
		}
		if (!empty($this->data)) {
			if ($this->Facts->saveAll($this->data)) {
				$this->redirect(array('action'=>'facts'));
			} else {
				
			}
		}else{
			$this->data = $this->Facts->read(null, $id);
		}
	}
	
	function factsdelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'facts'));
		}
		if($this->data['Facts']['deletefacts'] == "true"){ 
			if ($this->Facts->delete($this->data['Facts']['id'])) {
				$this->redirect(array('action'=>'facts'));
			}
		}else{
			$this->set('facts', $this->Facts->read(null, $id));
		}
	}
	
        
        function events(){
		$this->Events->recursive = 1;
		$rows = $this->paginate('Events');
		$this->set('rows', $rows);
	}
	
	function eventsnew(){
		if (!empty($this->data)) {
			$this->Events->create();
			if ($this->Events->saveAll($this->data)) {
				$this->redirect(array('action'=>'events'));
			} else {
				
			}
		}
	}
	
	function eventsedit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'events'));
		}
		if (!empty($this->data)) {
			if ($this->Events->saveAll($this->data)) {
				$this->redirect(array('action'=>'events'));
			} else {
				
			}
		}else{
			$this->data = $this->Events->read(null, $id);
			$this->set('events', $this->Events->read(null, $id));
		}
	}
	
	function eventsdelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'events'));
		}
		if($this->data['Events']['deleteevents'] == "true"){ 
			if ($this->Events->delete($this->data['Events']['id'])) {
				$this->redirect(array('action'=>'events'));
			}
		}else{
			$this->set('events', $this->Events->read(null, $id));
		}
	}
        	
	function content(){
		$content = $this->Content->find('all', array('order' => array('Content.section','Content.page')));
		$this->set('rows', $content);
	}
	
	function contentadmin(){
		$content = $this->Content->find('all');
		$this->set('rows', $content);
	}
	
	function contentedit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'content'));
		}
		if (!empty($this->data)) {
			$content = $this->data['Content']['pagecontent']; 
			$page = $this->Content->read(null, $id);
			
			$file = $page["Content"]["file"];
			$directory = str_replace("/webroot", "", $_SERVER['DOCUMENT_ROOT']);
                        $directory = $_SERVER['DOCUMENT_ROOT'].'/app/views/';
                        $file_path = $directory.$file.".ctp";

			
			
			$fh = fopen($file_path, 'w') or die("can't open file");
			fwrite($fh, $content);
			fclose($fh);

			$this->redirect(array('action'=>'content'));
			
			//die($content);
		}else{
			$this->set('content', $this->Content->read(null, $id));
			
		}
	}
	
	function contentadmindelete($id = null){
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'content'));
		}
		if($this->data['Content']['deletecontent'] == "true"){ 
			if ($this->Content->delete($this->data['Content']['id'])) {
				$this->redirect(array('action'=>'contentadmin'));
			}
		}else{
			$this->set('content', $this->Content->read(null, $id));
		}
	}
	
	
	function contentadminnewpage(){
		if (!empty($this->data)) {
			$this->Content->create();
			if ($this->Content->save($this->data)) {
				$this->redirect(array('action'=>'contentadmin'));
			} else {
				//$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		
	}
	
	function contentadminedit($id = null) {
		if (!$id && empty($this->data)) {
			$this->redirect(array('action'=>'contentadmin'));
		}
		if (!empty($this->data)) {
		
			$this->Content->set( $this->data );
			
				if ($this->Content->saveAll($this->data, array('validate' => false))) {
					$this->redirect(array('action'=>'contentadmin'));
				}
			
		}else{
			$this->data = $this->Content->read(null, $id);
			$this->set('content', $this->Content->read(null, $id));
		}
		
		
		$user = $this->User->find('first', array('conditions' => array('User.id'=> $id)));
		$this->set('user', $user);
	}
	
}
?>