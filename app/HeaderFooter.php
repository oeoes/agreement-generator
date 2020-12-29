<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderFooter extends Model
{
    protected $fillable = ['name', 'desc', 'header_image', 'footer_image'];
}
