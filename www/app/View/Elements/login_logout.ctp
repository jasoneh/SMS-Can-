<?
    $username = $this->requestAction('users/loggedin');
    if(!empty($username)):
        $action_name = 'logout';
    else:
        $action_name = 'login';
    endif;
?>

<li><? echo $this->Html->link($action_name , array('controller' => 'users' , 'action' => $action_name)); ?></li>
