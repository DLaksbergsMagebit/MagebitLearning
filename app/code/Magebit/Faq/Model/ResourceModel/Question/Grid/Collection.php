<?php
/**
 * Faq grid collection
 *
 * Grid collection for rendering the Faq grid
 *
 */
declare(strict_types=1);

namespace Magebit\Faq\Model\ResourceModel\Question\Grid;

use Magebit\Faq\Model\ResourceModel\Question as ResourceModel;
use Magento\Framework\Data\Collection\Db\FetchStrategyInterface as FetchStrategy;
use Magento\Framework\Data\Collection\EntityFactoryInterface as EntityFactory;
use Magento\Framework\Event\ManagerInterface as EventManager;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;
use Psr\Log\LoggerInterface as Logger;

/**
 * Class Collection
 * @package Magebit\Faq\Model\ResourceModel\Question\Grid
 */
class Collection extends SearchResult
{
    /**
     * Collection constructor
     *
     * @param EntityFactory $entityFactory
     * @param Logger $logger
     * @param FetchStrategy $fetchStrategy
     * @param EventManager $eventManager
     * @param string $mainTable
     * @param string $resourceModel
     * @throws LocalizedException
     */
    public function __construct(
        EntityFactory $entityFactory,
        Logger $logger,
        FetchStrategy $fetchStrategy,
        EventManager $eventManager,
        string $mainTable = 'magebit_faq',  // Ensure it's string-typed
        string $resourceModel = ResourceModel::class // Ensure it's string-typed
    ) {
        parent::__construct(
            $entityFactory,
            $logger,
            $fetchStrategy,
            $eventManager,
            $mainTable,  // Pass the table name
            $resourceModel // Pass the resource model class name
        );
    }

    /**
     * Set default sorting before loading collection
     *
     * @return $this|Collection
     */
    protected function _beforeLoad(): Collection
    {
        parent::_beforeLoad();
        $this->setOrder('id', 'ASC');  // Sorting by 'id' in ascending order
        return $this;
    }
}
