<?php

namespace App\Repository;

use App\Models\Page;
use App\Repository\Interface\PageRepositoryInterface;

class PageRepository implements PageRepositoryInterface
{
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function index()
    {
        return $this->page->all();
    }

    public function store(array $data)
    {
        return $this->page->create($data);
    }

    public function find($id)
    {
        return $this->page->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $page = $this->page->find($id);
        if ($page) {
            $page->update($data);
            return $page;
        }
        return null;
    }

    public function destroy($id)
    {
        $page = $this->page->find($id);
        if ($page) {
            return $page->delete();
        }
        return false;
    }
}
