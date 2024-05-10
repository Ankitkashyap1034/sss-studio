<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentPlatforms extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'payment_platforms';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
        'image',
        'active'
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
        return $this->hasMany(Offers::class,'payment_platform_id','id');
    }
}
