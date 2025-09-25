<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Api\Data;

interface StockMobileBulkSaveRequestInterface
{
    const ITEMS = 'items';

    /**
     * Get items
     * @return \SArtaza\StockMobile\Api\Data\StockMobileInterface[]
     */
    public function getItems();

    /**
     * Set items
     * @param \SArtaza\StockMobile\Api\Data\StockMobileInterface[] $items
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveRequestInterface
     */
    public function setItems(array $items);
}
