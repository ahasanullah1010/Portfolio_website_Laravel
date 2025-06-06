<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'technologies', 'project_url', 'github_url', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
