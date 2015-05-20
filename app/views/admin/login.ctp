<?php echo $form->create('User', array('url' => array('controller' => 'admin', 'action' =>'login'))); ?>
		
		<table>
			<tr>
				<td>Email Address</td>
				<td><?php echo $form->input('User.email', array("label"=>false)); ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $form->input('User.password', array("label"=>false)); ?></td>
			</tr>
			<tr>
				<td></td>
				<td><?php echo $this->Form->submit('Login', array('class' => 'adminbutton', 'title' => 'Login')); ?></td>
			</tr>
		
		</table>