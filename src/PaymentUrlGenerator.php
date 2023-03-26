<?php

namespace Likemusic\BamboraCheckout;

use Likemusic\BamboraCheckout\Parameters\LinkParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\AuthorizationParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\BillingAddressParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\HashExpiryParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\OrderInfoParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\RedirectsParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\ReferencesInfoParameters;
use Likemusic\BamboraCheckout\Parameters\Parts\ShippingAddressParameters;

class PaymentUrlGenerator
{
    private string $baseUrl;

    private array $defaults = [];


    private ?string $hashKey = null;

    public function __construct(
        string $hashKey = null,

        // Authorization
               $merchantId = null,

        // Order info
               $trnAmount = null,
               $trnOrderNumber = null,
               $trnType = null,
               $trnCardOwner = null,
               $trnLanguage = null,

        // Billing address
               $ordName = null,
               $ordEmailAddress = null,
               $ordAddress1 = null,
               $ordAddress2 = null,
               $ordCity = null,
               $ordProvince = null,
               $ordPostalCode = null,
               $ordCountry = null,

        // Shipping address
               $shipName = null,
               $shipEmailAddress = null,
               $shipAddress1 = null,
               $shipAddress2 = null,
               $shipCity = null,
               $shipProvince = null,
               $shipPostalCode = null,
               $shipCountry = null,
               $shipPhoneAddress = null,

        // Redirects
               $approvedPage = null,
               $declinedPage = null,

        // Hash expiry
               $hashExpiry = null,

        // References info
               $ref1 = null,
               $ref2 = null,
               $ref3 = null,
               $ref4 = null,
               $ref5 = null,

               $baseUrl = 'https://web.na.bambora.com/scripts/payment/payment.asp'
    )
    {
        $this->hashKey = $hashKey;
        $this->baseUrl = $baseUrl;

        $this->defaults = $this->paramsToFilteredArray(
        // Authorization
            $merchantId,

            // Order info
            $trnAmount,
            $trnOrderNumber,
            $trnType,
            $trnCardOwner,
            $trnLanguage,

            // Billing address
            $ordName,
            $ordEmailAddress,
            $ordAddress1,
            $ordAddress2,
            $ordCity,
            $ordProvince,
            $ordPostalCode,
            $ordCountry,

            // Shipping address
            $shipName,
            $shipEmailAddress,
            $shipAddress1,
            $shipAddress2,
            $shipCity,
            $shipProvince,
            $shipPostalCode,
            $shipCountry,
            $shipPhoneAddress,

            // Redirects
            $approvedPage,
            $declinedPage,

            // Hash expiry
            $hashExpiry,

            // References info
            $ref1,
            $ref2,
            $ref3,
            $ref4,
            $ref5,
        );
    }

    private function paramsToFilteredArray(
        // Authorization
        $merchantId = null,

        // Order info
        $trnAmount = null,
        $trnOrderNumber = null,
        $trnType = null,
        $trnCardOwner = null,
        $trnLanguage = null,

        // Billing address
        $ordName = null,
        $ordEmailAddress = null,
        $ordAddress1 = null,
        $ordAddress2 = null,
        $ordCity = null,
        $ordProvince = null,
        $ordPostalCode = null,
        $ordCountry = null,

        // Shipping address
        $shipName = null,
        $shipEmailAddress = null,
        $shipAddress1 = null,
        $shipAddress2 = null,
        $shipCity = null,
        $shipProvince = null,
        $shipPostalCode = null,
        $shipCountry = null,
        $shipPhoneAddress = null,

        // Redirects
        $approvedPage = null,
        $declinedPage = null,

        // Hash expiry
        $hashExpiry = null,

        // References info
        $ref1 = null,
        $ref2 = null,
        $ref3 = null,
        $ref4 = null,
        $ref5 = null
    ): array
    {
        $paramsArray = $this->paramsToArray(
        // Authorization
            $merchantId,

            // Order info
            $trnAmount,
            $trnOrderNumber,
            $trnType,
            $trnCardOwner,
            $trnLanguage,

            // Billing address
            $ordName,
            $ordEmailAddress,
            $ordAddress1,
            $ordAddress2,
            $ordCity,
            $ordProvince,
            $ordPostalCode,
            $ordCountry,

            // Shipping address
            $shipName,
            $shipEmailAddress,
            $shipAddress1,
            $shipAddress2,
            $shipCity,
            $shipProvince,
            $shipPostalCode,
            $shipCountry,
            $shipPhoneAddress,

            // Redirects
            $approvedPage,
            $declinedPage,

            // Hash expiry
            $hashExpiry,

            // References info
            $ref1,
            $ref2,
            $ref3,
            $ref4,
            $ref5,
        );

        return array_filter($paramsArray);
    }

