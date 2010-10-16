<?php
require_once("HARTestCase.php");

/**
 * Test content of the Schema tab.
 */ 
class HAR_TestRequestBody extends HAR_TestCase
{
    public function testUrlParams()
    {
        print "\nHAR Test URL Params";

        $viewer_base = $GLOBALS["harviewer_base"];
        $test_base = $GLOBALS["test_base"];

        $url = $viewer_base."?path=".$test_base."tests/hars/url-params.har";
        $this->open($url);

        // The Preview tab must be selected
        $this->assertElementContainsText("css=.PreviewTab.selected", "Preview");

        // There must be one page (expanded).
        $this->assertElementContainsText("css=.pageRow.opened",
            "Test Case for encoded ampersand in URL");

        // Expand the only request entry.
        $this->click("css=.netFullHrefLabel.netHrefLabel.netLabel");

        // There must be one page (expanded).
        $this->assertElementContainsText("css=.pageRow.opened",
            "Test Case for encoded ampersand in URL");

        $this->assertElementExists("css=.netInfoRow");
        $this->click("css=.ParamsTab.tab");

        $this->assertElementContainsText("css=.tabParamsBody.tabBody.selected ",
            "value11value22value33");
    }
}
?>
