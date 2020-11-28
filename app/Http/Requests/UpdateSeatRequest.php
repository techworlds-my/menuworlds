<?php

namespace App\Http\Requests;

use App\Models\Seat;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSeatRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seat_edit');
    }

    public function rules()
    {
        return [
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
