<?php

namespace RFM\Event\Api;

use RFM\Repository\ItemData;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * API event. Dispatched each time an archive has been extracted.
 */
class AfterFileExtractEvent extends Event
{
    final public const NAME = 'api.after.file.extract';

    /**
     * AfterFileExtractEvent constructor.
     */
    public function __construct(protected \RFM\Repository\ItemData $itemData, protected array $filesList)
    {
    }

    /**
     * @return ItemData
     */
    public function getArchiveData()
    {
        return $this->itemData;
    }

    /**
     * Return archive content.
     *
     * @return array
     */
    public function getArchiveContent()
    {
        return $this->filesList;
    }
}