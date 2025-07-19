<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // التحقق
        $validated = $request->validate([
            'phone' => 'bail|required|string|regex:/^01[0-2,5]{1}[0-9]{8}$/|exists:tolabs,phone',
            'pass'  => 'required|min:8',
        ]);

        // محاولة تسجيل الدخول
        if (Auth::guard('tolabs')->attempt([
            'phone'    => $validated['phone'],
            'password' => $validated['pass'], // مفتاح "password" مهم
        ])) {

            $user =  collect(auth('tolabs')->user())->except(['pass', 'created_at', 'updated_at']);


            return response()->json([
                'success' => true,
                'message' => 'تم تسجيل الدخول بنجاح',
                'name'    => auth('tolabs')->user()->firstname, // عدّل حسب احتياجك
                'name2'    => auth('tolabs')->user()->secname, // عدّل حسب احتياجك
                'user' =>  $user,

            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'فشل تسجيل الدخول، يرجى التحقق من رقم الهاتف وكلمة المرور',
        ], 401);
    }

    public function logout(Request $request)
{
    $id = $request->input('id');

    if (!$id) {
        return response()->json([
            'success' => false,
            'message' => 'الـ ID مطلوب'
        ], 400);
    }

    // لو عايز تعمل حاجة عند الـ logout (مثلاً تغيير حالة المستخدم)
    // $user = User::find($id);
    // if ($user) {
    //     $user->status = 'offline';
    //     $user->save();
    // }

    return response()->json([
        'success' => true,
        'message' => 'تم تسجيل الخروج بنجاح'
    ]);
}

}
