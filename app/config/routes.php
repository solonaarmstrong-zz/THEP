<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));


$aUri = explode('/', $_GET['url']);
$bControllerDash = strpos($aUri[0], '-');
$bActionDash = isset($aUri[1]) && strpos($aUri[1], '-');
if ($bControllerDash || $bActionDash) {
    $sController = ($bControllerDash) ? str_replace('-', '_', $aUri[0]) : $aUri[0];
    $sAction = ($bActionDash) ? Inflector::variable(str_replace('-', '_', $aUri[1])) : 'index';
    Router::connect('/' . $aUri[0] . (isset($aUri[1]) ? '/' . $aUri[1] . '/*' : ''), array(
        'controller' => $sController,
        'action' => $sAction
    ));
}



        Router::connect('/', array('controller' => 'home', 'action' => 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'home'));
