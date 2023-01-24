<?php 

namespace model;
use db\query\QueryBuilder;
class User {
    use QueryBuilder;
    protected $table='users';
}