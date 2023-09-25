<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    //  Path Testing
    public function testHasilFungsiValid()
    {
        $angka = 25;

        $response = $this->json('GET', "api/akar-kuadrat/$angka");

        $response->assertStatus(200)
                 ->assertJson(['result' => [['hasil' => 5.0]]]);
    }

    /**
     * Test the hitungAkarKuadrat function with a number exceeding the threshold.
     *
     * @return void
     */

    public function testNilaiString()
    {
        $angka = 'inistring';

        $response = $this->json('GET', "api/akar-kuadrat/$angka");

        $response->assertJson(
            ['error' => 'Input Tidak Boleh String']
        );
    }
    
    // Boundary Testing
    public function testAngkaMelebihiBatas()
    {
        $angka = 350000000000000000000000000000000;

        $response = $this->json('GET', "api/akar-kuadrat/$angka");

        $response->assertStatus(400)
                 ->assertJson(['error' => 'Angka Melebihi Batas Float']);
    }

    public function testAngkaNegatif()
    {
        $angka = -1;

        $response = $this->json('GET', "api/akar-kuadrat/$angka");

        $response->assertJson(
            [
                'result' => [
                    [
                        'error' => 'Input Tidak Boleh Negatif'
                    ]
                ]
            ]
        );
    }
}
