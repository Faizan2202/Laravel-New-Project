<?php
namespace App\Repository\Interface;

interface CategoryRepositoryInterface{
    public function index();
    public function store(array $data);
    public function find($id);
    public function update(array $data, $id);
    public function destory($id);
    
}
?>