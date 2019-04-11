<?php

namespace App\Http\Controllers;

use App\manufacturer;
use App\produce;
use App\type_produce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class produceController extends Controller {
	public function getHome() {
		return view('admin.trangchu');
	}
	public function getDanhsach() {
		$pro = produce::all();
		return view('admin.produce.danhsach', ['pro' => $pro]);
	}
	public function getThem() {
		$typepro = type_produce::all();
		$manu = manufacturer::all();
		return view('admin.produce.them', ['typepro' => $typepro, 'manu' => $manu]);
	}

	public function postThem(Request $request) {
		$this->validate($request,
			[
				'id' => 'required|unique:produce,id',
				'id_type' => 'required',
				'id_manu' => 'required',
				'name' => 'required',
				'price' => 'required',
				'description' => 'required',
				'image' => 'required',
			],
			[
				'id.required' => 'Bạn chưa nhập id',
				'id.unique' => 'ID đã tồn tại',
				'id_type.required' => 'Bạn chưa chọn loại sản phẩm',
				'id_manu.required' => 'Bạn chưa chọn hãng sane xuất',
				'name.required' => 'Bạn chưa nhập tên sản phẩm',
				'price.required' => 'Bạn chưa nhập giá sản phẩm',
				'description.required' => 'Đề nghị nhập thông tin chi tiết sản phẩm',
				'image.required' => 'Bạn chưa chọn hình ảnh',

			]);

		$pro = new produce;
		$pro->id = $request->id;
		$pro->id_type = $request->id_type;
		$pro->id_manu = $request->id_manu;
		$pro->name = $request->name;
		$pro->price = $request->price;
		$pro->description = $request->description;
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$duoifile = $file->getClientOriginalExtension();
			if ($duoifile != 'jpg' && $duoifile != 'png' && $duoifile != 'jpeg') {
				return redirect('admin/produce/them')->with('loi', 'Đuôi file phải là jpg,png,jpeg');
			}
			$name = $file->getClientOriginalName();
			$image = str_random(4) . "_" . $name;
			while (file_exists("upload/produce/" . $image)) {
				$image = str_random(4) . "_" . $name;
			}
			$file->move("upload/produce/", $image);
			$pro->image = $image;
		} else {
			$pro->image = "";
		}
		$pro->save();

		return redirect('admin/produce/danhsach')->with('thongbao', 'Thêm thành công');
	}

	public function getSua($id) {
		$typepro = type_produce::all();
		$manu = manufacturer::all();
		$pro = produce::find($id);
		return view('admin.produce.sua', ['pro' => $pro, 'typepro' => $typepro, 'manu' => $manu]);
	}

	public function postSua(Request $request, $id) {
		$this->validate($request,
			[
				'name' => 'required',
				'price' => 'required',
				'description' => 'required',

			],
			[
				'name.required' => 'Bạn chưa nhập tên sản phẩm',
				'price.required' => 'Bạn chưa nhập giá sản phẩm',
				'description.required' => 'Đề nghị nhập thông tin chi tiết sản phẩm',

			]);
		$pro = produce::find($id);
		$pro->id = $request->id;
		$pro->id_type = $request->id_type;
		$pro->id_manu = $request->id_manu;
		$pro->name = $request->name;
		$pro->price = $request->price;
		$pro->description = $request->description;
		if ($request->changeimage == "on") {
			if ($request->hasFile('image')) {
				$file = $request->file('image');
				$duoifile = $file->getClientOriginalExtension();
				if ($duoifile != 'jpg' && $duoifile != 'png' && $duoifile != 'jpeg') {
					return redirect('admin/produce/them')->with('loi', 'Đuôi file phải là jpg,png,jpeg');
				}
				$name = $file->getClientOriginalName();
				$image = str_random(4) . "_" . $name;
				while (file_exists("upload/produce/" . $image)) {
					$image = str_random(4) . "_" . $name;
				}
				$file->move("upload/produce/", $image);
				$pro->image = $image;
			} else {
				$pro->image = "";
			}
		}
		$pro->save();
		return redirect('admin/produce/danhsach')->with('thongbao', 'Bạn đã sửa thành công');
	}

	public function getXoa($id) {
		$pro = produce::find($id);
		$pro->delete();
		return redirect('admin/produce/danhsach')->with('thongbao', 'Xóa thành công');
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
			return redirect('admin/pro/danhsach');
		} else {
			return redirect('admin/danhnhap')->with('thongbao', 'Đăng nhập thất bại');
		}
	}

	public function getDangxuatAdmin() {
		Auth::logout();
		return redirect('admin/dangnhap');
	}
}
