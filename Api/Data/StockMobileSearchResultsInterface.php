<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Api\Data;

interface StockMobileSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get StockMobile list.
     * @return \SArtaza\StockMobile\Api\Data\StockMobileInterface[]
     */
    public function getItems();

    /**
     * Set Source list.
     * @param \SArtaza\StockMobile\Api\Data\StockMobileInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