    private function paramsToArray(
        // Authorization
        $merchantId = null,

        // Order info
        $trnAmount = null,
        $trnOrderNumber = null,
        $trnType = null,
        $trnCardOwner = null,
        $trnLanguage = null,

        // Billing address
        $ordName = null,
        $ordEmailAddress = null,
        $ordAddress1 = null,
        $ordAddress2 = null,
        $ordCity = null,
        $ordProvince = null,
        $ordPostalCode = null,
        $ordCountry = null,

        // Shipping address
        $shipName = null,
        $shipEmailAddress = null,
        $shipAddress1 = null,
        $shipAddress2 = null,
        $shipCity = null,
        $shipProvince = null,
        $shipPostalCode = null,
        $shipCountry = null,
        $shipPhoneAddress = null,

        // Redirects
        $approvedPage = null,
        $declinedPage = null,

        // Hash expiry
        $hashExpiry = null,

        // References info
        $ref1 = null,
        $ref2 = null,
        $ref3 = null,
        $ref4 = null,
        $ref5 = null
    ): array
    {
        return [
            // Authorization
            AuthorizationParameters::MERCHANT_ID => $merchantId,

            // Order info
            OrderInfoParameters::TRN_AMOUNT => $trnAmount,
            OrderInfoParameters::TRN_ORDER_NUMBER => $trnOrderNumber,
            OrderInfoParameters::TRN_TYPE => $trnType,
            OrderInfoParameters::TRN_CARD_OWNER => $trnCardOwner,
            OrderInfoParameters::TRN_LANGUAGE => $trnLanguage,

            // Billing address
            BillingAddressParameters::ORD_NAME => $ordName,
            BillingAddressParameters::ORD_EMAIL_ADDRESS => $ordEmailAddress,
            BillingAddressParameters::ORD_ADDRESS_1 => $ordAddress1,
            BillingAddressParameters::ORD_ADDRESS_2 => $ordAddress2,
            BillingAddressParameters::ORD_CITY => $ordCity,
            BillingAddressParameters::ORD_PROVINCE => $ordProvince,
            BillingAddressParameters::ORD_POSTAL_CODE => $ordPostalCode,
            BillingAddressParameters::ORD_COUNTRY => $ordCountry,

            // Shipping address
            ShippingAddressParameters::SHIP_NAME => $shipName,
            ShippingAddressParameters::SHIP_EMAIL_ADDRESS => $shipEmailAddress,
            ShippingAddressParameters::SHIP_ADDRESS_1 => $shipAddress1,
            ShippingAddressParameters::SHIP_ADDRESS_2 => $shipAddress2,
            ShippingAddressParameters::SHIP_CITY => $shipCity,
            ShippingAddressParameters::SHIP_PROVINCE => $shipProvince,
            ShippingAddressParameters::SHIP_POSTAL_CODE => $shipPostalCode,
            ShippingAddressParameters::SHIP_COUNTRY => $shipCountry,
            ShippingAddressParameters::SHIP_PHONE_ADDRESS => $shipPhoneAddress,

            // Redirects
            RedirectsParameters::APPROVED_PAGE => $approvedPage,
            RedirectsParameters::DECLINED_PAGE => $declinedPage,

            // Hash expiry
            HashExpiryParameters::HASH_EXPIRY => $hashExpiry,

            // References info
            ReferencesInfoParameters::REF1 => $ref1,
            ReferencesInfoParameters::REF2 => $ref2,
            ReferencesInfoParameters::REF3 => $ref3,
            ReferencesInfoParameters::REF4 => $ref4,
            ReferencesInfoParameters::REF5 => $ref5,
        ];
    }

    public function make(...$args): string
    {
        return is_array($args[0])
            ? $this->makeByArray($args[0])
            : $this->makeByParams(...$args);
    }

