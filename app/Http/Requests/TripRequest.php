<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTimeInterface;


class TripRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date|date_format:Y-m-d\TH:i:s.v\Z', // ISO 8601 string // 2011-10-05T14:48:00.000Z
            'car_id' => 'required|integer',
            'miles' => 'required|numeric'
        ];
    }
}
