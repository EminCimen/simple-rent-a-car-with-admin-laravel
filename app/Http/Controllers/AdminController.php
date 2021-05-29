<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginAttempt(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'isAdmin' => 1], $request->rememberme)) {
            alert()->success('Giriş yaptınız', 'Hoş geldiniz');
            return redirect()->intended(route('backend.index'));
        } else {
            alert()->error('Hatalı giriş', 'Bilgileri kontrol edin');
            return redirect()->route('backend.login');
        }

    }

    public function logout()
    {
        Auth::logout();
        alert()->success('Başarılı', 'Çıkış yaptınız');
        return redirect(route('backend.login'));
    }

    public function index()
    {
        $cars = Car::all()->where('isActive', 1);

        $pendingReservations =
            DB::table('reservations')
                ->where('isConfirmed', '=', '0')
                ->join('cars', 'reservations.car_id', '=', 'cars.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->orderBy('reservations.reservationStartDate', 'DESC')
                ->get();

        $reservations = Reservation::all();

        $users = User::all()->where('isActive', 1)->where('isAdmin', 0);

        $data['carCount'] = count($cars);
        $data['pendingReservationsCount'] = count($pendingReservations);
        $data['reservationsCount'] = count($reservations);
        $data['userCount'] = count($users);

        return view('admin.dashboard', compact('data'))->with('pendingReservations', $pendingReservations);
    }

    public function carAdd()
    {
        return view('admin.caraddform');
    }

    public function carStore(Request $request)
    {
        $request->validate(
            [
                'brand' => 'required',
                'model' => 'required',
                'detail' => 'required',
                'seats' => 'required|numeric',
                'dailyprice' => 'required|numeric',
                'image' => 'required|file|max:3072|mimes:jpg,png,jpeg|',
            ]
        );

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();


        $car = new Car();
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->details = $request->detail;
        $car->seats = $request->seats;
        $car->image = $imageName;
        $car->isAutomatic = $request->automatic == 'on' ? 1 : 0;
        $car->isDiesel = $request->diesel == 'on' ? 1 : 0;
        $car->dailyPrice = $request->dailyprice;


        if ($car->save()) {
            $image->move(public_path('images'), $imageName);
            alert()->success('Başarılı', 'Araç eklendi');
            return redirect(route('backend.carList'));
        } else {
            alert()->error('Hata', 'Hata oluştu');
            return back();
        }

    }

    public function carList()
    {
        $data['cars'] = Car::all()->where('isActive', 1);
        return view('admin.carlist', compact('data'));
    }

    public function carPassive($id)
    {
        $car = Car::find($id);
        $car->isActive = false;
        if ($car->save()) {
            alert()->success('Araç pasife alındı', 'Başarıyla araç silindi');
            return back();
        } else {
            alert()->error('Hata oluştu', 'Bir hata oluştu');
            return back();
        }

    }

    public function carActive($id)
    {
        $car = Car::find($id);
        $car->isActive = true;
        if ($car->save()) {
            alert()->success('Araç aktife alındı', 'Başarıyla araç aktif edildi');
            return back();
        } else {
            alert()->error('Hata oluştu', 'Bir hata oluştu');
            return back();
        }

    }

    public function deletedCarList()
    {
        $data['cars'] = Car::all()->where('isActive', 0);
        return view('admin.deletedcarlist', compact('data'));
    }

    public function carEdit($id)
    {
        $car = Car::find($id);
        if (!$car->isActive) {
            alert()->error('Hata', 'Aktif olmayan bir aracı düzenlemeye çalışıyorsunuz.');
            return redirect(route('backend.carList'));
        }
        return view('admin.careditform')->with('car', $car);
    }

    public function carUpdate(Request $request)
    {
        $request->validate(
            [
                'brand' => 'required',
                'model' => 'required',
                'detail' => 'required',
                'seats' => 'required|numeric',
                'dailyprice' => 'required|numeric',
            ]
        );
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
        }

        $car = Car::find($request->carid);
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->details = $request->detail;
        $car->seats = $request->seats;
        if ($request->hasFile('image')) {
            $car->image = $imageName;
        }
        $car->isAutomatic = $request->automatic == 'on' ? 1 : 0;
        $car->isDiesel = $request->diesel == 'on' ? 1 : 0;
        $car->dailyPrice = $request->dailyprice;


        if ($car->save()) {
            if ($request->hasFile('image')) {
                $image->move(public_path('images'), $imageName);
            }
            alert()->success('Başarılı', 'Araç güncellendi');
            return redirect(route('backend.carList'));
        } else {
            alert()->error('Hata', 'Hata oluştu');
            return back();
        }

    }

    public function listAdmins()
    {
        $admins = User::all()->where('isAdmin', true);
        return view('admin.adminlist')->with('admins', $admins);
    }

    public function addAdmin($id = null)
    {
        if ($id) {
            $admin = User::find($id);
        }
        return view('admin.adminaddform')->with('admin', $admin ?? 0);
    }

    public function adminStore(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required|min:3'
        ]);

        $admin = new User();
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->isAdmin = true;


        if ($admin->save()) {
            alert()->success('Başarılı', 'Yönetici eklediniz');
            return redirect(route('backend.adminList'));
        } else {
            alert()->error('Hata', 'Hata oluştu');
            return back();
        }

    }

    public function adminUpdate(Request $request)
    {
        $admin = User::find($request->id);
        $admin->email = $request->email;
        if ($request->has('password')) {
            $admin->password = Hash::make($request->password);
        }
        if ($admin->save()) {
            alert()->success('Başarılı', 'Yönetici düzenlendi');
            return redirect(route('backend.adminList'));
        } else {
            alert()->error('Hata', 'Hata oluştu');
            return back();
        }

    }

    public function adminDelete($id)
    {
        $admin = User::where('id', $id)->delete();
        if ($admin) {
            alert()->success('Başarılı', 'Yönetici silindi');
            return redirect(route('backend.adminList'));
        } else {
            alert()->error('Hata', 'Hata oluştu');
            return redirect(route('backend.adminList'));
        }
    }

    public function reservationOperation($id)
    {
//        $reservation = Reservation::where('resid', '=', $id)->first();
//        $reservation->isConfirmed = 1;

        $reservation = DB::table('reservations')
            ->where('resid', $id)
            ->update(
                ['isConfirmed' => 1]
            );

        if ($reservation) {
            Alert::alert('Başarılı', 'Rezarvasyon isteği onaylandı', 'success');
            return back();
        } else {
            Alert::alert('Hata', 'Rezarvasyon isteği onaylanırken hata oluştu', 'error');
            return back();
        }
    }

    public function reservationsPage()
    {
        $reservations =
            DB::table('reservations')
                ->join('cars', 'reservations.car_id', '=', 'cars.id')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->orderBy('reservations.reservationStartDate', 'DESC')
                ->get();

        return view('admin.reservationsall')->with('reservations', $reservations);
    }

    public function userList()
    {
        $users = User::where('isAdmin', '=', 0)->get();

        return view('admin.userlist')->with('users', $users);
    }

    public function userEdit($id)
    {
        $user = User::find($id);

        return view('admin.userupdate')->with('user', $user);
    }

    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'user_tc' => 'required',
            'name' => 'required',
            'user_city' => 'required',
            'user_phone' => 'required',
            'user_birthday' => 'required',
        ]);

        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->user_tc = $request->user_tc;
        $user->user_city = $request->user_city;
        $user->user_phone = $request->user_phone;
        $user->user_birthday = $request->user_birthday;
        if ($user->save()) {
            Alert::alert('Başarılı', 'Üye başarıyla düzenlendi', 'success');
        } else {
            Alert::alert('Hata', 'Üye düzenlenirken hata oluştu', 'error');
        }
        return back();
    }

}
