<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAngka25HasilFungsi5()
    {
        $angka = 25;

        $response = $this->json('GET', "api/akar-kuadrat/$angka");

        $response->assertStatus(200)
                 ->assertJson(['result' => [['hasil' => 5.0]]]);
    }

    public function testAngka64HasilFungsi8()
    {
        $angka = 64;

        $response = $this->json('GET', "api/akar-kuadrat/$angka");

        $response->assertStatus(200)
                 ->assertJson(['result' => [['hasil' => 8.0]]]);
    }

    public function testAngka783921HasilFungsi885393()
    {
        $angka = 783921;

        $response = $this->json('GET', "api/akar-kuadrat/$angka");

        $response->assertStatus(200)
                 ->assertJson(['result' => [['hasil' => 885.393]]]);
    }
}
