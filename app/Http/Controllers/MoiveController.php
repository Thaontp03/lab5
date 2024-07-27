<?php

namespace App\Http\Controllers;

use App\Models\Gene;
use App\Models\Moive;
use Illuminate\Http\Request;

class MoiveController extends Controller
{
    public function index(){
        $moives = Moive::paginate(10);
        return view('admin.moives',compact('moives'));
    }
    //Hiển thị form thêm mới
    public function create()
    {
        $genes = Gene::all();
        return view('admin.create', compact('genes'));
    }

    //Lưu dữ liệu thêm mới vào database
    public function store(Request $request)
    {
        $data = $request->except('poster'); //hàm except để loại bỏ key poster

        $data['poster'] = ''; //Trường hợp người dùng không nhập ảnh

        //nếu người dùng nhập ảnh
        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('posters');
            $data['poster'] = $path_poster;
        }

        //lưu dữ liệu vào database
        Moive::query()->create($data);

        return redirect()->route('moive.index')->with('message', 'Thêm dữ liệu thành công');
    }

    //Xóa dữ liệu
    public function destroy(Moive $moive)
    {
        $moive->delete();
        return redirect()->route('moive.index')->with('message', 'Xóa dữ liệu thành công!');
    }
    // //hiển thị form edit
    public function edit(Moive $moive){
        $genes = Gene::all();
        return view('admin.update', compact('genes', 'moive'));
    }
    //lưu dư liệu cập nhật vào database
    public function update(Request $request, Moive $moive){
        $data = $request->except('poster');
        $old_poster = $moive -> poster;
        //nếu không cập nhật ảnh
        $data['poster'] = $old_poster;
        //nếu cập nhật ảnh
        if($request->hasFile('poster')){
            $path_poster = $request->file('poster')->store('posters');
            $data['poster'] = $path_poster;
        }
        //lưu và database
        $moive->update($data);
        //xóa ảnh cũ
        if(isset($path_poster)){
            if(file_exists('storage/' .$old_poster)){
                unlink('storage/'. $old_poster);
            }
        }
        return redirect()->back()->with('message','Cập nhật thành công!');
    }
    public function detail(Moive $moive){
        return view('admin.detail', ['moive'=>$moive]);
    }
    public function search(Request $request){
        $query = $request->input('search');
        $moives = Moive::where('title','LIKE','%'.$query.'%')->get();
        return view('admin.search',compact('moives'));
    }
}
