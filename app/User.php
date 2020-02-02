<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

public function getFullNameAttribute()
    {
        return ucfirst($this->firstName).' '.ucfirst($this->lastName);
    }

public function getInitialsAttribute()
    {
        return substr( $this->firstName , 0 , 1).''.substr( $this->lastName , 0 , 1);
    }

    /**
     * A user may belong to multiple sites.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sites()
    {
        return $this->belongsToMany(Site::class);
    }

    /**
     * A user may belong to multiple sections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sections()
    {
        return $this->belongsToMany(Section::class)->orderby('created_at', 'DESC');;
    }

    /**
     * A user may belong to multiple active sections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function activeSections()
    {
        return $this->belongsToMany(Section::class)->where('is_active', 1 )->orderby('created_at', 'DESC');
    }

    /**
     * A user may belong to multiple active sections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function inactiveSections()
    {
        return $this->belongsToMany(Section::class)->where('is_active', 0 )->orderby('created_at', 'DESC');
    }

    /*
     * A user may post multiple artifacts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function artifacts()
    {
        return $this->hasMany(Artifact::class)->orderBy('created_at', 'ASC');
    }

    /*
     * A user may post multiple comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

     /*
     * A user may create multiple collections.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function collections()
    {
        return $this->belongsToMany(Collection::class)->withPivot('position')
        ->orderBy('position');
    }
}


