<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        return view('admin.index',compact('users','categories'));
    }
    public function categoriesList()
    {
        $categories = Category::paginate(20);
        return view('admin.categoriesList',compact('categories'));
    }
    public function categoriesAdd(Request $request)
    {
        if($request->ajax()){
            $input = request()->all();
            $category = Category::create($input);
            $category->save();
        }

        return null;

    }
    public function categoriesDelete(Request $request)
    {
        if ($request->ajax())
        {
            $id = $request->input('id');
            $category = Category::find($id);

            $category->where('id',$id)->delete();
        }
        return null;
    }
}
