<?php
namespace SeleniumCamp;

class TestCase extends \PHPUnit_Extensions_Selenium2TestCase
{
    const URL = 'http://booking.uz.gov.ua/';

    public function __construct($name = NULL, array $data = array(), $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->setupSpecificBrowser([
            'browserName' => 'firefox',
            'host' => 'windows.host'
        ]);
        $this->setBrowserUrl(self::URL);
    }

    /**
     * @param $strategy
     * @param $value
     * @return \PHPUnit_Extensions_Selenium2TestCase_Element
     */
    protected function _waitForElement($strategy, $value)
    {
        return $this->waitUntil(function() use ($strategy, $value) {
            $element = $this->element($this->using($strategy)->value($value));
            return $element && $element->displayed() ? $element : null;
        });
    }
}
