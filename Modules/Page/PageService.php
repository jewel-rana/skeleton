<?php


namespace Modules\Page;


use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Product;
use Modules\Page\Repository\PageRepositoryInterface;

class PageService
{
    /**
     * @var PageRepositoryInterface
     */
    private $repository;

    public function __construct(PageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data + ['user_id' => auth()->user()->id]);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }


}
