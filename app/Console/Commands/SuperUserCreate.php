<?php

namespace Laxcore\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class SuperUserCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xhunter:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear un super usuario';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Nombre del Usuario: ');
        $email = $this->ask('Correo del Usuario: ');
        $password = $this->secret('Contraseña del Usuario: ');
        $confirmPassword = $this->secret('Confirme la Contraseña del Usuario: ');

        if ($password === $confirmPassword) {
            if ($this->confirm('Estas Seguro de Crear a este Usuario: "'. $name . '"?')) {
                // Creación del usuario
                $user = \Xhunter\Models\User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password)
                ]);

                // Asignación del rol
                $user->assignRole(1);
                return $this->info('Usuario Agregado con éxito: ' . $user->name);
            }

            $this->warn(ucwords('no se ha agregado ningun nuevo usuario'));
        } else {
            $this->error('Upss La contraseña no coincide!');
        }
    }
}
