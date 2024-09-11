<?php
/**
 * @copyright Copyright (c) 2024 Magebit, Ltd. (https://magebit.com/)
 * @author    Magebit
 * @license   MIT
 */

declare(strict_types=1);

namespace Magebit\Faq\Block\Adminhtml\Button;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use Magento\Ui\Component\Control\Container;


/**
 * Class SaveButton renders the "Save" button with options for saving and closing in the admin panel.
 *
 * @package Magebit\Faq\Block\Adminhtml\Button
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Provides configuration for the save button in the admin UI.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'magebit_faq_form.magebit_faq_form',
                                'actionName' => 'save',
                                'params' => [
                                    true,
                                    [
                                        'back' => 'continue'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            'class_name' => Container::SPLIT_BUTTON,
            'options' => $this->getOptions(),
            'sort_order' => 90,
        ];
    }

    /**
     * Implement the Save and close
     *
     * @return array
     */
    private function getOptions(): array
    {
        return [
            [
                'id_hard' => 'save_and_close',
                'label' => __('Save & Close'),
                'data_attribute' => [
                    'mage-init' => [
                        'buttonAdapter' => [
                            'actions' => [
                                [
                                    'targetName' => 'magebit_faq_form.magebit_faq_form',
                                    'actionName' => 'save',
                                    'params' => [
                                        true,
                                        [
                                            'back' => 'close'
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
