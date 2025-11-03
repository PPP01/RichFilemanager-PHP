<?php

namespace RFM\Event\Api;

use RFM\Repository\ItemData;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * API event. Dispatched each time a folder contents is read.
 */
class AfterFolderReadEvent extends Event
{
    final public const string NAME = 'api.after.folder.read';

    /**
     * AfterFolderReadEvent constructor.
     */
    public function __construct(protected \RFM\Repository\ItemData $itemData, protected array $filesList)
    {
    }

    /**
     * @return ItemData
     */
    public function getFolderData(): \RFM\Repository\ItemData
    {
        return $this->itemData;
    }

    /**
     * Return folder content.
     *
     * @return array
     */
    public function getFolderContent(): array
    {
        return $this->filesList;
    }
}