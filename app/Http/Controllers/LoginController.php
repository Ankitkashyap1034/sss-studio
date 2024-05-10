<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
class LoginController extends Controller
{
    public function login()
    {
        if(!Auth::user()){
            $page = 'Log In';
            return view('auth.login',[
                'page' => $page
            ]);
        }else{
            if(auth()->user()->hasRole('Regular User')){
                return redirect()->route('home')->with('success','Already logged in');
            }
            return redirect()->route('admin.dashboard')->with('success','Already logged in');
        }
       
    }
    
    public function loginCheck(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        $user = User::where('email',$request->email)->first();
        if($user){
            // check email verified
            // if($user->email_verified_at != ''){
                    if (Hash::check($request->password, $user->password)) {
                        Auth::login($user);
                        if(auth()->user()->hasRole('admin')){
                            return redirect('/admin/dashboard')->with('success','Login successfully');
                        }elseif(auth()->user()->hasRole('user')){
                            return redirect('/')->with('success','Login successfully');
                        }
                        return redirect()->route('dashboard')->with('success','Login successfully');
                    }else{
                        return redirect()->route('login')->with('error','Wrong Password');
                    }
                
            // }else{
            //     return redirect()->route('login')->with('error','Please verify your email first');
            // }
            
        }else{
            return redirect()->route('login')->with('error','User not find with this email');
        }
    }

    public function register()
    {
        return view('auth.register',[
            'page' => 'Register'
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'password' => 'required|confirmed|min:6|max:12',
            'email' => 'required|max:50|unique:users,email',
        ]);

        $data = $request->except([
            '_token',
            'password_confirmation',
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            // 'verfication_code' => $verficationCode,
            'password' => Hash::make($data['password'])
        ]);
        $user->assignRole('user');
        // $this->sendMail($to,$subject,$page,$user);

        return redirect('login')->with('success', 'Register successfully');
    }

    public function storeNormalUser($user,$ip)
    {
        $verficationCode = Str::random(20);
        $to = $user['email'];
        $subject = 'Verfication email';
        $page = 'verification-email';
        $users = User::create([
            'name' => $user['employer_name'],
            'email' => $user['email'],
            'verfication_code' => $verficationCode,
            'password' => Hash::make($user['password']),
        ]);
        $users->assignRole('Regular User');
        $user['verfication_code'] = $verficationCode;
        $user['id'] = $users->id;
        $this->sendMail($to,$subject,$page,$user);
    
        CustomerRegular::create([
            'name' => $user['employer_name'],
            'email' => $user['email'],
            'user_ip' => $ip,
        ]);
        return true;
    }

    public function storeAdmin($user)
    {
        $verficationCode = Str::random(20);
        $user = User::create([
            'name' => $user['employer_name'],
            'email' => $user['email'],
            'verfication_code' => $verficationCode,
            'is_approved' => '0',
            'password' => Hash::make($user['password']),
        ]);
        $user->assignRole('Admin');
        $userData = $user;

        $to = $user->email;
        $subject = 'Verification email from 4syz';
        $page = 'verification-email';
        $this->sendMail($to,$subject,$page,$userData);
        return $user;
    }


    public function sendInvitation(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'email' => 'required|max:50|unique:users,email',
            'occupation' => 'required|max:50|unique:users,email',
        ]);

        $data = $request->except([
            '_token',
        ]);
        $data['invited_by'] = Main::get_admin()->id;
        $invite = InviteUser::create($data);
        $data['id'] = $invite->id;
        $to = $data['email'];
        $subject = 'Invitation to join 4syz';
        $page = 'invite-customer';
        $this->sendMail($to,$subject,$page,$data);
        return redirect()->back()->with('success','Customer Invite successfully');
    }
   
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:30',
            'email' => 'required|max:50|unique:users,email',
            'occupation' => 'required|max:50|unique:users,email',
        ]);

        $user = $request->except([
            '_token',
        ]);

        $randomString = Str::random(8);
        $code = Str::random(15);
        $user = User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($randomString),
            'code' => $code,
        ]);
        $user->assignRole('User');
        $userData = $user;
        $userData['password'] = $randomString;
        $userData['occupation'] = $request->occupation;
        $customer = $this->createCustomer($userData);

        $to = $user->email;
        $subject = 'Invitation for customer in 4syz';
        $page = 'customer-welcome-admin';
        $this->sendMail($to,$subject,$page,$userData);
        return redirect()->back()->with('success','Customer create successfully');
    }

    public function createCustomer($user)
    {
        $user = $user->toArray();

        $user = EmployeeCustomer::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'occupation' => $user['occupation'],
            'user_id' => $user['id'],
            'admin_id' => Auth::user()->id,
        ]);
        return true;
    }

    public static function sendMail($to,$subject,$page,$user)
    {
        $user = optional($user)->toArray() ?? $user;
        Mail::send('mail.'.$page,['user' => $user], function ($mail) use ($to, $subject) {
            $mail->to($to)->subject($subject);
        });

        return true;
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success','Logout successfully');
    }

    public function verifyEmail($user_id,$code)
    {

        $user = User::where('id',$user_id)->first();
        if($user){
            if($user->verfication_code == $code){
                $user->update([
                    'email_verified_at' => now(),
                ]);
                return redirect()->route('login')->with('success','Email verfiy successfully');

            }else{
                return redirect()->route('login')->with('error','Verfication code is worng');

            }
        }else{
            return redirect()->route('login')->with('error','User not matched');
        }
    }

    // for acceept the invitaion
    public function acceptInvitation($employer_id,$invited_id)
    {
        if(isset($employer_id) && $invited_id){
            $employer = Admins::find($employer_id); 
            $invitedUser = InviteUser::find($invited_id);
            if($employer){
                return view('admin.auth.register',[
                    'employer_id' => $employer_id, 
                    'invitedUser' => $invitedUser 
                ]);
            }
        }
    }

    public function storeCustomerEmployer(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:6|max:12',
            'email' => 'required|max:50|unique:users,email',
        ]);

        if(!$request->employer_id){
            return redirect()->route('register')->with('error','Find no employer register as Regular customer');
        }else{
            $admin = Admins::find($request->employer_id);
            $adminEmailPostFix = explode('@',$admin->email);
            $requestEmailPostFix = explode('@',$request->email);
            // check the user email is authorished or not
            if($requestEmailPostFix[1] == $adminEmailPostFix[1]){
                $invitedUser = InviteUser::find($request->invited_user_id); // find the invite user data
                $data = $request->except([
                    '_token',
                    'password_confirmation',
                ]);

                // create user
                $verficationCode = Str::random(20);
                $users = User::create([
                    'name' => $data['employer_name'],
                    'email' => $data['email'],
                    'verfication_code' => $verficationCode,
                    'password' => Hash::make($data['password']),
                ]);
                $users->assignRole('User');
                $user = $users->toArray();

                // create employe customer 
                $user = EmployeeCustomer::create([
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'occupation' => $invitedUser->occupation,
                    'user_id' => $user['id'],
                    'admin_id' => $admin->id
                ]);
                
                $data['verfication_code'] = $verficationCode;
                $data['id'] = $users->id;
                $to = $user->email;
                $subject = 'Verification email from 4syz';
                $page = 'verification-email';
                $this->sendMail($to,$subject,$page,$data);
                return redirect()->route('login')->with('success','Register successfully check your email for confimation');
            }else{
                return redirect()->route('register')->with('error','Your email is not authorized , You need to login as regular customer');
            }
        }
        
    }
}
