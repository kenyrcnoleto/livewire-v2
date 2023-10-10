<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\CriarUsuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use function \Pest\Livewire\livewire;
use function Pest\Laravel\assertDatabaseHas;


    //use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    /*public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    } */

    /** @test */
    test('the_component_can_render', function()
    {
        $component = livewire(CriarUsuario::class);

        $component->assertStatus(200);
    });

    /** @test */
   
    it('it_should_be_able_to_create_an_user', function()
        {
            livewire(CriarUsuario::class)
                ->set('name', 'Jeremias')
                ->set('email', 'jeremias@email.com')
                ->call('save')  //chama o método
                ->assertHasNoErrors();   //verifica se tem algum erro acontecendo


                //verificar se o usuáiro existe no bd
                assertDatabaseHas('users',[
                    'name' => 'Jeremias',
                    'email' => 'jeremias@email.com'
                ]);
        });

    /** @test */
    
    test('name_should_be_required', function()
    {
        livewire(CriarUsuario::class)
            ->set('name', null)
            ->call('save')
            ->assertHasErrors([
                'name' => 'required'
            ]);
    });

    /** @test */
    it( 'it_should_make_sure_that_live_validation_is_working', function()
    {
        //forma de testar o updated
        livewire(CriarUsuario::class)
        ->set('name', 'Jeremias')
        ->assertHasNoErrors()
        ->set('name','')     
        ->assertHasErrors([
            'name' => 'required'
        ]);   
    });

    /** @test */
    it('it_should_emit_an_event_after_creating', function()
    {
        livewire(CriarUsuario::class)
                ->set('name', 'Jeremias')
                ->set('email', 'jeremias@email.com')
                ->call('save')
                ->assertHasNoErrors()
                ->assertEmitted('user::created');   

    });
    
    /** @test */
    it('it_should_make_sure_that_the_form_is_being_reset', function()
    {
        livewire(CriarUsuario::class)
                ->set('name', 'Jeremias')
                ->set('email', 'jeremias@email.com')
                ->call('save')
                ->assertHasNoErrors()
                ->assertSet('name', '')
                ->assertSet('email', '');
    });

    
    //Verificar e menssagem que será exibida na tela
    it('should_check_the_html_if_has_a_certain_message', function() {
        livewire(CriarUsuario::class)
        ->set('name', 'teste')
        ->set('email', 'rafael@email.com')
        ->call('save')
        ->assertSee('uuu Jeremias!!Deu ruim');
    });

