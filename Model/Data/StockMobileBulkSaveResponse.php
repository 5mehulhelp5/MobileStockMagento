<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SArtaza\StockMobile\Model\Data;

use SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface;

class StockMobileBulkSaveResponse implements StockMobileBulkSaveResponseInterface
{
    /**
     * @var \stdClass[]
     */
    private $errors;

    /**
     * @var int
     */
    private $totalProcessed;

    /**
     * @var int
     */
    private $successful;

    /**
     * @var int
     */
    private $failed;


    /**
     * Get errors
     * @return \stdClass[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set errors
     * @param \stdClass[] $errors
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     */
    public function setErrors(array $errors)
    {
        $this->errors = $errors;
        return $this;
    }

    /**
     * Get total processed
     * @return int
     */
    public function getTotalProcessed()
    {
        return $this->totalProcessed;
    }

    /**
     * Set total processed
     * @param int $totalProcessed
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     */
    public function setTotalProcessed($totalProcessed)
    {
        $this->totalProcessed = $totalProcessed;
        return $this;
    }

    /**
     * Get successful count
     * @return int
     */
    public function getSuccessful()
    {
        return $this->successful;
    }

    /**
     * Set successful count
     * @param int $successful
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     */
    public function setSuccessful($successful)
    {
        $this->successful = $successful;
        return $this;
    }

    /**
     * Get failed count
     * @return int
     */
    public function getFailed()
    {
        return $this->failed;
    }

    /**
     * Set failed count
     * @param int $failed
     * @return \SArtaza\StockMobile\Api\Data\StockMobileBulkSaveResponseInterface
     */
    public function setFailed($failed)
    {
        $this->failed = $failed;
        return $this;
    }
}
