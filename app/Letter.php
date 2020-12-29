<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Template;

class Letter extends Model
{
    protected $fillable = [
        'user_id', 'template_id', 'path', 'file_name', 'real_name'
    ];

    public function template() {
        return $this->belongsTo(Template::class);
    }
}
