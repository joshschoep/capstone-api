<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $with = ['user', 'section'];

    protected $fillable = ['headline', 'short', 'content', 'user_id'];

    protected $casts = [
        'created_at' => 'datetime:U',
        'updated_at' => 'datetime:U',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
