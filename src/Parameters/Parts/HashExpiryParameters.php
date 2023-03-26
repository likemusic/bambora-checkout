<?php

namespace Likemusic\BamboraCheckout\Parameters\Parts;

/**
 * @see https://dev.na.bambora.com/docs/references/checkout/#hash-expiry
 */
interface HashExpiryParameters
{
    const HASH_EXPIRY = 'hashExpiry'; // The time when the hash secured link will expire. The format is YYYYMMDDHHMM on PST.
}
