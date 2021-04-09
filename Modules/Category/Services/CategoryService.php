<?php

namespace Modules\Category\Services;


use Illuminate\Http\Request;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Category\Repositories\CategoryRepositoryInterface;

class CategoryService
{
    private $cateRepository;

    public function __construct(CategoryRepositoryInterface $cateRepository)
    {
        $this->cateRepository = $cateRepository;
    }

    public function all()
    {
        return $this->cateRepository->all();
    }

    public function create(Request $request)
    {
        $cate = [
            "name" => $request->name,
            "alias" => changeTitle($request->name),
            'order' => $request->order,
            'parent_id' => $request->listCate,
            'keywords' => $request->keywords,
            'description' => $request->description,
        ];
        return $this->cateRepository->create($cate);
    }


    public function find($id)
    {
        return $this->cateRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        $cate = [
            "name" => $request->name,
            "alias" => changeTitle($request->name),
            'order' => $request->order,
            'parent_id' => $request->listCate,
            'keywords' => $request->keywords,
            'description' => $request->description,
        ];

        return $this->cateRepository->update($cate, $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
