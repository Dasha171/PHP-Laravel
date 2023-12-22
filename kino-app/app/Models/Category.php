<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    public $timestamps = false;


    public function categories(){
        return $this->hasMany(Category::class, foreignKey:'parent_id', localKey:'id') ;
    }

    public function parent(){
        return $this->belongsTo(Category::class, foreignKey:'parent_id', ownerKey: 'id' );
    }

    public function films(){
        return $this->belongsToMany(Film::class, 'category_films');
    }

}
