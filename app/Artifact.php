<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Label;


class Artifact extends Model
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [];

    protected $dates = [
        'created_at','updated_at','date_due',
    ];

    /**
     * An artifact was created by a user. 
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * An artifact may have been created as an assignment for a section. 
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
    /**
     * An artifact may have been created as an assignment for a section. 
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    /**
     * An artifact may belong to many collections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function component()
    
    {
        return $this->belongsTo('App\Component');
    }

    /**
     * An artifact may belong to many collections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function collections()
    {
        // testing using a model on the pivot table artifact_collection

        // return $this->belongsToMany(Collection::class)->using('App\Label')->withPivot('position','description','dimensions_height','dimensions_width','dimensions_depth','dimensions_units');

        return $this->belongsToMany(Collection::class)->withPivot('position','dimensions_height','dimensions_width','dimensions_depth','dimensions_units');

    }

    /**
     * An artifact can have many comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    /**
     * Add a comment to the post.
     *
     * @param array $attributes
     */
    public function addComment($attributes)
    {
        $comment = (new Comment)->forceFill($attributes);
        $comment->user_id = auth()->id();
        return $this->comments()->save($comment);
    }
    
}



