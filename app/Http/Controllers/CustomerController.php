<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller {
	public function getHome() {
		return view('admin.trangchu');
	}
	public function getDanhsach() {
		$cust = customer::all();
		return view('admin.customer.danhsach', ['cust' => $cust]);
	}

	public function getXoa($id) {
		$cust = customer::find($id);
		$cust->delete();
		return redirect('admin/customer/danhsach')->with('thongbao', 'Xóa thành công');
	}

	public function getDangnhapAdmin() {
		return view('admin.login');
	}
	public function postDangnhapAdmin(Request $request) {
		$this->validate($request,
			[
				'email' => 'required',
				'password' => 'required|min:6|max:100',
			],
			[
				'email.required' => 'Bạn chưa nhập email',
				'password.required' => 'Bạn chưa nhập mật khẩu',
				'password.min' => 'Phải có ít nhất 6 ký tự',
				'password.max' => 'Phải có tối đa 100 ký tự',
			]);
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			return redirect('admin/trangchu');
		} else {
			return redirect('admin/danhnhap')->with('thongbao', 'Đăng nhập thất bại');
		}
	}

	public function getDangxuatAdmin() {
		Auth::logout();
		return redirect('admin/dangnhap');
	}
}
