<?php 
require_once('Model.php');
class Produit extends Model
{
    protected $table = 'produit';

    protected $fillable = ['name', 'full_name', 'email', 'choix', 'message', 'user_id'];    
    protected $relations = [
        [
            'foreign_key' => 'user_id',
            'table' => 'users'
        ],
    ];
}