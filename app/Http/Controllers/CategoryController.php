<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('category.index')->with('success','Data Kategori berhasil di Simpan');
    }

    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        Category::whereId($id)->update($category_data);
        return redirect()->route('category.index')->with('success', 'Data Berhasil di Update');
    }

    public function destroy($id)
    {
    
        $category = Category::findorfail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Data Berhasil di Hapus');
    }
}
