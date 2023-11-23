<?php
 require_once('Model.php');
class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = ['produit_id',  'user_id', 'messages'];
    
    protected $relations = [
        [
            'foreign_key' => 'produit_id',
            'table' => 'produit',
        ],
        [
            'foreign_key' => 'user_id',
            'table' => 'users'
        ],
    ];
}