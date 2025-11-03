<?php

namespace RFM\Event\Api;

use Symfony\Contracts\EventDispatcher\Event;
use RFM\Repository\ItemData;

/**
 * API event. Dispatched each time when file or folder is deleted.
 */
class AfterItemDeleteEvent extends Event
{
    final public const string NAME = 'api.after.item.delete';

    /**
     * AfterItemDeleteEvent constructor.
     */
    public function __construct(protected \RFM\Repository\ItemData $originalItemData)
    {
    }

    /**
     * @return ItemData
     */
    public function getOriginalItemData(): \RFM\Repository\ItemData
    {
        return $this->originalItemData;
    }
}