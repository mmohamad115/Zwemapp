<?php

// test('example', function () {
//     $response = $this->get('/');

//     $response->assertStatus(200);
// });

use App\Models\User;

test('leerlingen overview screen can be rendered', function(){

    $user = User::factory()->create(
        ['role' => 'zwem_docent']
    );

    $this->actingAs($user)->assertAuthenticated();
    
    $response = $this->get('leerlingen');
    $response->assertStatus(200);
});