    public function makeByArray(array $params): string
    {
        return $this->makeByParams(
            // Order info
            $params[LinkParameters::TRN_AMOUNT] ?? null,
            $params[LinkParameters::TRN_ORDER_NUMBER] ?? null,
            $params[LinkParameters::TRN_TYPE] ?? null,
            $params[LinkParameters::TRN_CARD_OWNER] ?? null,
            $params[LinkParameters::TRN_LANGUAGE] ?? null,

            // Billing address
            $params[LinkParameters::ORD_NAME] ?? null,
            $params[LinkParameters::ORD_EMAIL_ADDRESS] ?? null,
            $params[LinkParameters::ORD_ADDRESS_1] ?? null,
            $params[LinkParameters::ORD_ADDRESS_2] ?? null,
            $params[LinkParameters::ORD_CITY] ?? null,
            $params[LinkParameters::ORD_PROVINCE] ?? null,
            $params[LinkParameters::ORD_POSTAL_CODE] ?? null,
            $params[LinkParameters::ORD_COUNTRY] ?? null,

            // Shipping address
            $params[LinkParameters::SHIP_NAME] ?? null,
            $params[LinkParameters::SHIP_EMAIL_ADDRESS] ?? null,
            $params[LinkParameters::SHIP_ADDRESS_1] ?? null,
            $params[LinkParameters::SHIP_ADDRESS_2] ?? null,
            $params[LinkParameters::SHIP_CITY] ?? null,
            $params[LinkParameters::SHIP_PROVINCE] ?? null,
            $params[LinkParameters::SHIP_POSTAL_CODE] ?? null,
            $params[LinkParameters::SHIP_COUNTRY] ?? null,
            $params[LinkParameters::SHIP_PHONE_ADDRESS] ?? null,

            // Redirects
            $params[LinkParameters::APPROVED_PAGE] ?? null,
            $params[LinkParameters::DECLINED_PAGE] ?? null,

            // Hash expiry
            $params[LinkParameters::HASH_EXPIRY] ?? null,

            // References info
            $params[LinkParameters::REF1] ?? null,
            $params[LinkParameters::REF2] ?? null,
            $params[LinkParameters::REF3] ?? null,
            $params[LinkParameters::REF4] ?? null,
            $params[LinkParameters::REF5] ?? null,

            // Authorization
            $params[LinkParameters::MERCHANT_ID] ?? null,

            $params[LinkParameters::HASH_KEY] ?? null,
        );
    }

    public function makeByParams(
        // Order info
        $trnAmount = null,
        $trnOrderNumber = null,
        $trnType = null,
        $trnCardOwner = null,
        $trnLanguage = null,

        // Billing address
        $ordName = null,
        $ordEmailAddress = null,
        $ordAddress1 = null,
        $ordAddress2 = null,
        $ordCity = null,
        $ordProvince = null,
        $ordPostalCode = null,
        $ordCountry = null,

        // Shipping address
        $shipName = null,
        $shipEmailAddress = null,
        $shipAddress1 = null,
        $shipAddress2 = null,
        $shipCity = null,
        $shipProvince = null,
        $shipPostalCode = null,
        $shipCountry = null,
        $shipPhoneAddress = null,

        // Redirects
        $approvedPage = null,
        $declinedPage = null,

        // Hash expiry
        $hashExpiry = null,

        // References info
        $ref1 = null,
        $ref2 = null,
        $ref3 = null,
        $ref4 = null,
        $ref5 = null,

        // Authorization
        $merchantId = null,

        string $hashKey = null
    ): string
    {
        $resultQueryString = $this->getResultQueryStringByParams(
        // Order info
            $trnAmount,
            $trnOrderNumber,
            $trnType,
            $trnCardOwner,
            $trnLanguage,

            // Billing address
            $ordName,
            $ordEmailAddress,
            $ordAddress1,
            $ordAddress2,
            $ordCity,
            $ordProvince,
            $ordPostalCode,
            $ordCountry,

            // Shipping address
            $shipName,
            $shipEmailAddress,
            $shipAddress1,
            $shipAddress2,
            $shipCity,
            $shipProvince,
            $shipPostalCode,
            $shipCountry,
            $shipPhoneAddress,

            // Redirects
            $approvedPage,
            $declinedPage,

            // Hash expiry
            $hashExpiry,

            // References info
            $ref1,
            $ref2,
            $ref3,
            $ref4,
            $ref5,

            // Authorization
            $merchantId,

            $hashKey,
        );

        return "{$this->baseUrl}?{$resultQueryString}";
    }

