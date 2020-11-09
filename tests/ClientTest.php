<?php

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    protected $greeter;

    public function setUp(): void
    {
        $this->greeter = new \MyGreeter\Client();
    }


    public function test_Instance()
    {
        $this->assertEquals(
            get_class($this->greeter),
            'MyGreeter\Client'
        );
    }

    public function test_getGreeting()
    {
        $this->assertTrue(
            strlen($this->greeter->getGreeting()) > 0
        );
    }

    //phpunit --bootstrap src/Client.php tests/ClientTest.php

}
