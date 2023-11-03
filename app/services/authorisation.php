<?php

use App\Models\User;


class AuthorizeUser{
public function DeleteUser( $gate){
    $gate->define('can-delete-product',function(User $user){
        return $user->is_admin = true;
        });
}
}
