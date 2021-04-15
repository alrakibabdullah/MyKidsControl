<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentTransaction extends Model
{
    use HasFactory;
    public function parent(){
        return $this->belongsTo(Customer::class,'parent_id');
    }
}
