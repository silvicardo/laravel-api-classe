<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

  public function index(){

    $allCategories = Category::all();

    return response()->json($allCategories);

  }

  public function create(Request $request){

    $userData = $request->all();

    $userData['slug'] = Str::slug($userData['name']);

    $newCategory = new Category;
    $newCategory->fill($userData);
    $newCategory->save();

    return response()->json($newCategory);

  }

  public function show($id) {

    $category = Category::find($id);

    if (empty($category)) {
      return response()->json([
        'error' => 'nessuna categoria con questo id'
      ]);
    }

    return response()->json($category);

  }

  public function destroy($id) {

    $category = Category::find($id);

    if (empty($category)) {
      return response()->json([
        'error' => 'nessuna categoria con questo id'
      ]);
    }

    $category->delete();

    return response()->json([]);

  }


}
