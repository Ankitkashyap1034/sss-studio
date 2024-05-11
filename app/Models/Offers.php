<?php

namespace App\Models;

use App\Http\Controllers\Admin\CardTypeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offers extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'offers';
    protected $primarykey = 'id';
    protected $fillable = [
        'bank_id',
        'payment_platform_id',
        'description',
        'offer_stat_date',
        'offer_end_date',
        'min_amount',
        'aff_link',
        'active',
        'card_type_id'
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

    public function bank()
    {
        return $this->belongsTo(Bank::class,'bank_id','id');
    }
    
    public function payment_platform()
    {
        return $this->belongsTo(PaymentPlatforms::class,'payment_platform_id','id');
    }
    
    public function payment_patform_image()
    {
        $payment  = PaymentPlatforms::find($this->payment_platform_id);
        $path = 'storage/'.$payment->image;
        return asset($path);
    }

    public function get_all_cards_type()
    {
        return CardType::where('bank_id',$this->bank_id)->get();
    }
    
    public function card_type()
    {
        return CardType::where('bank_id',$this->bank_id)->pluck('card_type_name')->first();
    }

    public function notDeleteFullyKeepRecord()
    {
        $this->delete();
        return true;
    }
} 
