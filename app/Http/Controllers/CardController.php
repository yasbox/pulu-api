<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\CardPost;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Myfunc\SaveImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function getAll()
    {
        try {
            $cards = Card::where('user_id', Auth::id())->orderBy('sort_num', 'desc')->get();
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
            $response['errors'] = ['サーバエラー' => $ex->getMessage()];
            return response()->json($response, 422);
        }
        return response()->json($cards, 200);
    }

    public function getCard($uuid = null)
    {
        try {
            $cards = Card::where('uuid', $uuid)->get();
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
            $response['errors'] = ['サーバエラー' => $ex->getMessage()];
            return response()->json($response, 422);
        }
        return response()->json($cards, 200);
    }

    public function store(CardPost $request)
    {
        $validated = $request->validated();

        try {

            /**
             * 画像保存
             */
             if ($request->file('face_photo')) {
                $validated['face_photo'] = SaveImages::default($request->file('face_photo'), 600, 80, 'face_photo');
             } else {
                if ($request->face_photo === null) {
                    $validated['face_photo'] = '';
                }
             }

            if ($request->file('organization_logo')) {
                $validated['organization_logo'] = SaveImages::default($request->file('organization_logo'), 300, 80, 'organization_logo');
            } else {
                if ($request->organization_logo === null) {
                    $validated['organization_logo'] = '';
                }
            }

            if ($request->file('image_photo')) {
                $validated['image_photo'] = SaveImages::default($request->file('image_photo'), 800, 80, 'image_photo');
            } else {
                if ($request->image_photo === null) {
                    $validated['image_photo'] = '';
                }
            }

            // 古いファイルを削除
            $card = Card::where('uuid', $request->uuid)->first();
            if (!is_null($card)) {
                if ($request->file('face_photo') || $request->face_photo === null) {
                    Storage::delete('public/' . $card->face_photo);
                }
                if ($request->file('organization_logo') || $request->organization_logo === null) {
                    Storage::delete('public/' . $card->organization_logo);
                }
                if ($request->file('image_photo') || $request->image_photo === null) {
                    Storage::delete('public/' . $card->image_photo);
                }
            }

            // UUID作成
            if (!$request->uuid) {
                $request->uuid = (string)Str::uuid();
            }
            // ソート
            $validated['sort_num'] = 0;

            // DB登録
            Card::updateOrCreate(
                ['user_id' => Auth::id(), 'uuid' => $request->uuid],
                $validated
            );
            
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
            $response['errors'] = ['サーバエラー' => $ex->getMessage()];
            return response()->json($response, 422);
        }

        return response()->json('', 200);
    }

    public function drop(Request $request)
    {
        try {
            $card = Card::where([
                ['id', '=', $request->id],
                ['user_id', '=', Auth::id()]
            ])->first();
            $card->delete();
            /* 画像ファイルはイベントで削除 */
        } catch (\Exception $ex) {
            Log::debug($ex->getMessage());
            $response['errors'] = ['サーバエラー' => $ex->getMessage()];
            return response()->json($response, 422);
        }

        return response()->json('', 200);
    }
}
