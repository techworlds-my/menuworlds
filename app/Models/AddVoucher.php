<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class AddVoucher extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'add_vouchers';

    const DISCOUNT_TYPE_SELECT = [
        'amount'     => 'Amount',
        'percentage' => 'percentage',
    ];

    protected $dates = [
        'expired_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'voucher_code',
        'discount_type',
        'value',
        'description',
        'redeem_point',
        'is_free_shipping',
        'is_credit_purchase',
        'expired_time',
        'min_spend',
        'max_spend',
        'excluded_sales_item',
        'usage_limit',
        'limit_per_user',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
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

    public function getExpiredTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setExpiredTimeAttribute($value)
    {
        $this->attributes['expired_time'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function select_items()
    {
        return $this->belongsToMany(ItemManagement::class);
    }

    public function selected_categories()
    {
        return $this->belongsToMany(ItemCatrgory::class);
    }

    public function selected_sub_categories()
    {
        return $this->belongsToMany(ItemSubCateogry::class);
    }
}
