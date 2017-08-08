<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSetupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ( auth()->check() && ! auth()->user()->finished_profile && auth()->user()->role != 'admin' ) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|exists:users',
            'email'             => 'required|email|exists:users',
            'mobile_number'     => 'required|string',
            'country'           => 'required|alpha',
            'timezone'          => 'required|timezone',
            'address_1'         => 'required|string',
            'address_2'         => 'nullable|string',
            'address_3'         => 'nullable|string',
            'state'             => 'required_if:country,US|alpha_num',
            'city'              => 'required|alpha',
            'zip'               => 'required|integer',
            'security_question' => 'required|string',
            'security_answer'   => 'required|string',
        ];
    }
}
