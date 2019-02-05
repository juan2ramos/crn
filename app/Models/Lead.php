<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    public $fillable = ['budget', 'project_description', 'name', 'name_company', 'url_website', 'email', 'phone', 'how_find'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
