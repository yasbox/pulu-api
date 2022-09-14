<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\CardDeleted;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'name_kana',
        'face_photo',
        'organization_name',
        'organization_logo',
        'position_name',
        'zip',
        'address',
        'tel',
        'tel2',
        'fax',
        'email',
        'site',
        'description',
        'image_photo',
        'sort_num',
        'is_list',
        'is_share',
    ];

    // 配列に変換して取得する
    /* public function getImagePhotoAttribute($value)
    {
        if ($value === '') {
            return [];
        } else {
            // 配列にする
            return explode(',', $value);
        }
    } */

    // 実ファイル削除イベント
    protected $dispatchesEvents = [
        'deleting' => CardDeleted::class,
    ];
}
