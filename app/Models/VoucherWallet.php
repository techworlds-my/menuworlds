<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class VoucherWallet extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'voucher_wallets';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'username_id',
        'is_redeem',
        'voucher_id',
        'usage',
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

    public function username()
    {
        return $this->belongsTo(MerchantManagement::class, 'username_id');
    }

    public function voucher()
    {
        return $this->belongsTo(AddVoucher::class, 'voucher_id');
    }
}
