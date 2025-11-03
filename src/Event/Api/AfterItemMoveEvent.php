<?php

namespace RFM\Event\Api;

use Symfony\Contracts\EventDispatcher\Event;
use RFM\Repository\ItemData;

/**
 * API event. Dispatched each time when file or folder is moved.
 */
class AfterItemMoveEvent extends Event
{
    final public const string NAME = 'api.after.item.move';

    /**
     * AfterItemMoveEvent constructor.
     */
    public function __construct(protected \RFM\Repository\ItemData $itemData, protected \RFM\Repository\ItemData $originalItemData)
    {
    }

    /**
     * @return ItemData
     */
    public function getItemData(): \RFM\Repository\ItemData
    {
        return $this->itemData;
    }

    /**
     * @return ItemData
     */
    public function getOriginalItemData(): \RFM\Repository\ItemData
    {
        return $this->originalItemData;
    }
}