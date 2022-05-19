<?php
namespace Tests\Selenium;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\RemoteWebElement;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Tests\TestCase;

class SeleniumTestCase extends TestCase
{
    private RemoteWebDriver $webDriver;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $url = 'http://selenium-hub:4444';
        $this->webDriver = RemoteWebDriver::create(
            $url,
            DesiredCapabilities::chrome()
        );
    }

    protected function goTo($url) {
        $this->webDriver->get($url);
    }

    protected function  fillInputById($id, $value): ?RemoteWebElement
    {
        $element = $this->getById($id);
        $element->sendKeys($value);
        return $element;
    }

    protected function click($cssSelector): ?RemoteWebElement
    {
        $element = $this->getByCss($cssSelector);
        $element->click();
        return $element;
    }

    protected function assertElementText($expectedText, $cssSelector): ?RemoteWebElement
    {
        $element  = $this->getByCss($cssSelector);
        $this->assertSame($expectedText, $element->getText() );
        return $element;
    }

    protected function getWebDriver(): WebDriver {
        return $this->webDriver;
    }

    protected function getById(string $id): ?RemoteWebElement{
        return $this->webDriver->findElement(WebDriverBy::id($id));
    }

    protected function getByCss(string $cssSelector): ?RemoteWebElement
    {
        return $this->webDriver->findElement(
            WebDriverBy::cssSelector($cssSelector)
        );
    }

    protected function getByTagName(string $tagName): ?RemoteWebElement
    {
        return $this->webDriver->findElement(
            WebDriverBy::tagName($tagName)
        );
    }

    public function __destruct()
    {
        $this->webDriver->quit();
    }
}
