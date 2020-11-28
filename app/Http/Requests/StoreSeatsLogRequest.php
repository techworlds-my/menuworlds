<?php

namespace App\Http\Requests;

use App\Models\SeatsLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSeatsLogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seats_log_create');
    }

    public function rules()
    {
        return [
            'seats'      => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'time_start' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'time_end'   => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}
