<?php

namespace App\Http\Controllers;

use App\Repository\Interface\PageRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    protected $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $pages = $this->pageRepository->index();
        return view('pages.index', compact('pages'));
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->pageRepository->store($request->all());
            DB::commit();
            return redirect()->route('pages.index')->with('success', 'Page created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $page = $this->pageRepository->find($id);
        return view('pages.show', compact('page'));
    }

    public function edit($id)
    {
        $page = $this->pageRepository->find($id);
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $this->pageRepository->update($request->all(), $id);
            DB::commit();
            return redirect()->route('pages.index')->with('success', 'Page updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->pageRepository->destroy($id);
            return redirect()->route('pages.index')->with('success', 'Page deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
