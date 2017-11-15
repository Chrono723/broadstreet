<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    protected $table = 'payment_infos';
    protected $fillable = [
        'country',
        'state',
        'street_address',
        'postcode',
        'email',
        'phone',
        'bic',
        'iban',
        'cc_expiration',
        'cc_number',
        'cc_type',
        'cc_name',
        'info_name',
        'user_id',
        'csv'
    ];

    public function user(){return $this -> belongsTo('App\User');}
}
