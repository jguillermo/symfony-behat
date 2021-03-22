<?php

declare(strict_types=1);

namespace App\Tests\Behat;


use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behatch\Context\RestContext;
use Behatch\HttpCall\Request;

final class AppRestContext extends RestContext
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * Sends a HTTP request
     *
     * @When I make a GET request to :url
     */
    public function iMakeAGetRequest($url)
    {
        return $this->request->send(
            'get',
            $this->locatePath($url),
            [],
            [],
            null
        );
    }


    /**
     * Checks, whether the response content is equal to given text
     *
     * @Then I validate the response is
     */
    public function iValidateTheResponseIs(PyStringNode $expected)
    {
        $this->theResponseShouldBeEqualTo($expected);
    }

    /**
     * @Then I validate is HTML response
     */
    public function iValidateIsHTMLResponse()
    {
        $this->theHeaderShouldContain('Content-Type', "text/html");
    }
}
