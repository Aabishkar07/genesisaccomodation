<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CustomerRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

       public function register()
    {
        return view("frontend.Auth.register");
    }

    public function storeuser(Request $request)
    {

        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customer_registrations,email',
            'phonenumber' => 'required|numeric|unique:customer_registrations,phonenumber',
            'address' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'confirm_password' => 'required|same:password',
        ], [
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.'
        ]);


        $req = $request->all();
        $req['password'] = Hash::make($request->password);
        $req['slug'] = Str::slug($request->name);

        $user = CustomerRegistration::create($req);

        return redirect()->route('login')->with('popsuccess', 'Successfully Registered');
    }

  public function login()
    {
        return view("frontend.Auth.login");
    }

    public function customerlogin(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => [
                'required',
                'string',
                'min:8'
            ],
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            return redirect()->route('home')->with('popsuccess', 'Login Successful');
        }
        return redirect()->route('login')->with('poperror', 'Invalid Credentials');
    }






public function forgotpassword()
    {
        return view("frontend.Auth.forgetpassword");
    }

    public function generateOTP($numberOfDigits)
    {
        $min = pow(10, $numberOfDigits - 1);
        $max = pow(10, $numberOfDigits) - 1;
        $random_number = rand($min, $max);

        return $random_number;
    }

    public function checkemail(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            // 'check' => $request->email,
            'email' => 'required|email',
            // 'email' => 'required|email|unique:customer_registrations,email|exists:customer_registrations,email',
        ]);
        $checkemail = CustomerRegistration::where("email", $request->email)->first();
        if ($checkemail) {
            $otpnumber = $this->generateOTP(4);
            $membercode_number = $this->generateOTP(8);
            // dd($otpnumber);
            $checkemail->otp = $otpnumber;
            $checkemail->membercode = $membercode_number;
            $checkemail->save();
            $mailData = $otpnumber;

            // Mail::to($checkemail->email)->send(new ForgotPassword($mailData));

            // return view("frontend.Auth.checkotp", compact("checkemail"));

            return redirect()->route("viewcheckotp", $membercode_number)->with("popsuccess", "Email Found .");
        } else {
            // dd("err");
            return redirect()->back()->with("poperror", "Email Not Found .");
        }
    }

    public function viewcheckotp($checkotp)
    {
        // dd($checkotp);
        $checkmember = CustomerRegistration::where("membercode", $checkotp)->first();
        return view("frontend.Auth.checkotp", compact("checkmember"));
    }

    public function getchangepassword($getchangepassword)
    {
        // dd($getchangepassword);
        $checkotp = CustomerRegistration::where("membercode", $getchangepassword)->first();

        return view("frontend.Auth.changepassword", compact("checkotp"));
    }

    public function checkotp(Request $request, $checkotp)
    {
        $validated = $request->validate([
            'userotp' => 'required|numeric',
        ]);
        $otpMatched = CustomerRegistration::where('membercode', $checkotp)->where("otp", $request->userotp)->first();
        if ($otpMatched) {
            return redirect()->route("getchangepassword", $checkotp)->with("popsuccess", "OTP Matched.");
        } else {
            return redirect()->back()->with("poperror", "OTP does not Matched.");
        }
    }

    public function changepassword(Request $request, $changepassword)
    {

        $credentials = $request->validate([
            'newpassword' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'confirmpassword' => 'required|same:newpassword',
        ], [
            'newpassword.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.'
        ]);

        $checkmember = CustomerRegistration::where("membercode", $changepassword)->first();

        $checkmember->password = Hash::make($request->newpassword);
        $checkmember->save();

        return redirect()->route('login')->with('popsuccess', 'Your Password Successfully changed .');
    }



}
