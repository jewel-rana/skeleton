<?php


namespace Modules\Page\Repository;


use App\Repository\BaseRepository;
use Modules\Page\Entities\Page;
use Modules\Page\Repository\PageRepositoryInterface;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }

    public function all()
    {
        return parent::all();
    }

    public function create(array $data)
    {
        return parent::create($data);
    }

    public function update(array $data, $id)
    {
        return parent::update($data,$id);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}
