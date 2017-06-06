<?php
namespace App\Libraries\Chat;

class RolesManager {
    static public function getOwnerRoleCode()
    {
        return self::getRoleCode('owner');
    }

    static public function getAdminRoleCode(){
        return self::getRoleCode('admin');
    }

    static public function getUserRoleCode(){
        return self::getRoleCode('user');
    }

    static public function getRoleCode($key){
        switch ($key)
        {
            case 'owner':
                return 1;
            case 'admin':
                return 2;
            case 'user':
                return 3;
            default:
                throw new \InvalidArgumentException("$key is a Unknown Role");
        }
    }
}