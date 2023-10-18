<?php

namespace App\Http\Requests\Payment;

use App\Services\Payments\Models\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return [
            'method_id' => ['required', 'integer', Rule::exists(PaymentMethod::class, 'id')
                ->where('active', true)],
        ];
    }
}
