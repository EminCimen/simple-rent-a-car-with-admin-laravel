<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Car;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        $cars = Car::all()->where('isHighligted',1);
        return view('index')->with('cars',$cars);
    }

    public function listAll(){
       // $cars = Car::all();
        $cars = DB::table('cars')->where('isActive',1)->simplePaginate(8);
        return view('listall')->with('cars',$cars);
    }

    public function rent($id){
        $car = Car::find($id);

        return view('rent')->with('car',$car);
    }

    public function login(){
        return view('login');
    }

    public function loginAttempt(Request $request){
        if(Auth::attempt(['email' => $request->email , 'password' => $request->password],$request->rememberme)){
            alert()->success('Giriş yaptınız','Hoş geldiniz');
            return redirect()->intended(route('index'));
        }else{
            alert()->error('Hatalı giriş','Bilgileri kontrol edin');
            return redirect()->route('login');
        }
    }

    public function logout(){
        Auth::logout();
        alert()->success('Çıkış yaptınız','Güvenli çıkış işlemi tamamlandı.');
        return redirect()->intended(route('index'));
    }

    public function register(){
        return view('register');
    }

    public function registerStore(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'tc_no' => 'required',
            'name' => 'required',
            'il' => 'required',
            'telefon' => 'required',
            'dogum_yili' => 'required',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->user_tc = $request->tc_no;
        $user->user_city = $request->il;
        $user->user_phone = $request->telefon;
        $user->user_birthday = $request->dogum_yili;

        if($user->save()){
            alert()->success('Kayıt oldunuz','Giriş yapabilirsiniz');
            return redirect()->intended(route('login'));
        } else {
            alert()->error('Hata','Bir hata oluştu');
            return back();
        }
    }

    public function memberSettings(){
        $reservations = DB::table('reservations')
                ->select('*')
            ->join('cars','reservations.car_id','=','cars.id')
            ->join('users','reservations.user_id','=','users.id')
            ->where('reservations.user_id','=',Auth::id())->get();

        return view('membersettings')->with('reservations',$reservations);
    }

    public function memberEdit(){
        $user = DB::table('users')->where('id','=',Auth::id())->first();
        return view('memberedit')->with('user',$user);
    }

    public function memberStore(Request $request){
        $request->validate([
            'email' => 'required|email',
            'tc_no' => 'required',
            'name' => 'required',
            'telefon' => 'required',
        ]);

        $user = User::find(Auth::id());
        $user->email = $request->email;
        $user->name = $request->name;
        if($request->has('password')){
        $user->password = Hash::make($request->password);
        }
        $user->user_tc = $request->tc_no;
        $user->user_phone = $request->telefon;

        if($user->save()){
            alert()->success('Başarılı','Bilgileriniz başarıyla güncellendi');
            return back();
        }else{
            alert()->error('Hata','Hata oluştu');
            return back();
        }
    }

    public function ufuk(){
        $parola = Hash::make('ufukdemirel01');
        print_r($parola);
    }
}
