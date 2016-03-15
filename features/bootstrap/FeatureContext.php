<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;


require_once __DIR__ . '/../../classes/Calculator/Calculator.php';

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    private $first_value;
    private $second_value;
    private $result;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I have a value :arg1 and value :arg2
     */
    public function iHaveAValueAndValue($arg1, $arg2)
    {
        $this->first_value = $arg1;
        $this->second_value = $arg2;
    }

    /**
     * @When I use add function
     */
    public function iUseAddFunction()
    {
        $calc = new Calculator();

        $this->result = $calc->add($this->first_value, $this->second_value);


    }

    /**
     * @Then I should get :arg1
     */
    public function iShouldGet($arg1)
    {
        if ($this->result != $arg1) {
            throw new Exception("Adding {$this->first_value} to {$this->second_value} did not equal ".
             "to {$arg1} but instead returned '{$this->result}'");
        }
    }
}
