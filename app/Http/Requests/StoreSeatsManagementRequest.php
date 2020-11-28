<?php

namespace App\Http\Requests;

use App\Models\SeatsManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSeatsManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('seats_management_create');
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
