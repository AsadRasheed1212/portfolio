<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['title','category','description','thumbnail','url','tech_stack','featured'];
    protected $casts    = ['tech_stack' => 'array', 'featured' => 'boolean'];
}