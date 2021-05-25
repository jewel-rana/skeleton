<?php


namespace Modules\Deal\Http\View;


use Illuminate\View\View;
use Modules\Deal\DealService;

class DealComposer
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
        $this->deals->getDeals()->groupBy('deal_type')->each(function($item, $key) use($view) {
            $view->with([
                str_replace(' ', '_', strtolower($key)) => $item,
            ]);
        });
    }
}
