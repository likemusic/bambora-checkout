<?php declare(strict_types=1);

use Likemusic\BamboraCheckout\PaymentUrlGenerator;
use PHPUnit\Framework\TestCase;

class PaymentUrlGeneratorTest extends TestCase
{
    const DOCS_URL = 'https://web.na.bambora.com/scripts/payment/payment.asp?merchant_id=123456789&hashValue=468155ff50e868a98626b1a5a5de6474999b04fe';

//    const FULL_PARAMS_URL = 'https://web.na.bambora.com/scripts/payment/payment.asp?merchant_id=123456789&trnAmount=10&trnOrderNumber=11&trnType=P&trnCardOwner=TEST&ordName=Test&ordEmailAddress=test@test.com&ordAddress1=Test&ordAddress2=Test&ordCity=Test&ordProvince=Test&ordPostalCode=111111&ordCountry=Test&shipName=Test&shipEmailAddress=test@test.com&shipPhoneNumber=+12345678&shipAddress1=Test&shipAddress2=Test&shipCity=Test&shipProvince=Test&shipPostalCode=111111&shipCountry=Test&approvedPage=https%3A%2F%2Ftest.com%2Fapproved&declinedPage=https%3A%2F%2Ftest.com%2Fdeclined&hashExpiry=202312311234&trnLanguage=eng&ref1=Test&ref2=Test&ref3=Test&ref4=Test&ref5=Test&hashValue=e6ba4ed74d6fe9a815de3a7cafc7e031560fe666';

    public function testDocsUrlHasNoDefaults()
    {
        $merchantId = '123456789';
        $hashKey = 'abc';

        $linkGenerator = new PaymentUrlGenerator();

        $url = $linkGenerator->makeByParams(
            $hashKey,
            $merchantId
        );

        $this->assertSame(
            self::DOCS_URL,
            $url
        );
    }

    public function testDocsUrlHasDefaultsHashKey()
    {
        $merchantId = '123456789';
        $hashKey = 'abc';

        $linkGenerator = new PaymentUrlGenerator($hashKey);

        $url = $linkGenerator->makeByParams(
            null,
            $merchantId
        );

        $this->assertSame(
            self::DOCS_URL,
            $url
        );
    }

    public function testDocsUrlHasDefaultsHashKeyAndMerchantId()
    {
        $merchantId = '123456789';
        $hashKey = 'abc';

        $linkGenerator = new PaymentUrlGenerator($hashKey, $merchantId);

        $url = $linkGenerator->makeByParams();

        $this->assertSame(
            self::DOCS_URL,
            $url
        );
    }

/*    public function testFullParamsUrlHasNoDefaults()
    {
        $linkGenerator = new PaymentUrlGenerator();

        $url = $linkGenerator->makeByParams(
            'TEST',

            // Authorization
            '123456789',

            // Order info
            10,
            11,
            'P',
            'TEST',
            'eng',

            // Billing address
            'Test',
            'test@test.com',
            'Test',
            'Test',
            'Test',
            'Test',
            '111111',
            'Test',

            // Shipping address
            'Test',
            'test@test.com',
            'Test',
            'Test',
            'Test',
            'Test',
            '111111',
            'Test',
            '+12345678',

            // Redirects
            'https://test.com/approved',
            'https://test.com/declined',

            // Hash expiry
            '202312311234',

            // References info
            'Test',
            'Test',
            'Test',
            'Test',
            'Test'
        );

        $this->assertSame(
            self::FULL_PARAMS_URL,
            $url
        );

    }
*/
}
