<?php

namespace Modules\Menu\Events;

use Illuminate\Queue\SerializesModels;

class MenuUpdateEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
