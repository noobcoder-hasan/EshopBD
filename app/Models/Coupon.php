<?php
// app/Models/Coupon.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons'; 

    protected $fillable = [
        'code',
        'discount_percentage',
        'valid_from',
        'valid_until',
    ];
}
