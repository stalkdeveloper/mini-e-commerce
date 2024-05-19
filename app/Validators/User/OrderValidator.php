<?php
namespace App\Validators\User;

use App\Validators\Validator;

class OrderValidator extends Validator
{
    /**
     * Rules for User registration
     *
     * @var array
     */

    public function __construct($validationFor = 'add')
    {
        $commonRules = [
            'name' => 'required',
            'email'=> 'required|email',
            // 'mobile_number' => 'required|numeric',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zipcode' => 'required|numeric',
            'amount' => 'required',
            'payment_type' => 'required',
            'products' => 'required',
        ];
    
        if ($validationFor === 'update') {
            $commonRules = [

            ];
        }
    
        $this->rules = $commonRules;
    }


} 