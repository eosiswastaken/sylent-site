<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    public $timestamps = false;

    protected $fillable = [
        'idquestion',
        'title_question',
        'form_id'
    ];

    // Relation avec la table form
    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    // Relation avec la table responses
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}