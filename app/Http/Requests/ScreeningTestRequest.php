<?php
namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ScreeningTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check() && ! auth()->user()->finished_profile && auth()->user()->role != 'admin') ? true : false;
    }

    public function messages()
    {
        return [
            'q3_a1.required_if' => 'This field is required if question 3 is checked.',
            'q3_a2.required_if' => 'This field is required if question 3 is checked.',

            'q4_a1.required_if' => 'This field is required if question 4 is checked.',
            'q4_a2.required_if' => 'This field is required if question 4 is checked.',

            'q5_a1.required_if' => 'This field is required if question 5 is checked.',
            'q5_a2.required_if' => 'This field is required if question 5 is checked.',

            'q6_a1.required_if' => 'This field is required if question 6 is checked.',
            'q6_a2.required_if' => 'This field is required if question 6 is checked.',

            'q7_a1.required_if' => 'This field is required if question 7 is checked.',
            'q7_a2.required_if' => 'This field is required if question 7 is checked.',

            'q8_a1.required_if' => 'This field is required if question 8 is checked.',
            'q8_a2.required_if' => 'This field is required if question 8 is checked.',

            'q13_a.required'    => 'This field is required if you selected other activity in question 13',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {

        $q13_a = 'sometimes|nullable|string';
        if (is_array($request->q13)) {

            if (in_array('other not listed', $request->q13)) {
                $q13_a = 'required|string|max:50';
            }

        }

        return [
            // Gender
            'gender'   => 'required|in:male,female',
            // Age
            'age'      => 'required|integer|between:14,90',
            // Question 3
            'q3'       => 'in:on,off',
            'q3_a1'    => 'required_if:q3,on|string|max:100',
            'q3_a2'    => 'required_if:q3,on|integer',
            // Question 4
            'q4'       => 'in:on,off',
            'q4_a1'    => 'required_if:q4,on|string|max:100',
            'q4_a2'    => 'required_if:q4,on|integer',
            // Question 5
            'q5'       => 'in:on,off',
            'q5_a1'    => 'required_if:q5,on|string|max:100',
            'q5_a2'    => 'required_if:q5,on|integer',
            // Question 6
            'q6'       => 'in:on,off',
            'q6_a1'    => 'required_if:q6,on|string|max:100',
            'q6_a2'    => 'required_if:q6,on|integer',
            // Question 7
            'q7'       => 'in:on,off',
            'q7_a1'    => 'required_if:q7,on|string|max:100',
            'q7_a2'    => 'required_if:q7,on|integer',
            // Question 8
            'q8'       => 'in:on,off',
            'q8_a1'    => 'required_if:q8,on|string|max:100',
            'q8_a2'    => 'required_if:q8,on|integer',
            // Question 9, waist size
            'unit'     => 'required|in:cm,in',
            'waist'    => 'required|integer|between:23.5,140',
            // Question 10, heart beats rate
            'heart'    => 'required|integer|between:30,120',
            // Question 11, number of exercises
            'exercise' => 'required|integer|between:0,15',
            // Question 12, how hard do yu exercise
            'q12'      => 'required|integer|between:1,3',
            // Question 13, what activities do you like most
            'q13'      => 'required|array|between:1,5',
            'q13_a'    => $q13_a,

        ];
    }

}
