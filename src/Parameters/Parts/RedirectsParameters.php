<?php

namespace Likemusic\BamboraCheckout\Parameters\Parts;

/**
 * @see https://dev.na.bambora.com/docs/references/checkout/#redirects
 */
interface RedirectsParameters
{
    const APPROVED_PAGE = 'approvedPage'; // The URL the cardholder will be sent to after their transaction is approved.

    const DECLINED_PAGE = 'declinedPage'; // The URL the cardholder will be sent to after their transaction is declined.
}
