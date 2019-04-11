<?php

namespace App\Http\Controllers;

use App\manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManufacturerController extends Controller {
	public function getHome() {
		return view('admin.trangchu');
	}
	public function getDanhsach() {
		$manu = manufacturer::all();
		return view('admin.manufacturer.danhsach', ['manu' => $manu]);
	}
	public function getThem() {

		return view('admin.manufacturer.them');
	}

	public function postThem(Request $request) {
		$this->validate($request,
			[
				'id' => 'required|unique:manufacturer,id',
				'name' => 'required',
			],
			[
				'id.required' => 'Bạn chưa nhập id',
				'id.unique' => 'ID đã tồn tại',
				'name.required' => 'Bạn chưa nhập ten',
			]);

		$manu = new manufacturer;
		$manu->id = $request->id;
		$manu->name = $request->name;
		$manu->save();

		return redirect('admin/manufacturer/danhsach')->with('thongbao', 'Thêm thành công');
	}

	public function getSua($id) {
		$manu = manufacturer::find($id);
		return view('admin.manufacturer.sua', ['manu' => $manu]);
	}

	public function postSua(Request $request, $id) {
		$this->validate($request,
			[
				'name' => 'required',
			],
			[
				'name.required' => 'Bạn chưa nhập họ và tên',

			]);
		$manu = manufacturer::find($id);
		$manu->name = $request->name;
		$manu->save();
		return redirect('admin/manufacturer/danhsach')->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$manu = manufacturer::find($id);
		$manu->delete();
		return redirect('admin/manufacturer/danhsach')->with('thongbao', 'Xóa thành công');
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
			return redirect('admin/user/danhsach');
		} else {
			return redirect('admin/danhnhap')->with('thongbao', 'Đăng nhập thất bại');
		}
	}

	public function getDangxuatAdmin() {
		Auth::logout();
		return redirect('admin/dangnhap');
	}
}
