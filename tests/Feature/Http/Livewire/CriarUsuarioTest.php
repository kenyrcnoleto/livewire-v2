<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\CriarUsuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CriarUsuarioTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    /*public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    } */

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(CriarUsuario::class);

        $component->assertStatus(200);
    }

    /** @test */
   
        public function it_should_be_able_to_create_an_user()
        {
            Livewire::test(CriarUsuario::class)
                ->set('name', 'Jeremias')
                ->set('email', 'jeremias@email.com')
                ->call('save')  //chama o método
                ->assertHasNoErrors();   //verifica se tem algum erro acontecendo


                //verificar se o usuáiro existe no bd
                $this->assertDatabaseHas('users',[
                    'name' => 'Jeremias',
                    'email' => 'jeremias@email.com'
                ]);
        }

    /** @test */
    
    public function name_should_be_required()
    {
        Livewire::test(CriarUsuario::class)
            ->set('name', null)
            ->call('save')
            ->assertHasErrors([
                'name' => 'required'
            ]);
    }

    /** @test */
    public function it_should_make_sure_that_live_validation_is_working()
    {
        //forma de testar o updated
        Livewire::test(CriarUsuario::class)
        ->set('name', 'Jeremias')
        ->assertHasNoErrors()
        ->set('name','')     
        ->assertHasErrors([
            'name' => 'required'
        ]);   
    }

    /** @test */
    public function it_should_emit_an_event_after_creating()
    {
        Livewire::test(CriarUsuario::class)
                ->set('name', 'Jeremias')
                ->set('email', 'jeremias@email.com')
                ->call('save')
                ->assertHasNoErrors()
                ->assertEmitted('user::created');   

    }
    
    /** @test */
    public function it_should_make_sure_that_the_form_is_being_reset()
    {
        Livewire::test(CriarUsuario::class)
                ->set('name', 'Jeremias')
                ->set('email', 'jeremias@email.com')
                ->call('save')
                ->assertHasNoErrors()
                ->assertSet('name', '')
                ->assertSet('email', '');
    }
}
