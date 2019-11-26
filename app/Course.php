<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
     
     /**
     * A course is offered at a specific educational site.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
    
    /**
     * A course is offered at a specific educational site.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
