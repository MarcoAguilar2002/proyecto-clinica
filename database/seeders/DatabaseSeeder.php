<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\Secretaria; 
use App\Models\Doctor; 
use App\Models\Consultorio; 
use App\Models\Horario; 
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{
       
        
        $this->call([RoleSeeder::class,]);

        User::create([
            'name'=>'doctor2',
            'email'=>'doctor2@gmail.com',
            'password'=>Hash::make('doctor2123')
        ])->assignRole('doctor');

        User::create([
            'name'=>'doctor1',
            'email'=>'doctor1@gmail.com',
            'password'=>Hash::make('doctor1123')
        ])->assignRole('doctor');

        User::create([
            'name'=>'secretaria1',
            'email'=>'secretaria1@gmail.com',
            'password'=>Hash::make('secretaria1123')
        ])->assignRole('secretaria');

        User::create([
            'name'=>'admin1',
            'email'=>'admin1@gmail.com',
            'password'=>Hash::make('admin1123')
        ])->assignRole('admin');

        User::create([
            'name'=>'doctor3',
            'email'=>'doctor3@gmail.com',
            'password'=>Hash::make('doctor3123')
        ])->assignRole('doctor');
        
        User::create([
            'name'=>'usuario',
            'email'=>'usuario@gmail.com',
            'password'=>Hash::make('usuario123')
        ])->assignRole('usuario');
       

        Secretaria::create([
            'nombres' => 'Secretaria ',
            'apellidos' => '2',
            'dni' => '74970131',
            'celular' => '945905580',
            'fecha_nacimiento' => '2000/10/10',
            'direccion' => 'Zona FM',
            'user_id' => '3' 
        ]);

        Doctor::create([
            'nombres' => 'Doctor1',
            'apellidos' => 'Prueba',
            'codigo_colegiado' => '1234233',
            'celular' => '945905558', 
            'especialidad' => 'pediatria',
            'user_id' => '2'
        ]);

        Doctor::create([
            'nombres' => 'Doctor2',
            'apellidos' => 'Prueba',
            'codigo_colegiado' => '12342332',
            'celular' => '945905558', 
            'especialidad' => 'odontologia',
            'user_id' => '1'
        ]);

        Doctor::create([
            'nombres' => 'Doctor3',
            'apellidos' => 'Prueba',
            'codigo_colegiado' => '12342333',
            'celular' => '945905558', 
            'especialidad' => 'fisioterapia',
            'user_id' => '5'
        ]);

        Consultorio::create([
            'nombre' => 'Odontologia',
            'ubicacion' => '3b5',
            'capacidad' => '5',
            'telefono' =>'94584545',
            'especialidad' => 'Odontologia',
            'estado' => 'Activo'
        ]);
        Consultorio::create([
            'nombre' => 'Pediatria',
            'ubicacion' => '2b5',
            'capacidad' => '5',
            'telefono' =>'94584545',
            'especialidad' => 'Pediatria',
            'estado' => 'Activo'
        ]);


        Consultorio::create([
            'nombre' => 'Fisioterapia',
            'ubicacion' => '4b5',
            'capacidad' => '5',
            'telefono' =>'94584545',
            'especialidad' => 'Fisioterapia',
            'estado' => 'Activo'
        ]);


        //Creacopm de pacientes
        $this->call([PacienteSeeder::class,]);

        

    }
}
