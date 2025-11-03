<?php

namespace RFM\Event\Api;

use Symfony\Contracts\EventDispatcher\Event;
use RFM\Repository\ItemData;

/**
 * API event. Dispatched each time new files have been downloaded.
 */
class AfterItemDownloadEvent extends Event
{
    final public const string NAME = 'api.after.item.download';

    /**
     * AfterItemDownloadEvent constructor.
     */
    public function __construct(protected \RFM\Repository\ItemData $itemData)
    {
    }

    /**
     * @return ItemData
     */
    public function getDownloadedItemData(): \RFM\Repository\ItemData
    {
        return $this->itemData;
    }
}