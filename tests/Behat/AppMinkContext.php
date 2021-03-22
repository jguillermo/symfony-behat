<?php


namespace App\Tests\Behat;


use Behat\MinkExtension\Context\MinkContext;

final class AppMinkContext extends MinkContext
{
    /**
     * @Then I get a SUCCESSFUL response
     */
    public function iGetASuccessfulResponse(): void
    {
        $this->assertSession()->statusCodeEquals(200);
    }
}