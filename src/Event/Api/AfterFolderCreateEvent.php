<?php

namespace RFM\Event\Api;

use Symfony\Contracts\EventDispatcher\Event;
use RFM\Repository\ItemData;

/**
 * API event. Dispatched each time a new folder is created.
 */
class AfterFolderCreateEvent extends Event
{
    final public const NAME = 'api.after.folder.create';

    /**
     * AfterFolderCreateEvent constructor.
     */
    public function __construct(protected \RFM\Repository\ItemData $itemData)
    {
    }

    /**
     * @return ItemData
     */
    public function getFolderData()
    {
        return $this->itemData;
    }
}