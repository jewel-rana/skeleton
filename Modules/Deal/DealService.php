<?php


namespace Modules\Deal;


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
            foreach($data['attribute'] as $key => $attribute) {
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
}
