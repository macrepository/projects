<?php
namespace Macapobres\Checkout\Plugin;

use Magento\Checkout\Block\Checkout\LayoutProcessor;

class LayoutProcessors
{
    public function __construct(
        \Magento\Payment\Model\Config $paymentModelConfig
    )
    {
        $this->paymentModelConfig = $paymentModelConfig;
    }

    /* disable company from checkout page */
    public function afterProcess(
        LayoutProcessor $subject,
        array $jsLayout
    ) {
        // /* For Disable Company field from checkout page shipping form */
        // $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        // ['shippingAddress']['children']['shipping-address-fieldset']['children']['company'] = [
        //     'visible' => false
        // ];

        // $activePayments = $this->paymentModelConfig->getActiveMethods();
        // /* For Disable company field from checkout billing form */
        // if (count($activePayments)) {
        //     foreach ($activePayments as $paymentCode => $payment) {
        //         $jsLayout['components']['checkout']['children']['steps']['children']
        //         ['billing-step']['children']['payment']['children']
        //         ['payments-list']['children'][$paymentCode.'-form']['children']
        //         ['form-fields']['children']['company'] = [
        //             'visible' => false
        //         ];
        //     }
        // }

        $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
            ['payment']['children']['payments-list']['children']['free-form']['children']['form-fields']
            ['children']['city']['validation']['required-entry'] = false;

        $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
            ['payment']['children']['payments-list']['children']['checkmo-form']['children']['form-fields']
            ['children']['city']['validation']['required-entry'] = false;

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']
            ['children']['shippingAddress']['children']['shipping-address-fieldset']['children']
            ['city']['validation']['required-entry'] = false;

        // error_log(json_encode($jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']). "\n \n", 3, BP . "/var/log/data.log");

        return $jsLayout;
    }
}