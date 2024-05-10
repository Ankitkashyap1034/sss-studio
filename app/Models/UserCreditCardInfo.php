<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCreditCardInfo extends Model
{
    use HasFactory;

    protected $table = 'user_creadit_card_info';
    protected $primarykey = 'id';
    protected $fillable = [
        'user_id',
        'credit_card_type',
        'credit_card_bank'
    ];
}
