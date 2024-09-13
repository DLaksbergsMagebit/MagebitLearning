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
     * ACL resource string used to check if the user has permission to access content elements in the admin.
     */
    const ADMIN_RESOURCE = 'Magento_Backend::content_elements';

    /**
     * Identifier for the active menu item in the admin panel's navigation.
     */
    const ACTIVE_MENU = 'Magebit_Faq::faq';

    /**
     * Label for the parent breadcrumb used for navigation in the FAQ admin panel.
     */
    const BREADCRUMB_PARENT = 'Frequently Asked Questions';

    /**
     * Title used for displaying the page title in the FAQ question section in the admin panel.
     */
    const PAGE_TITLE = 'FAQ Question';

    /**
     * URL parameter key for the FAQ question's ID used in the request.
     */
    const ID_PARAM = 'id';


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
        private readonly Context              $context,
        protected readonly PageFactory        $resultPageFactory,
        protected readonly QuestionRepository $questionRepository,
        protected readonly QuestionFactory    $questionFactory,
        protected readonly JsonFactory        $jsonFactory,
        protected readonly Filter             $filter,
        protected readonly CollectionFactory  $collectionFactory,
        protected readonly QuestionManager    $questionManager
    ) {
        parent::__construct($context);
    }

    /**
     * Abstract method to be implemented by subclasses.
     * This method must be implemented by any concrete subclass to handle specific
     * actions such as save, delete, or edit.
     */
    abstract public function execute();
}
