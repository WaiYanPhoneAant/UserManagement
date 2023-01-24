<?php 

namespace model;
use db\query\QueryBuilder;
class Role {
    use QueryBuilder;
    protected $table='role';
}