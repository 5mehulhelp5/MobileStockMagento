<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Model\Data;

use SArtaza\StockMobile\Api\Data\StockMobileBulkSaveRequestInterface;

class StockMobileBulkSaveRequest implements StockMobileBulkSaveRequestInterface
{
    /**
     * @var \SArtaza\StockMobile\Api\Data\StockMobileInterface[]
     */
    private $items;

    /**
     * Get items
     * @return \SArtaza\StockMobile\Api\Data\StockMobileInterface[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set items
     * @param \SArtaza\StockMobile\Api\Data\StockMobileInterface[] $items
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveRequestInterface
     */
    public function setItems(array $items)
    {
        $this->items = $items;
        return $this;
    }
}
