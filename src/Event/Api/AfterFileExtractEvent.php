<?php

namespace RFM\Event\Api;

use RFM\Repository\ItemData;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * API event. Dispatched each time an archive has been extracted.
 */
class AfterFileExtractEvent extends Event
{
    const NAME = 'api.after.file.extract';

    /**
     * @var ItemData
     */
    protected $itemData;

    /**
     * @var array
     */
    protected $filesList;

    /**
     * AfterFileExtractEvent constructor.
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