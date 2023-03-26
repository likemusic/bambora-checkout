<?php

namespace Likemusic\BamboraCheckout\Parameters\Parts;
/**
 * @see https://dev.na.bambora.com/docs/references/checkout/#billing-address
 */
interface BillingAddressParameters
{
    const ORD_NAME = 'ordName'; // The billed contact's name. Up to 64 characters.

    const ORD_EMAIL_ADDRESS = 'ordEmailAddress'; // The email address of the billed contact and destination for email
    // receipts in a valid email format. Up to 64 characters.

    const ORD_ADDRESS_1 = 'ordAddress1'; // The billing address for the card holder. With Address Verification, this will
    // need to match the card issuer's records. Up to 32 characters.

    const ORD_ADDRESS_2 = 'ordAddress2'; // The second line for the card holder's billing address. Up to 32 characters

    const ORD_CITY = 'ordCity'; // The city associated with the billing address. Up to 32 characters.

    const ORD_PROVINCE = 'ordProvince'; // The province or state associated with the billing address.
    // As a variable, the two-letter ISO code.

    const ORD_POSTAL_CODE = 'ordPostalCode'; // The postal or ZIP code associated with the billing address. Up to 16 characters.

    const ORD_COUNTRY = 'ordCountry'; // The country associated with the billing address. As a variable, the two-letter ISO code.
}
