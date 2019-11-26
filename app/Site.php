<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','nickname'
    ];

    /**
     * A site has many associated students.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(User::class)->role('student');
    }

        /**
     * A site has many associated users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

       /**
     * A site has many associated administrators.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teachers()
    {
        return $this->belongsToMany(User::class)->role('teacher');
    }
      /**
     * A site has many associated administrators.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function admins()
    {
        return $this->belongsToMany(User::class)->role('admin');
    }

     public function courses()
    {
        return $this->hasMany(Course::class);
    }

      public function sections()
    {
        return $this->hasManyThrough(Section::class, Course::class);
    }

      public function collections()
    {
        return $this->hasMany(Collection::class);
    }
  
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
