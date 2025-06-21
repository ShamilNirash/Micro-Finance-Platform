<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'number';


    protected $fillable = [
        'amount',
        'bill_image',
        'installment_number',
        'payed_date',
        'pay_in_date',
        'date_and_time',
        'status',
        'loan_id'
    ];
    function loan()
    {
        return $this->belongsTo('App\Models\Loan', 'loan_id', 'id');
    }
}
