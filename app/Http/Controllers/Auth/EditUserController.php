<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

class EditUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit(Request $request)
    {
        $user = User::find((int)$request->id);

        if (!$user) {
            throw new \Exception('対象のユーザーが見つかりません');
        }
        if ($user->id !== Auth::id()) {
            throw new \Exception('ユーザー情報が一致しません');
        }

        /* 名前に変更があった場合 */
        if ($user->name !== $request->name) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
            ]);
            $user->name = $request->name;
        }

        /* メールアドレスに変更があった場合 */
        if ($user->email !== $request->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
            $user->email = $request->email;
            $user->email_verified_at = null; // email_verified_at をリセット
            $user->sendEmailVerificationNotification(); // 認証メールを送信する
        }

        /* パスワードに変更があった場合 */
        if ($request->password !== null) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->noContent();
    }
}
