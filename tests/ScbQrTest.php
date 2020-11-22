<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/ScbQr.php';

/**
 * @property vansales\ScbQr ScbQr
 */
class ScbQrTest extends PHPUnit_Framework_TestCase {

  private $ScbQr;

  public function __construct() {
    $this->ScbQr = new vansales\ScbQr();
  }

  public function testformatAmount() {

    $amount = 90.2511;
    $result = $this->ScbQr->formatAmount($amount);
    $expected = '90.25';
    $this->assertEquals($expected, $result);

    $amount = 90.2561;
    $result = $this->ScbQr->formatAmount($amount);
    $expected = '90.26';
    $this->assertEquals($expected, $result);
  }

  public function testCrc16() {

    // https://www.lammertbies.nl/comm/info/crc-calculation
    $data = '00020101021230570016A00000067701011201153110400394751010206REF0010304REF253037645406555.555802TH62100706SCB0016304';
    $result = $this->ScbQr->crc16($data);
    $expected = '37C6';
    $this->assertEquals($expected, $result);
  }

}