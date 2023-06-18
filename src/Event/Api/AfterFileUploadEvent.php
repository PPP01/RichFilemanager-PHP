<?php

namespace RFM\Event\Api;

use RFM\Repository\ItemData;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * API event. Dispatched each time new files have been uploaded.
 */
class AfterFileUploadEvent extends Event
{
    final public const NAME = 'api.after.file.upload';

    /**
     * AfterFileUploadEvent constructor.
     */
    public function __construct(protected \RFM\Repository\ItemData $itemData)
    {
    }

    /**
     * @return ItemData
     */
    public function getUploadedFileData()
    {
        return $this->itemData;
    }
}