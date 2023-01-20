<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Address extends DataLayer
{
    public function __construct()
    {
        /**
         * $entity - Table name;
         * $required - Required columns;
         * $primary - Table primary key;
         * $timestamps - A boolean.
         */
        parent::__construct("addresses", ["user_id"], "id", true);
    }

    public function add(User $user, string $street, string $number): Address
    {
        $this->user_id = $user->id;
        $this->street = $street;
        $this->number = $number;

        return $this;
    }
}