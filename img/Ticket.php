<?php

namespace App\Models;

use App\Models\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = ['sujet', 'appli', 'departement', 'fichier', 'statut', 'user_id'];

    protected $relations = [
        [
            'foreign_key' => 'departement',
            'table' => 'departements'
        ],
        [
            'foreign_key' => 'user_id',
            'table' => 'users'
        ],
    ];
}
