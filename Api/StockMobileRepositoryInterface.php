<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface StockMobileRepositoryInterface
{

    /**
     * Save StockMobile
     * @param \SArtaza\StockMobile\Api\Data\StockMobileInterface $stockMobile
     * @return \SArtaza\StockMobile\Api\Data\StockMobileInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \SArtaza\StockMobile\Api\Data\StockMobileInterface $stockMobile
    );

    /**
     * Retrieve StockMobile
     * @param string $stockmobileId
     * @return \SArtaza\StockMobile\Api\Data\StockMobileInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($stockmobileId);

    /**
     * Retrieve StockMobile matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \SArtaza\StockMobile\Api\Data\StockMobileSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete StockMobile
     * @param \SArtaza\StockMobile\Api\Data\StockMobileInterface $stockMobile
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \SArtaza\StockMobile\Api\Data\StockMobileInterface $stockMobile
    );

    /**
     * Delete StockMobile by ID
     * @param string $stockmobileId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($stockmobileId);

    /**
     * Save multiple StockMobile items
     * @param \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveRequestInterface $bulkSaveRequest
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function bulkSave(\SArtaza\StockMobile\Api\Data\StockMobileBulkSaveRequestInterface $bulkSaveRequest);
}

