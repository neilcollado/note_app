<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['name','due_date','status','priority','userId'];

    public function items()
   	{
   		return $this->hasMany(Item::class);
   	}
    protected $dates = ['due_date'];
   	protected $casts = [
   		'due_date' => 'datetime:Y-m-d\TH:'
   	];
}
