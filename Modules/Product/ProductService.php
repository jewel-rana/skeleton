<?php


namespace Modules\Product;


use Illuminate\Http\JsonResponse;
use Modules\Product\Entities\Product;
use Modules\Product\Repository\ProductRepositoryInterface;

class ProductService
{
    /**
     * @var ProductRepositoryInterface
     */
    private $repository;

    public function __construct(ProductRepositoryInterface $repository)
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

    public function suggest(): JsonResponse
    {
        $query = Product::select('title', 'id');
        if (isset($_GET['term'])) {
            $term = request()->get('term');
            $query->where('title', 'LIKE', '%' . $term . '%');
        }
        $query = $query->paginate(15);
        $results = [];
        if ($query) {
            foreach ($query as $q) {
                $row['id'] = $q->id;
                $row['name'] = $q->title;
                array_push($results, $row);
            }
        }
        return response()->json(['results' => $results]);
    }
}
