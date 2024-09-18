<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    private $categoryRespository;

    public function __construct(CategoryRepositoryInterface $categoryRespository)
    {
        $this->categoryRespository = $categoryRespository;
    }

    public function index()
    {
        $category = $this->categoryRespository->index();
        return view('category.index', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $category = $this->categoryRespository->store($data);
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Page created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $category = $this->categoryRespository->find($id);
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryRespository->find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->categoryRespository->update($request->all(), $id);
            DB::commit();
            return redirect()->route('category.index')->with('success', 'Page updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->categoryRespository->destory($id);
            return redirect()->route('category.index')->with('success', 'Page deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    
}
