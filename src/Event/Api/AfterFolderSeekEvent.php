<?php

namespace RFM\Event\Api;

use Symfony\Contracts\EventDispatcher\Event;
use RFM\Repository\ItemData;

/**
 * API event. Dispatched each time a folder contents is sought.
 */
class AfterFolderSeekEvent extends Event
{
    final public const string NAME = 'api.after.folder.seek';

    /**
     * AfterFolderSeekEvent constructor.
     *
     * @param string $searchString
     */
    public function __construct(protected \RFM\Repository\ItemData $itemData, protected $searchString, protected array $filesList)
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
     * @return string
     */
    public function getSearchString()
    {
        return $this->searchString;
    }

    /**
     * Return a list of files found.
     *
     * @return array
     */
    public function getSearchResult(): array
    {
        return $this->filesList;
    }
}