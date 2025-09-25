<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Api\Data;

interface StockMobileBulkSaveResponseInterface
{
    const ERRORS = 'errors';
    const TOTAL_PROCESSED = 'total_processed';
    const SUCCESSFUL = 'successful';
    const FAILED = 'failed';

    /**
     * Get errors
     * @return \stdClass[]
     */
    public function getErrors();

    /**
     * Set errors
     * @param \stdClass[] $errors
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     */
    public function setErrors(array $errors);

    /**
     * Get total processed
     * @return int
     */
    public function getTotalProcessed();

    /**
     * Set total processed
     * @param int $totalProcessed
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     */
    public function setTotalProcessed($totalProcessed);

    /**
     * Get successful count
     * @return int
     */
    public function getSuccessful();

    /**
     * Set successful count
     * @param int $successful
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     */
    public function setSuccessful($successful);

    /**
     * Get failed count
     * @return int
     */
    public function getFailed();

    /**
     * Set failed count
     * @param int $failed
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     */
    public function setFailed($failed);
}