    private function getResultQueryStringByParams(
        // Order info
        $trnAmount = null,
        $trnOrderNumber = null,
        $trnType = null,
        $trnCardOwner = null,
        $trnLanguage = null,

        // Billing address
        $ordName = null,
        $ordEmailAddress = null,
        $ordAddress1 = null,
        $ordAddress2 = null,
        $ordCity = null,
        $ordProvince = null,
        $ordPostalCode = null,
        $ordCountry = null,

        // Shipping address
        $shipName = null,
        $shipEmailAddress = null,
        $shipAddress1 = null,
        $shipAddress2 = null,
        $shipCity = null,
        $shipProvince = null,
        $shipPostalCode = null,
        $shipCountry = null,
        $shipPhoneAddress = null,

        // Redirects
        $approvedPage = null,
        $declinedPage = null,

        // Hash expiry
        $hashExpiry = null,

        // References info
        $ref1 = null,
        $ref2 = null,
        $ref3 = null,
        $ref4 = null,
        $ref5 = null,

        // Authorization
        $merchantId = null,

        string $hashKey = null
    ): string
    {
        $hashedParams = $this->getHashedParams(
        // Order info
            $trnAmount,
            $trnOrderNumber,
            $trnType,
            $trnCardOwner,
            $trnLanguage,

            // Billing address
            $ordName,
            $ordEmailAddress,
            $ordAddress1,
            $ordAddress2,
            $ordCity,
            $ordProvince,
            $ordPostalCode,
            $ordCountry,

            // Shipping address
            $shipName,
            $shipEmailAddress,
            $shipAddress1,
            $shipAddress2,
            $shipCity,
            $shipProvince,
            $shipPostalCode,
            $shipCountry,
            $shipPhoneAddress,

            // Redirects
            $approvedPage,
            $declinedPage,

            // Hash expiry
            $hashExpiry,

            // References info
            $ref1,
            $ref2,
            $ref3,
            $ref4,
            $ref5,

            // Authorization
            $merchantId
        );

        $hashedQueryString = http_build_query($hashedParams);
        $resultHashKey = $this->getResultHashKey($hashKey);
        $hashedString = $hashedQueryString . $resultHashKey;
        $hashValue = $this->hash($hashedString);

        $resultParams = array_merge($hashedParams, ['hashValue' => $hashValue]);

        return http_build_query($resultParams);
    }

    private function getHashedParams(
        // Order info
        $trnAmount = null,
        $trnOrderNumber = null,
        $trnType = null,
        $trnCardOwner = null,
        $trnLanguage = null,

        // Billing address
        $ordName = null,
        $ordEmailAddress = null,
        $ordAddress1 = null,
        $ordAddress2 = null,
        $ordCity = null,
        $ordProvince = null,
        $ordPostalCode = null,
        $ordCountry = null,

        // Shipping address
        $shipName = null,
        $shipEmailAddress = null,
        $shipAddress1 = null,
        $shipAddress2 = null,
        $shipCity = null,
        $shipProvince = null,
        $shipPostalCode = null,
        $shipCountry = null,
        $shipPhoneAddress = null,

        // Redirects
        $approvedPage = null,
        $declinedPage = null,

        // Hash expiry
        $hashExpiry = null,

        // References info
        $ref1 = null,
        $ref2 = null,
        $ref3 = null,
        $ref4 = null,
        $ref5 = null,

        // Authorization
        $merchantId = null
    ): array
    {
        $params = $this->paramsToFilteredArray(
        // Authorization
            $merchantId,

            // Order info
            $trnAmount,
            $trnOrderNumber,
            $trnType,
            $trnCardOwner,
            $trnLanguage,

            // Billing address
            $ordName,
            $ordEmailAddress,
            $ordAddress1,
            $ordAddress2,
            $ordCity,
            $ordProvince,
            $ordPostalCode,
            $ordCountry,

            // Shipping address
            $shipName,
            $shipEmailAddress,
            $shipAddress1,
            $shipAddress2,
            $shipCity,
            $shipProvince,
            $shipPostalCode,
            $shipCountry,
            $shipPhoneAddress,

            // Redirects
            $approvedPage,
            $declinedPage,

            // Hash expiry
            $hashExpiry,

            // References info
            $ref1,
            $ref2,
            $ref3,
            $ref4,
            $ref5,
        );

        return $params + $this->defaults;
    }

    private function getResultHashKey(string $hashKey = null): string
    {
        return $hashKey ?? $this->hashKey;
    }

    private function hash(string $str): string
    {
        return hash('sha1', $str);
    }
}
