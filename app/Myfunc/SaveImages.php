<?php

namespace App\Myfunc;

use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image as Intervention;
use Illuminate\Support\Facades\Storage;

class SaveImages
{
    /**
     * 画像をリサイズして保存
     *
     * @param image $image
     * @param int $targetSize // リサイズ後の横方向サイズ（ピクセル）
     * @param int $targetQuality // 保存時の圧縮率（0-100）
     * @param int $savePath // 保存先
     *
     * @return string
     */
    public static function default($image, $targetSize, $targetQuality, $savePath)
    {
        try {
            if (!($image && $targetSize && $targetQuality && $savePath)) {
                throw new \Exception('エラー');
            }

            // 画像の取得　回転　exif情報の削除
            $image_temp = Intervention::make($image)->orientate();

            // アスペクト比を維持してリサイズ
            $image_temp->resize($targetSize, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($image, $targetQuality);

            //$savePath = $image->store('public/' . $savePath);
            $savedPath = Storage::putFile('public/' . $savePath, $image);
            $savedPath = str_replace('public/', '', $savedPath);

        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
            return '';
        }

        return $savedPath;
    }
}