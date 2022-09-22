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
                'description' => 'Immediate Past Chairman
Director Fiscal Year 2022-2023
General Incorporated Association of Japan Lions

JOTO Building 9F
2-6-15,Yaesu,Chuo-ku,Tokyo 104-0028,JAPAN
TEL:+81-3-6262-1263
FAX:+81-3-3241-4388',
                'image_photo' => '',
                'sort_num' => 0,
                'is_list' => 1,
                'is_share' => 1,
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
                'description' => '長野日本大学高等学校／長野日本大学中学校
〒381-0038 長野市東和田253
TEL　026-243-1079　FAX　026-259-3935

長野日本大学小学校
〒381-0038 長野市東和田261-1
TEL　026-252-6121　FAX　026-243-7177

あかしや幼稚園
〒381-0038 長野市東和田577-1
TEL　026-243-1431　FAX　026-263-4100',
                'image_photo' => '',
                'sort_num' => 0,
                'is_list' => 1,
                'is_share' => 1,
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
                'description' => '株式会社ホンダカーズしなの（代表取締役）
東和田店　　☎ 026-243-5555　FAX 243-1417
稲田店　　　☎ 026-258-0555　FAX 258-0566
篠ノ井店　　☎ 026-299-7500　FAX 299-7311
中御所店　　☎ 026-219-1155　FAX 219-1154
大塚店　　　☎ 026-286-3311　FAX 284-2247
中野店　　　☎ 0269-26-3616　FAX 26-3231
戸倉店　　　☎ 026-275-2302　FAX 275-0700
上田染谷店　☎ 0268-27-5555　FAX 25-3866
上田古里店　☎ 0268-75-5522　FAX 75-5520
上田秋和店　☎ 0268-71-6688　FAX 71-6680
塩田店　　　☎ 0268-38-8222　FAX 38-8223
佐久中込店　☎ 0267-64-2323　FAX 64-2110
小諸東店　　☎ 0267-23-7222　FAX 23-7652
AT長野東店　☎ 026-222-6591　FAX 222-6593
AT千曲店　　☎ 026-272-8555　FAX 272-8540

株式会社ホンダカーズ長野東（代表取締役)
本社　〒381-0014 長野市大字北尾張部732
　　　　　☎ 026-244-3399　FAX 243-9958
尾張部店　☎ 026-244-3303　FAX 243-9954
高田店　　☎ 026-228-8777　FAX 228-9131
飯山店　　☎ 0269-62-3023　FAX 67-2521
吉田店　　☎ 026-252-5181　FAX 252-5171

株式会社ホンダカーズ松本東（代表取締役)
本社　〒399-0833 松本市双葉20-12
　　　　　　☎ 0263-31-3640 FAX 31-3840
南松本店　　☎ 0263-31-3780 FAX 31-3887
塩尻店　　　☎ 0263-53-2020 FAX 53-0684
諏訪店　　　☎ 0266-52-2821 FAX 52-2829
岡谷店　　　☎ 0266-78-6120 FAX 78-6850
伊那春近店　☎ 0265-72-3250 FAX 73-6634
竜丘店　　　☎ 0265-26-7250 FAX 26-7601
飯田橋店　　☎ 0265-52-5010 FAX 52-5015
江戸浜店　　☎ 0265-23-0530 FAX 52-2125
ホンダグロス長野伊那センター
　　　　　　☎ 0265-98-5388 FAX 98-5377

株式会社ドリームモータースクール（代表取締役）
本社　　☎ 026-299-7557 FAX 293-1331
昭和校　☎ 026-292-2566 FAX 293-1119
須坂校　☎ 026-245-1574 FAX 246-0565',
                'image_photo' => '',
                'sort_num' => 0,
                'is_list' => 1,
                'is_share' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Card::insert($param);

    }
}
