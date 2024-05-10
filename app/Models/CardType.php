<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    use HasFactory;
    protected $table = 'credit_cards_type';
    protected $primarykey = 'id';
    protected $fillable = [
        'card_type_name',
        'bank_id',
        'active'
    ];

    public function status()
    {
        if($this->active == '1'){
            return "<span class='text-primary'>Active</span>";
        }else{
            return "<span class='text-danger'>In active</span>";
        }
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class,'bank_id','id');
    }
    
}
