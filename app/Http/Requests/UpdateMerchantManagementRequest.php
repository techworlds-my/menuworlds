<?php

namespace App\Http\Requests;

use App\Models\MerchantManagement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMerchantManagementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('merchant_management_edit');
    }

    public function rules()
    {
        return [
            'company_name'      => [
                'string',
                'required',
            ],
            'ssm'               => [
                'string',
                'nullable',
            ],
            'address'           => [
                'string',
                'required',
            ],
            'postcode'          => [
                'string',
                'nullable',
            ],
            'in_charge_person'  => [
                'string',
                'required',
            ],
            'contact'           => [
                'string',
                'required',
            ],
            'email'             => [
                'string',
                'required',
            ],
            'position'          => [
                'string',
                'nullable',
            ],
            'website'           => [
                'string',
                'nullable',
            ],
            'facebook'          => [
                'string',
                'nullable',
            ],
            'instagram'         => [
                'string',
                'nullable',
            ],
            'merchant'          => [
                'string',
                'nullable',
            ],
            'sub_category_id'   => [
                'required',
                'integer',
            ],
            'approved_by'       => [
                'string',
                'nullable',
            ],
            'description'       => [
                'string',
                'required',
            ],
            'merchane_level_id' => [
                'required',
                'integer',
            ],
            'area_id'           => [
                'required',
                'integer',
            ],
        ];
    }
}
