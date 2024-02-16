<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'forms';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'module',
        'url_form',
        'expiration_date_url',
        'module_date_fin',
        'class'
    ];

    // Relation avec la table questions
    public function questions()
    {
        return $this->hasMany(Question::class, 'form_id', 'idform');
    }
}
