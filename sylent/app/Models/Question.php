<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'questions';

    public $timestamps = false;

    protected $fillable = [
        'id',
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
        return $this->hasMany(Response::class, 'question_id', 'id');
    }
}