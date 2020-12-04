<?php

namespace App\Http\Requests;

use App\Models\ItemCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyItemCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('item_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:item_categories,id',
        ];
    }
}
