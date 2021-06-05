<?php


namespace Modules\Deal\Http\View;


use Illuminate\View\View;
use Modules\Category\CategoryService;
use Modules\Deal\DealService;
use Modules\Deal\Entities\DealType;

class DealTypeComposer
{
    /**
     * The user repository implementation.
     *
     * @var
     */
    protected $deals;

    /**
     * Create a new profile composer.
     *
     * @param DealService $deals
     */
    public function __construct( DealService $deals)
    {
        $this->deals = $deals;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with([
            'deal_type_lists' => $this->deals->getDealTypeDropdown(),
        ]);
    }
}
