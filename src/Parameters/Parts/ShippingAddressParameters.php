<?php

namespace Likemusic\BamboraCheckout\Parameters\Parts;

interface ShippingAddressParameters
{
    const SHIP_NAME = 'shipName'; // The name of the contact receiving the shipment. Up to 64 characters.

    const SHIP_EMAIL_ADDRESS = 'shipEmailAddress'; // The shipping contact's email address in a valid email format. Up to 64 characters.

    const SHIP_ADDRESS_1 = 'shipAddress1'; // The shipping contact's destination address. Up to 32 characters.

    const SHIP_ADDRESS_2 = 'shipAddress2'; // The second line of the shipping contact's destination address. Up to 32 characters

    const SHIP_CITY = 'shipCity'; // The shipping contact's destination city. Up to 32 characters.

    const SHIP_PROVINCE = 'shipProvince'; // The shipping contact's province or state destination.
    // As a variable, the two-letter ISO code. Provinces and States.

    const SHIP_POSTAL_CODE = 'shipPostalCode'; // The shipping contact's postal or ZIP code. Up to 16 characters.

    const SHIP_COUNTRY = 'shipCountry'; // The shipping contact's destination country. As a variable, the two-letter ISO code.

    const SHIP_PHONE_ADDRESS = 'shipPhoneAddress'; // The shipping contact's phone number. Up to 32 characters.
}
