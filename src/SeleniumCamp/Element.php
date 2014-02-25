<?php
namespace SeleniumCamp;

class Element
{
    private $strategy;

    private $value;

    /**
     * @var \PHPUnit_Extensions_Selenium2TestCase_Element|\PHPUnit_Extensions_Selenium2TestCase
     */
    private $context;

    /**
     * @var \PHPUnit_Extensions_Selenium2TestCase
     */
    private $testCase;

    public function __construct($strategy, $value, $context, $testCase)
    {
        $this->testCase = $testCase;
        $this->strategy = $strategy;
        $this->value = $value;
        $this->context = $context;
    }

    /**
     * @return \PHPUnit_Extensions_Selenium2TestCase_Element
     */
    public function waitForElement()
    {
        return $this->testCase->waitUntil(function() {
            $element = $this->context->element($this->testCase->using($this->strategy)->value($this->value));
            return $element && $element->displayed() ? $element : null;
        }, 10000);
    }
}
