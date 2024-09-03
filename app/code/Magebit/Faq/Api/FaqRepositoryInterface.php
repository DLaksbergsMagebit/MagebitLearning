<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit <info@magebit.com>
 * @license   MIT
 */

namespace Magebit\Faq\Api;

use Magebit\Faq\Api\Data\FaqInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface FaqRepositoryInterface
{
    public function getById($id);
    public function save(FaqInterface $faq);
    public function getList(SearchCriteriaInterface $searchCriteria);
    public function delete(FaqInterface $faq);
    public function deleteById($id);
}
