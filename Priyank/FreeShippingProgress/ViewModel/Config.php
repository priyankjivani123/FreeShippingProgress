<?php
namespace Priyank\FreeShippingProgress\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Configuration ViewModel for Free Shipping Progress
 */
class Config implements ArgumentInterface
{
    public const XML_PATH_ENABLED = 'free_shipping_bar/configuration/enabled';
    public const XML_PATH_MIN_AMOUNT = 'free_shipping_bar/configuration/min_amount';
    public const XML_PATH_MSG_BEFORE = 'free_shipping_bar/configuration/message_before';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Config constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Check if free shipping progress bar is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLED);
    }

    /**
     * Get minimum amount for free shipping
     *
     * @return float
     */
    public function getMinAmount(): float
    {
        return (float) $this->scopeConfig->getValue(self::XML_PATH_MIN_AMOUNT);
    }

    /**
     * Get message displayed before the progress bar
     *
     * @return string
     */
    public function getBeforeMessage(): string
    {
        return (string) $this->scopeConfig->getValue(self::XML_PATH_MSG_BEFORE);
    }

    /**
     * Get full configuration array for JS
     *
     * @return array
     */
    public function getConfigArray(): array
    {
        return [
            'enabled'        => $this->isEnabled(),
            'min_amount'     => $this->getMinAmount(),
            'before_message' => $this->getBeforeMessage()
        ];
    }
}
