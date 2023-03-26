<?php

namespace Likemusic\BamboraCheckout\Parameters\Parts;

/**
 * @see https://dev.na.bambora.com/docs/references/checkout/#order-info
 */
interface OrderInfoParameters
{
    const TRN_AMOUNT = 'trnAmount'; // The total amount for the transaction including tax and additional fees.
    // Max 2 decimal places. Max 9 digits total.
    const TRN_ORDER_NUMBER = 'trnOrderNumber'; // The invoice or order ID you want associated with the transaction.
    // Up to 30 characters.

    const TRN_TYPE = 'trnType'; // P - Purchase. PA - Pre-Authorization.

    const TRN_CARD_OWNER = 'trnCardOwner'; // The name of the cardholder. 4-64 characters.

    const TRN_LANGUAGE = 'trnLanguage'; // eng - English, fre - French.
}
