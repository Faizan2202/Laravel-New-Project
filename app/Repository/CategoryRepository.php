<?php

namespace App\Repository;

use App\Models\Category;
use App\Repository\Interface\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        return $categories = Category::all();
    }

    public function store(array $data)
    {
        return $this->category->create($data);
    }

    public function find($id)
    {
        return $this->category->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $page = $this->category->find($id);
        if ($page) {
            $page->update($data);
            return $page;
        }
        return null;
    }

    public function destory($id)
    {
        $page = $this->category->find($id);
        if ($page) {
            return $category->delete();
        }
        return false;
    }
    
}
