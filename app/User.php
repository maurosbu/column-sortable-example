<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class User extends Model
{

    use Sortable;

    /**
     * The attributes that may be sorted by.
     *
     * @var array
     */
    public $sortable = ['id', 'name', 'created_at', 'updated_at', 'email'];

    /**
     * The array of aliases that may be used during sorting.
     *
     * @var array
     */
    public $sortableAs = [
        'nick_name',
        'projects_count',
        'top_rating_projects_count',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
    ];


    public function getDatesAttribute()
    {
        return $this->created_at.' '.$this->updated_at;
    }


    public function addressSortable($query, $direction)
    {
        return $query->join('user_details', 'users.id', '=', 'user_details.user_id')->orderBy('address', $direction)
                     ->select('users.*');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany(UserDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
