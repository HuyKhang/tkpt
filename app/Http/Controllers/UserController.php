<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
	public function getHome() {
		return view('admin.trangchu');
	}
	public function getDanhsach() {
		$user = User::all();
		return view('admin.user.danhsach', ['user' => $user]);
	}
	public function getThem() {

		return view('admin.user.them');
	}

	public function postThem(Request $request) {
		$this->validate($request,
			[
				'email' => 'required|email|unique:users,email',
				'password' => 'required|min:6|max:100',
				'confirmpassword' => 'required|same:password',
				'name' => 'required',
				'phone' => 'required',
				'image' => 'required',
			],
			[
				'email.required' => 'Bạn chưa nhập email',
				'email.email' => 'Đây không phải là email',
				'email.unique' => 'Email đã tồn tại',
				'password.required' => 'Bạn chưa nhập mật khẩu',
				'password.min' => 'Phải có ít nhất 6 ký tự',
				'password.max' => 'Phải có tối đa 100 ký tự',
				'nhaplaipassword.required' => 'Bạn chưa nhập mật khẩu',
				'nhaplaipassword.same' => 'Nhập lại mật khẩu không trùng',
				'name.required' => 'Bạn chưa nhập họ và tên',
				'phone.required' => 'Bạn chưa nhập số điện thoại',
				'image.required' => 'Bạn chưa chọn hình ảnh',

			]);

		$user = new User;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->name = $request->name;
		$user->gender = $request->gender;
		$user->phone = $request->phone;
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$duoifile = $file->getClientOriginalExtension();
			if ($duoifile != 'jpg' && $duoifile != 'png' && $duoifile != 'jpeg') {
				return redirect('admin/user/them')->with('loi', 'Đuôi file phải là jpg,png,jpeg');
			}
			$name = $file->getClientOriginalName();
			$image = str_random(4) . "_" . $name;
			while (file_exists("upload/user/" . $image)) {
				$image = str_random(4) . "_" . $name;
			}
			$file->move("upload/user/", $image);
			$user->image = $image;
		} else {
			$user->image = "";
		}
		$user->position = $request->position;
		$user->save();

		return redirect('admin/user/danhsach')->with('thongbao', 'Thêm thành công');
	}

	public function getSua($id) {
		$user = User::find($id);
		return view('admin.user.sua', ['user' => $user]);
	}

	public function postSua(Request $request, $id) {
		$this->validate($request,
			[

				'name' => 'required',
				'phone' => 'required',

			],
			[
				'name.required' => 'Bạn chưa nhập họ và tên',
				'phone.required' => 'Bạn chưa nhập số điện thoại',

			]);
		$user = User::find($id);
		$user->email = $request->email;
		$user->name = $request->name;
		$user->gender = $request->gender;
		$user->phone = $request->phone;
		if ($request->changeimage == "on") {
			if ($request->hasFile('image')) {
				$file = $request->file('image');
				$duoifile = $file->getClientOriginalExtension();
				if ($duoifile != 'jpg' && $duoifile != 'png' && $duoifile != 'jpeg') {
					return redirect('admin/user/sua')->with('loi', 'Đuôi file phải là jpg,png,jpeg');
				}
				$name = $file->getClientOriginalName();
				$image = str_random(4) . "_" . $name;
				while (file_exists("upload/user/" . $image)) {
					$image = str_random(4) . "_" . $name;
				}
				$file->move("upload/user/", $image);
				$user->image = $image;
			} else {
				$user->image = "";
			}
		}
		$user->position = $request->position;

		if ($request->changepassword == "on") {
			$this->validate($request,
				[
					'password' => 'required|min:6|max:100',
					'confirmpassword' => 'required|same:password',

				],
				[
					'password.required' => 'Bạn chưa nhập mật khẩu',
					'password.min' => 'Phải có ít nhất 6 ký tự',
					'password.max' => 'Phải có tối đa 100 ký tự',
					'confirmpassword.required' => 'Bạn chưa nhập mật khẩu',
					'confirmpassword.same' => 'Nhập lại mật khẩu không trùng',
				]);
			$user->password = bcrypt($request->password);
		}
		$user->save();
		return redirect('admin/user/sua/' . $id)->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$user = User::find($id);
		$user->delete();
		return redirect('admin/user/danhsach')->with('thongbao', 'Xóa thành công');
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
