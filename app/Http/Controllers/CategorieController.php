<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Categorie\CreateCategoryRequest;
use App\Http\Requests\Categorie\UpdateCategoryRequest;

class CategorieController extends Controller
{
    public function showCategories()
    {
        return view('Categories.index');
    }

    public function getAllCategories()
    {
      
        $categories = Category::get(); //With funciona mientras hace una consulta
        return response()->json(['categories' => $categories],200);

    }

    public function getAllCategoriesForDataTable()
    {
        $categories = Category::get();
		return DataTables::of($categories)
			->addColumn('action', function ($row) {
				return "<a
				href='#'
				onclick='event.preventDefault();'
				data-id='{$row->id}'
				role='edit'
				class='btn btn-warning btn-sm'>Edit</a> 
				<a
				href='#'
				onclick='event.preventDefault();'
				data-id='{$row->id}'
				role='delete'
				class='btn btn-danger btn-sm'>Delete</a>";
			})
			->rawColumns(['action'])
			->make();    
    }
    public function getACategory(Category $category)
    {
      
         //Load funciona despues de haber echo una consulta
        return response()->json(['category' => $category],200);

    }

    public function getAnCategory(Category $category)
    {

        return response()->json(['category' => $category],200);

    }

    public function createCategory(CreateCategoryRequest $request)
    {

        $category = new Category($request->all());
        $category->save();
        return response()->json(['category' => $category],201);

    }

    public function updateCategories(Category $category, UpdateCategoryRequest $request)
    {

        
        $category->update($request->all());
        return response()->json(['category' => $category->refresh()],201);

    }

    public function deleteCategories(Category $category)
    {

        $category->delete();
        return response()->json([],204);

    }

    public function saveCategory(Request $request)
	{
		$category = new Category($request->all());
		$category->save();
		return response()->json(['category' => $category], 201);
	}

    public function updateCategory(Category $category, Request $request)
    {
        $requestAll = $request->all();
        $category->update($requestAll);
        return response()->json(['category' => $category->refresh()],201);
    }

     public function deleteCategory(Category $category){

        $category->delete();
        return response()->json([],204);

    }

}
