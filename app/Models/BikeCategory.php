<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeCategory extends Model
{
    use HasFactory;
    protected $primaryKey = 'categ_id';

    public function bikes()
    {
      return $this->hasMany('App\Models\Bikes');
    }
    
}
