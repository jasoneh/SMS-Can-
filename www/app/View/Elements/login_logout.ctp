<?
    $user = $this->requestAction('users/loggedin');
    if(!empty($user)){
        echo "logout";
    }else{
        echo "login";
    }