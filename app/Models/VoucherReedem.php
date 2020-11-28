<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class VoucherReedem extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'voucher_reedems';

    protected $dates = [
        'redeem_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'voucher_code_id',
        'username_id',
        'merchant_id',
        'redeem_date',
        'amount',
        'type',
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

    public function voucher_code()
    {
        return $this->belongsTo(AddVoucher::class, 'voucher_code_id');
    }

    public function username()
    {
        return $this->belongsTo(User::class, 'username_id');
    }

    public function merchant()
    {
        return $this->belongsTo(MerchantManagement::class, 'merchant_id');
    }

    public function getRedeemDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setRedeemDateAttribute($value)
    {
        $this->attributes['redeem_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
