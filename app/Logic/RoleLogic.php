<?php

namespace App\Logic;

class RoleLogic
{

    function __construct($user)
    {
        // The User for which we are checking roles
        $this->user = $user;
    }

    /**
     * roleCount
     *
     * @param array $roles
     * @return int
     */
    private function roleCount(object $roles)
    {
        return count($roles);
    }

    /**
     * isRole
     *
     * @param string $roleToCheck
     * @return boolean
     */
    public function isRole(string $roleToCheck)
    {
        if ($this->roleCount($this->user->roles) > 1) {
            foreach ($this->user->roles as $role) {
                if (data_get($role, 'name') == $roleToCheck) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            if (data_get($this->user->roles, 'name') == $roleToCheck) {
                return true;
            } else {
                return false;
            }
        }
    }
}
