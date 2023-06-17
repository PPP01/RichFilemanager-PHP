<?php

namespace RFM\Event\Api;

use RFM\Repository\ItemData;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * API event. Dispatched each time a folder contents is read.
 */
class AfterFolderReadEvent extends Event
{
    const NAME = 'api.after.folder.read';

    /**
     * @var ItemData
     */
    protected $itemData;

    /**
     * @var array
     */
    protected $filesList;

    /**
     * AfterFolderReadEvent constructor.
     *
     * @param ItemData $itemData
     * @param array $filesList
     */
    public function __construct(ItemData $itemData, array $filesList)
    {
        $this->itemData = $itemData;
        $this->filesList = $filesList;
    }

    /**
     * @return ItemData
     */
    public function getFolderData()
    {
        return $this->itemData;
    }

    /**
     * Return folder content.
     *
     * @return array
     */
    public function getFolderContent()
    {
        return $this->filesList;
    }
}