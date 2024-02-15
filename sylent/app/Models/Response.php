<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';
    public $timestamps = false;

    protected $fillable = [
        'idresponse',
        'response',
        'question_id',
    ];

    // Relation avec la table questions
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
