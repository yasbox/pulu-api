<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardPost extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => $this->name === null ? '' : $this->name,
            'name_kana' => $this->name_kana === null ? '' : $this->name_kana,
            //'face_photo' => $this->face_photo === null ? '' : $this->face_photo,
            'organization_name' => $this->organization_name === null ? '' : $this->organization_name,
            //'organization_logo' => $this->organization_logo === null ? '' : $this->organization_logo,
            'position_name' => $this->position_name === null ? '' : $this->position_name,
            'zip' => $this->zip === null ? '' : $this->zip,
            'address' => $this->address === null ? '' : $this->address,
            'tel' => $this->tel === null ? '' : $this->tel,
            'tel2' => $this->tel2 === null ? '' : $this->tel2,
            'fax' => $this->fax === null ? '' : $this->fax,
            'email' => $this->email === null ? '' : $this->email,
            'site' => $this->site === null ? '' : $this->site,
            'description' => $this->description === null ? '' : $this->description,
            //'image_photo' => $this->image_photo === null ? '' : $this->image_photo,
            'is_list' => $this->is_list === null ? '1' : $this->is_list,
            'is_share' => $this->is_share === null ? '1' : $this->is_share,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'name_kana' => 'string|max:255',
            'face_photo.*' => 'nullable|file|image',
            'organization_name' => 'string|max:255',
            'organization_logo.*' => 'nullable|file|image',
            'position_name' => 'string|max:255',
            'zip' => 'string|max:255',
            'address' => 'string|max:255',
            'tel' => 'string|max:255',
            'tel2' => 'string|max:255',
            'fax' => 'string|max:255',
            'email' => 'string|max:255',
            'site' => 'string|max:255',
            'description' => 'string',
            'image_photo.*' => 'nullable|file|image',
            'is_list' => 'required|boolean',
            'is_share' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }

    public function attributes()
    {
        return [
            'name' => '氏名',
            'name_kana' => '氏名（ふりがな）',
            'face_photo' => '顔写真',
            'organization_name' => '会社・組織・団体名',
            'organization_logo' => 'ロゴ',
            'position_name' => '役職など',
            'zip' => '郵便番号',
            'address' => '住所',
            'tel' => 'TEL',
            'tel2' => 'TEL2',
            'fax' => 'FAX',
            'email' => 'メールアドレス',
            'site' => 'ホームページ',
            'description' => '自由文',
            'image_photo' => 'イメージ写真',
            'is_list' => '名刺リスト表示',
            'is_share' => '名刺リスト共有',
        ];
    }
}
