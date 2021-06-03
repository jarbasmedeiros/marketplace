<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $this->category->create($request->all());

        flash('Categoria Criada com Sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->category->findOrFail($id);
        $category->update($request->all());

        flash('Categoria Atualizada com Sucesso!')->success();
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();

        flash('Categoria Removida com Sucesso!')->success();
        return redirect()->back();
    }
}