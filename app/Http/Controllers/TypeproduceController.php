<?php

namespace App\Http\Controllers;

use App\type_produce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeproduceController extends Controller {
	public function getHome() {
		return view('admin.trangchu');
	}
	public function getDanhsach() {
		$typepro = type_produce::all();
		return view('admin.type_produce.danhsach', ['typepro' => $typepro]);
	}
	public function getThem() {

		return view('admin.type_produce.them');
	}

	public function postThem(Request $request) {
		$this->validate($request,
			[
				'id' => 'required|unique:type_produce,id',
				'name' => 'required',
			],
			[
				'id.required' => 'Bạn chưa nhập id',
				'id.unique' => 'ID đã tồn tại',
				'name.required' => 'Bạn chưa nhập ten',
			]);

		$typepro = new type_produce;
		$typepro->id = $request->id;
		$typepro->name = $request->name;
		$typepro->save();

		return redirect('admin/type_produce/danhsach')->with('thongbao', 'Thêm thành công');
	}

	public function getSua($id) {
		$typepro = type_produce::find($id);
		return view('admin.type_produce.sua', ['typepro' => $typepro]);
	}

	public function postSua(Request $request, $id) {
		$this->validate($request,
			[
				'name' => 'required',
			],
			[
				'name.required' => 'Bạn chưa nhập họ và tên',

			]);
		$typepro = type_produce::find($id);
		$typepro->name = $request->name;
		$typepro->save();
		return redirect('admin/type_produce/danhsach')->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$typepro = type_produce::find($id);
		$typepro->delete();
		return redirect('admin/type_produce/danhsach')->with('thongbao', 'Xóa thành công');
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
