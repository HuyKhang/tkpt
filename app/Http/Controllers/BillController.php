<?php

namespace App\Http\Controllers;

use App\bills;
use App\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller {
	public function getHome() {
		return view('admin.trangchu');
	}
	public function getDanhsach() {
		$cust = customer::all();
		$bill = bills::all();
		return view('admin.bills.danhsach', ['bill' => $bill, 'cust' => $cust]);
	}

	public function viewBill(Request $request, $id) {
		if ($request->ajax()) {
			$bill = bills::with('produce')->where('id_bills', 'id')->get();
			$html = view('admin::components.bill', compact('bill'))->render();
			return \response()->json($html);
		}
	}

	public function getXoa($id) {
		$bill = bills::find($id);
		$bill->delete();
		return redirect('admin/bills/danhsach')->with('thongbao', 'Xóa thành công');
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
