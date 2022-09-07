<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Card;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データのクリア
        //Card::query()->delete();
        //Card::truncate(); // IDもリセット

        $param = [
            [
                'uuid' => '68877b61-d08b-4d8a-95b0-a7847c76cd90',
                'user_id' => 2,
                'name' => '仁科良三',
                'name_kana' => 'にしな　りょうぞう',
                'face_photo' => '',
                'organization_name' => '一般社団法人日本ライオンズ',
                'organization_logo' => '',
                'position_name' => '前理事長 2022-2023年度 理事',
                'zip' => '104-0028',
                'address' => '東京都中央区八重洲2-6-15 JOTOビル9階',
                'tel' => '03-6262-1263',
                'tel2' => '',
                'fax' => '03-3241-4388',
                'email' => 'jlo@jade.plala.or.jp',
                'site' => '',
                'description' => '',
                'image_photo' => '',
                'sort_num' => 0,
                'valid' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => '10dcfd34-6ef6-49a7-bd6a-bf8ae4552957',
                'user_id' => 2,
                'name' => '仁科良三',
                'name_kana' => 'にしな　りょうぞう',
                'face_photo' => '',
                'organization_name' => '学校法人 長野日本大学学園',
                'organization_logo' => '',
                'position_name' => '理事長代理代行 執行理事',
                'zip' => '381-0038',
                'address' => '長野市東和田253',
                'tel' => '026-243-1079',
                'tel2' => '',
                'fax' => '026-259-3935',
                'email' => '',
                'site' => '',
                'description' => '',
                'image_photo' => '',
                'sort_num' => 0,
                'valid' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'uuid' => 'f9724a07-9f92-4c28-86c5-14e7767bf9b5',
                'user_id' => 2,
                'name' => '仁科良三',
                'name_kana' => 'にしな　りょうぞう',
                'face_photo' => '',
                'organization_name' => 'Honda Cars しなの',
                'organization_logo' => '',
                'position_name' => '代表取締役',
                'zip' => '381-0038',
                'address' => '長野市東和田804-2',
                'tel' => '026-243-1112',
                'tel2' => '',
                'fax' => '026-243-1417',
                'email' => '',
                'site' => '',
                'description' => '',
                'image_photo' => '',
                'sort_num' => 0,
                'valid' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Card::insert($param);

    }
}
