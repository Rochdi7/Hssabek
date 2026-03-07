<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    abstract protected function baseRules(): array;

    protected function storeRules(): array
    {
        return [];
    }

    protected function updateRules(): array
    {
        return [];
    }

    public function rules(): array
    {
        $rules = $this->baseRules();

        if ($this->isMethod('POST')) {
            $rules = array_merge($rules, $this->storeRules());
        } else {
            $rules = array_merge($rules, $this->updateRules());
        }

        return $rules;
    }

    protected function baseMessages(): array
    {
        return [];
    }

    protected function storeMessages(): array
    {
        return [];
    }

    protected function updateMessages(): array
    {
        return [];
    }

    public function messages(): array
    {
        $messages = $this->baseMessages();

        if ($this->isMethod('POST')) {
            $messages = array_merge($messages, $this->storeMessages());
        } else {
            $messages = array_merge($messages, $this->updateMessages());
        }

        return $messages;
    }
}
