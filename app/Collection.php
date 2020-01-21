<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Artifact;
use App\User;
use App\Label;



class Collection extends Model
{

	//protected $dateFormat = 'U';
     public function curators()
    
    {
         return $this->belongsToMany(User::class)->withPivot('position');
    }

    public function artifacts()
    {
         
         // testing using a model on the pivot table artifact_collection

         // return $this->belongsToMany(Artifact::class)->using('App\Label')->withPivot('position','title','medium','year','dimensions_height','dimensions_width','dimensions_depth','dimensions_units')->orderBy('position', 'asc');

         return $this->belongsToMany(Artifact::class)->withPivot('position','title','medium','year','dimensions_height','dimensions_width','dimensions_depth','dimensions_units')->orderBy('position', 'asc');
    }

}