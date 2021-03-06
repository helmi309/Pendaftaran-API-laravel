<?php

namespace App\Http\Requests\Post;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;


/**
 * Class UserCreateRequest
 *
 * @package App\Http\Requests\User
 */
class PostEditRequest extends Request
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
     * Declaration an attributes
     *
     * @var array
     */
    protected $attrs = [
        'judul'    => 'Judul',
        'gambar' => 'Gambar',
        'deskripsi'   => 'Deskripsi'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'judul'    => 'required|max:225',
            'gambar' => 'required|max:255',
            'deskripsi'   => 'required|max:2555'
        ];
    }

    /**
     * @param $validator
     *
     * @return mixed
     */
     /* Menampilkan error */
public function validator($validator)
    {
        return $validator->make($this->all(), $this->container->call([$this, 'rules']), $this->messages(), $this->attrs);
    }

    /**
     * @param Validator $validator
     * @return array
     */
    protected function formatErrors(Validator $validator)
    {
        $message = $validator->errors();

        return [
            'success'    => false,
            'validation' => [
                'judul' => $message->first('judul'),
                'gambar'          => $message->first('gambar'),
                'deskripsi'          => $message->first('deskripsi')

            ]
        ];
    }

}
