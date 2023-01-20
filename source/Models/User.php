<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Source\Models\Address;

class User extends DataLayer
{
    public function __construct()
    {
        /**
         * $entity - Table name;
         * $required - Required columns;
         * $primary - Table primary key;
         * $timestamps - A boolean.
         */
        parent::__construct("users", ["first_name", "last_name"], "id", true);
    }

    public function addresses()
    {
        return (new Address())->find("user_id = :id", "id = {$this->id}")->fetch(true);
    }
}