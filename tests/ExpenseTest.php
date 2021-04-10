<?php

use Illuminate\Http\Response;

class ExpenceTest extends TestCase
{
    /**
     * Test list expences
     *
     * @return void
     */
    public function testListExpence()
    {
        $this->get('/expences');
        $this->assertTrue(true);
    }

    /**
     * Test create expence
     *
     * @return void
     */
    public function testCreateExpence()
    {
        $this->post('/expences', ['reason' => 'Test expence', 'amount' => 250]);
        $jsonResponse = json_decode($this->response->getContent());
        $this->assertResponseStatus(Response::HTTP_CREATED);
        $this->assertEquals('Test expence', $jsonResponse->data->reason);
        $this->assertEquals(250, $jsonResponse->data->amount);
    }

    /**
     * Test get expence
     */
    public function testGetExpence()
    {
        $this->get('/expences/1');
        $jsonResponse = json_decode($this->response->getContent());
        $this->assertResponseOk();
        $this->assertObjectHasAttribute('reason', $jsonResponse->data);
        $this->assertObjectHasAttribute('amount', $jsonResponse->data);

    }
}
