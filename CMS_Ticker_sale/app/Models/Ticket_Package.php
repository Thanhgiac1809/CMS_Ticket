<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_Package extends Model
{
    use HasFactory;
    protected $table = 'ticket_packages';
    protected $primaryKey = 'ticketid';
    protected $fillable = [
        'package_code',
        'package',
        'date_range',
        'expiration_date',
        'granttime',
        'expiry',
        'retail_price',
        'combo_price',
        'quantity',
        'status',
    ];
}
