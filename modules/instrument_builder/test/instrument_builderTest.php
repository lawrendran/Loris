<?php
/**
 * Instrument_builder automated integration tests
 *
 * PHP Version 5
 *
 * @category Test
 * @package  Loris
 * @author   Ted Strauss <ted.strauss@mcgill.ca>
 * @author   Wang Shen <wangshen.mcin@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @link     https://github.com/aces/Loris
 */
use Facebook\WebDriver\WebDriverBy;
require_once __DIR__ .
              "/../../../test/integrationtests/LorisIntegrationTest.class.inc";
/**
 * Instrument_builder automated integration tests
 *
 * PHP Version 5
 *
 * @category Test
 * @package  Loris
 * @author   Ted Strauss <ted.strauss@mcgill.ca>
 * @author   Wang Shen <wangshen.mcin@gmail.com>
 * @license  http://www.gnu.org/licenses/gpl-3.0.txt GPLv3
 * @link     https://github.com/aces/Loris
 */
class InstrumentBuilderTestIntegrationTest extends LorisIntegrationTest
{
    /**
     * Tests that, when loading the Instrument builder module, some
     * text appears in the body.
     *
     * @return void
     */
    function testInstrumentBuilderDoespageLoad()
    {
        $this->safeGet($this->url . "/instrument_builder/");
        $bodyText = $this->safeFindElement(WebDriverBy::cssSelector("body"))
            ->getText();
        $this->assertStringContainsString("Instrument Builder", $bodyText);
    }
    /**
     * Tests that, when loading the Instrument builder module with permission, some
     * text appears in the body.
     *
     * @return void
     */
    function testInstrumentBuilderDoespageLoadWithPermission()
    {
        $this->setupPermissions(["instrument_builder"]);
        $this->safeGet($this->url . "/instrument_builder/");
        $bodyText = $this->safeFindElement(WebDriverBy::cssSelector("body"))
            ->getText();
        $this->assertStringContainsString("Instrument Builder", $bodyText);
        $this->resetPermissions();
    }
    /**
     * Tests that, when loading the Instrument builder module without permisson, some
     * text appears in the body.
     *
     * @return void
     */
    function testInstrumentBuilderDoespageLoadWithoutPermission()
    {
        $this->setupPermissions([""]);
        $this->safeGet($this->url . "/instrument_builder/");
        $bodyText = $this->safeFindElement(WebDriverBy::cssSelector("body"))
            ->getText();
        $this->assertStringContainsString(
            "You do not have access to this page.",
            $bodyText
        );
        $this->resetPermissions();
    }

}

