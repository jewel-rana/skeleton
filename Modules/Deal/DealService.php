<?php


namespace Modules\Deal;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Modules\Deal\Entities\DealAttribute;
use Modules\Deal\Entities\DealType;
use Modules\Deal\Repository\DealRepositoryInterface;

class DealService
{
    /**
     * @var DealRepositoryInterface
     */
    private $repository;

    public function __construct(DealRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        $deal = $this->repository->create($data + ['user_id' => auth()->user()->id, 'brand_id' => 1]);
        if(request()->has('attribute')) {
            foreach($data['attribute'] as $key => $attribute) {
                DealAttribute::create([
                    'deal_id' => $deal->id,
                    'label' => $attribute['label'],
                    'value' => $attribute['value'],
                ]);
            }
        }
        return $deal;
    }

    public function update(array $data, int $id)
    {
        $deal = $this->repository->update($data, $id);
        if(request()->has('attribute')) {
            foreach(request()->input('attribute') as $key => $attribute) {
                DealAttribute::updateOrCreate(
                    [
                        'deal_id' => $id,
                        'label' => $attribute['label']
                    ],
                    [
                        'deal_id' => $id,
                        'label' => $attribute['label'],
                        'value' => $attribute['value'],
                    ]
                );
            }
        }

        return $deal;
    }

    public function getDealTypeDropdown()
    {
        return DealType::pluck('name', 'id');
    }

    public function getDeals(): Collection
    {
        return $this->repository->getAllDeals()->map(function($item, $key) {
            return [
                'id' => $item->id,
                'title' => $item->name,
                'attributes' => $item->attributes,
                'deal_type' => $item->dealType->name,
                'product_id' => $item->product_id,
                'product_price' => $item->product->price,
                'product_description' => $item->product->description,
                'brand_name' => $item->brand ? $item->brand->name : null,
                'brand_logo' => ($item->brand && $item->brand->medias) ? $item->brand->medias()->first()->attachment : null
            ];
        });
    }
}
