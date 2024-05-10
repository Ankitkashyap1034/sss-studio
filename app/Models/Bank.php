<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'bank';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'image',
        'active',
        'code'
    ];

    public function get_image()
    {
        $path = 'storage/'.$this->image;
        return asset($path);
    }

    public function status()
    {
        if($this->active == '1'){
            return "<span class='text-primary'>Active</span>";
        }else{
            return "<span class='text-danger'>In active</span>";
        }
    }

    public function offer()
    {
        return $this->hasMany(Offers::class,'bank_id','id');
    }
    
    public function cardType()
    {
        return $this->hasMany(CardType::class,'bank_id','id');
    }
}

