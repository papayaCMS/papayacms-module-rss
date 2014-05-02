<?php
include_once(dirname(__FILE__).'/../../../../bootstrap.php');
PapayaTestCase::registerPapayaAutoloader(
  array(),
  'modules/free/rss/_classmap.php'
);

class PapayaLibModulesFreeRssReaderPageTest extends PapayaTestCase {

  /***************************************************************************/
  /** Methods                                                                */
  /***************************************************************************/

  /**
  * @covers RssReaderPage::getParsedData
  */
  public function testGetParsedData() {
    $pageBase = $this->getMock('RssReaderPageBase');
    $pageBase
      ->expects($this->once())
      ->method('setPageData')
      ->with($this->isType('array'));
    $pageBase
      ->expects($this->once())
      ->method('setPageParams')
      ->with($this->isType('array'));
    $pageBase
      ->expects($this->once())
      ->method('getXML')
      ->will($this->returnValue(TRUE));

    $chs = new RssReaderPageProxy();
    $chs->data = array();
    $chs->params = array();
    $chs->setPageBaseObject($pageBase);
    $this->assertTrue($chs->getParsedData());
  }


  /***************************************************************************/
  /** Helper / instances                                                     */
  /***************************************************************************/

  /**
  * @covers RssReaderPage::getPageBaseObject
  */
  public function testGetPageBaseObject() {
    $chs = new RssReaderPageProxy();
    $chs->papaya($this->mockPapaya()->application());
    $chs->getPageBaseObject();
    $this->assertAttributeInstanceOf('RssReaderPageBase', '_pageBaseObject', $chs);
  }

  /**
  * @covers RssReaderPage::getPageBaseObject
  */
  public function testGetPageBaseObjectAttributeAlreadySet() {
    $chs = new RssReaderPageProxy();
    $stdObject = new stdClass();
    $chs->setPageBaseObject($stdObject);

    $chs->getPageBaseObject();
    $this->assertAttributeInstanceOf('stdClass', '_pageBaseObject', $chs);
  }

  /**
  * @covers RssReaderPage::setPageBaseObject
  */
  public function testSetPageBaseObject() {
    $chs = new RssReaderPageProxy();
    $stdObject = new stdClass();
    $chs->setPageBaseObject($stdObject);

    $this->assertAttributeSame($stdObject, '_pageBaseObject', $chs);
  }

  /***************************************************************************/
  /** DataProvider                                                           */
  /***************************************************************************/

}

class RssReaderPageProxy extends RssReaderPage {

  public function __construct() {
    return;
  }

  public function setDefaultData() {
    return;
  }

  public function initializeParams() {
    return;
  }

}

