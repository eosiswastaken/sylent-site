<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'responses';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'response',
        'question_id',
    ];

    // Relation avec la table questions
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
