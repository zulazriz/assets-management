<?php declare(strict_types=1);

require_once(__DIR__."/../support/helpers.php");

use PHPUnit\Framework\TestCase;
use RazerMerchantServices\Payment as RmsPayment;

final class PaymentTest extends TestCase
{
    private static $orderid = null;
    private static $amount = null;
    private static $bill_name = null;
    private static $bill_email = null;
    private static $bill_mobile = null;
    private static $logbuf = [];

    public static function setupBeforeClass(): void
    {
        self::$orderid = "TEST-ORDER";
        self::$amount = "1.10";
        self::$bill_name = "TEST USER";
        self::$bill_email = "test@phpunit.com";
        self::$bill_mobile = "+60123456789";
    }

    public function testCanHandleInstantiationErrors(): RmsPayment
    {
        $rms = new RmsPayment(env('RMS_MERCHANT_ID'), env('RMS_VERIFY_KEY'), env('RMS_SECRET_KEY'), env('RMS_ENVIRONMENT'));
        
        $this->assertEquals(
            RmsPayment::class,
            get_class($rms)
        );

        // TODO: add handling for invalid instantiations
        //       and then test the errors here
        // $this->expectException(InvalidArgumentException::class);

        return $rms;
    }

    /**
     * @depends testCanHandleInstantiationErrors
     */
    public function testCanCreatePaymentLink(RmsPayment $rms): string
    {
        $url = $rms->getPaymentUrl(
            self::$orderid, 
            self::$amount, 
            self::$bill_name, 
            self::$bill_email, 
            self::$bill_mobile
        );

        writelog("Url - $url");
        // check payment type
        $this->assertIsString($url);

        // check url must start with https://
        $this->assertStringStartsWith("https://", $url);

        // check domain must be pointing to correct endpoint
        if (env("RMS_ENVIRONMENT") == "sandbox") {
            $this->assertStringStartsWith("https://sandbox.merchant.razer.com", $url);
        } else {
            $this->assertStringStartsWith("https://pay.merchant.razer.com", $url);
        }

        return $url;
    }

    /**
     * @depends testCanCreatePaymentLink
     */
    public function testUrlContainsRequiredParameters(string $url): string
    {
        // check url must contain required parameters
        $this->assertStringContainsString("orderid=".self::$orderid, $url);
        $this->assertStringContainsString("amount=".self::$amount, $url);
        $this->assertStringContainsString("bill_name=".urlencode(self::$bill_name), $url);
        $this->assertStringContainsString("bill_email=".urlencode(self::$bill_email), $url);
        $this->assertStringContainsString("bill_mobile=".urlencode(self::$bill_mobile), $url);
        $this->assertStringContainsString("bill_desc=".urlencode("RMS PHP Library"), $url);

        return $url;
    }

    /**
     * @depends testUrlContainsRequiredParameters
     */
    public function testVcodeIsProperlyCalculated(string $url): void
    {
        $amount = number_format(self::$amount*1, 2, '.', '');
        writelog("Amount: $amount");
        $calculatedVcode = md5($amount . env('RMS_MERCHANT_ID') . self::$orderid . env('RMS_VERIFY_KEY'));
        writelog("Calculated Vcode - $calculatedVcode");
        // check url contains valid vcode
        $this->assertStringContainsString("&vcode=$calculatedVcode", $url);
    }

    /**
     * @depends testCanHandleInstantiationErrors
     */
    public function testCanVerifyValidSkey($rms) : void
    {
        $request = (object)[
            "tranID" => 1000,
            "amount" => "1.10",
            "orderid" => "TEST-ORDER",
            "status" => "00",
            "currency" => "MYR",
            "paydate" => date("Ymd H:i:s"),
            "domain" => env("RMS_MERCHANT_ID"),
            "appcode" => "123456",
        ];

        $key = md5($request->tranID.$request->orderid.$request->status.$request->domain.$request->amount.$request->currency);
        $request->skey = md5($request->paydate.$request->domain.$key.$request->appcode.env('RMS_SECRET_KEY'));

        $this->assertTrue(
            $rms->verifySignature($request->paydate, $request->domain, $key, $request->appcode, $request->skey)
        );
    }

    /**
     * @depends testCanHandleInstantiationErrors
     */
    public function testCanVerifyInvalidSkey($rms) : void
    {
        $request = (object)[
            "tranID" => 1000,
            "amount" => "1.10",
            "orderid" => "TEST-ORDER",
            "status" => "00",
            "currency" => "MYR",
            "paydate" => date("Ymd H:i:s"),
            "domain" => env("RMS_MERCHANT_ID"),
            "appcode" => "123456",
        ];

        $key = md5($request->tranID.$request->orderid.$request->status.$request->domain.$request->amount.$request->currency);
        $request->skey = "just-a-tampered-skey";

        $this->assertNotTrue(
            $rms->verifySignature($request->paydate, $request->domain, $key, $request->appcode, $request->skey)
        );
    }
}
