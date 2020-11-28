<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class OrderManagement extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'order_managements';

    protected $dates = [
        'time_needed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order',
        'username',
        'address',
        'price',
        'delivery_charge',
        'tax',
        'total',
        'comment',
        'merchant_id',
        'payment_method_id',
        'status_id',
        'voucher_used',
        'voucher_id',
        'order_type_id',
        'time_needed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function generateTwoFactorCode()
    {
        $this->timestamps            = false;
        $this->two_factor_code       = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(15)->format(config('panel.date_format') . ' ' . config('panel.time_format'));
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps            = false;
        $this->two_factor_code       = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function merchant()
    {
        return $this->belongsTo(MerchantManagement::class, 'merchant_id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function voucher()
    {
        return $this->belongsTo(AddVoucher::class, 'voucher_id');
    }

    public function order_type()
    {
        return $this->belongsTo(OrderType::class, 'order_type_id');
    }

    public function getTimeNeededAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTimeNeededAttribute($value)
    {
        $this->attributes['time_needed'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
