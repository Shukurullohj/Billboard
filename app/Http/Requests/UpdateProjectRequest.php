<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::allows('update', $this->route('project'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'title' =>'required',
        'description' => 'required',
        'notes' => 'nullable'        
    ];
}
     public function project()
     {
        return Project::findOrFail($this->route('project'));
     }
     public function save()
     {
        return tap($this->project())->update($this->validated());
     }
}
