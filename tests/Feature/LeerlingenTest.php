<?php


use App\Models\User;

test('Leerlingen overview screen can only be redered for logged in teachers', function () {
    $user = User::factory()->create(
        ['role' => 'zwem_docent']
    );
    $this->actingAs($user)->assertAuthenticated();

    $response = $this->get('/leerlingen');
    $response->assertStatus(200);
});
