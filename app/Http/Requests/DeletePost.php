<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeletePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $this: a request

        // vhogy el kell érni a Requestben kapott Postot
        $post = $this->route('post');

        // $post->author is elég?
        return $this->user()->id == $post->author->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
