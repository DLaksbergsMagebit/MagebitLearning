<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Controller\Adminhtml;

use Magebit\Faq\Api\QuestionManagementInterface as QuestionManager;
use Magebit\Faq\Api\QuestionRepositoryInterface as QuestionRepository;
use Magebit\Faq\Model\QuestionFactory;
use Magebit\Faq\Model\ResourceModel\Question\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Magento\Ui\Component\MassAction\Filter;

/**
 * Abstract class for common FAQ question backend functionality.
 *
 * @package Magebit\Faq\Controller\Adminhtml
 */
abstract class QuestionController extends Action
{
    /**
     * @var string
     */
    const string ADMIN_RESOURCE = 'Magento_Backend::content_elements';
    const string ACTIVE_MENU = 'Magebit_Faq::faq';
    const string BREADCRUMB_PARENT = 'Frequently Asked Questions';
    const string PAGE_TITLE = 'FAQ Question';
    const string ID_PARAM = 'id';

    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /**
     * @var QuestionRepository
     */
    protected QuestionRepository $questionRepository;

    /**
     * @var QuestionFactory
     */
    protected QuestionFactory $questionFactory;

    /**
     * @var JsonFactory
     */
    protected JsonFactory $jsonFactory;

    /**
     * @var Filter
     */
    protected Filter $filter;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @var QuestionManager
     */
    protected QuestionManager $questionManager;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param QuestionRepository $questionRepository
     * @param QuestionFactory $questionFactory
     * @param JsonFactory $jsonFactory
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     * @param QuestionManager $questionManager
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        QuestionRepository $questionRepository,
        QuestionFactory $questionFactory,
        JsonFactory $jsonFactory,
        Filter $filter,
        CollectionFactory $collectionFactory,
        QuestionManager $questionManager
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->questionRepository = $questionRepository;
        $this->questionFactory = $questionFactory;
        $this->jsonFactory = $jsonFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->questionManager = $questionManager;
        parent::__construct($context);
    }

    /**
     * Abstract method to be implemented by subclasses.
     * This method must be implemented by any concrete subclass to handle specific
     * actions such as save, delete, or edit.
     */
    abstract public function execute();
}
