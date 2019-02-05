<?php

namespace App\Http\Requests;

use App\Models\Lead;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class CreateLeadsRequest extends FormRequest
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
            'project_type' => [
                'required',
                'array',
                Rule::exists('services', 'id'),
            ],
            'budget' => 'required',
            'project_description' => 'required|max:1000',
            'name' => 'required|max:255',
            'name_company' => 'required|max:255',
            'url_website' => ['nullable', 'present', 'url'],
            'email' => 'required|email',
            'phone' => 'required',
            'how_find' => ['nullable', 'present'],
        ];
    }

    public function createLead()
    {
        DB::transaction(function () {
            $data = $this->validated();

            $lead = Lead::create([
                'budget' => $data['budget'],
                'project_description' => $data['project_description'],
                'name' => $data['name'],
                'name_company' => $data['name_company'],
                'url_website' => $data['url_website'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'how_find' => $data['how_find']
            ]);

            if (!empty ($data['project_type'])) {
                $lead->services()->attach($data['project_type']);
            }
        });
    }
}
