<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;


class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        try{
            
            DB::beginTransaction();
        
            if (!$user) {
                return back()->with('error', 'Email tidak ditemukan.');
            }
        
            // Cek apakah token reset sudah ada
            $tokenExists = DB::table('password_resets')->where('email', $request->email)->exists();
        
            if ($tokenExists) {
                return back()->with('error', 'Email lupa password sudah ada, silakan cek email Anda.');
            }
        
            $response = Password::sendResetLink(
                $request->only('email')
            );
        
            DB::commit();
            return $response == Password::RESET_LINK_SENT
                ? redirect('/login')->with('success', 'Email untuk reset password berhasil dikirim, silakan cek email Anda.')
                : redirect('/login')->with('error', 'Tidak berhasil mengirim email reset password.');
            
        }catch(Exception $e){
            DB::rollBack();
            return redirect('/login')->with('error', $e->getMessage());

        }
       
    }
    

    public function showResetForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:5'
        ],
    [
        'password.confirmed' => 'Password tidak sama'
    ]);
        try{



        $passwordReset = DB::table('password_resets')->where('email', $request->email)->first();
        
        if ($passwordReset !== null) {
            if (!Hash::check($request->token, $passwordReset->token)) {
                return redirect()->back()->with('error', 'tidak berhasil merubah password, coba lagi nanti');
            }
        } else {
            return redirect()->back()->with('error', 'tidak berhasil merubah password, coba lagi nanti');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'tidak berhasil merubah password, coba lagi nanti');
        }

        $newPassword = Hash::make($request->password);
        $user->password = $newPassword;
        $user->save();

        DB::table('password_resets')->where('email', $request->email)->delete();


        return redirect('/login')->with('success', 'berhasil merubah password');
    }catch(Exception $e){
            return redirect()->back()->with('error', 'tidak berhasil merubah password, coba lagi nanti');
    }
    }

    private function generateRandomPassword($length = 8)
    {
        return Str::random($length);
    }

    private function sendNewPasswordEmail($user, $password)
    {
        Mail::send([], [], function ($message) use ($user, $password) {
            $message->to($user->email)
                    ->subject('Your New Password')
                    ->setBody("Your new password is: $password", 'text/html');
        });
    }

    private function tokenExpired($token)
    {
        $expires = config('auth.passwords.'.config('auth.defaults.passwords').'.expire');
        return Carbon::parse($token->created_at)->addMinutes($expires)->isFuture();
    }
}
