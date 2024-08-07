    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('dni')->unique();
            $table->string('celular',12);
            $table->string('genero',20);
            $table->date('fecha_nacimiento');
            $table->string('direccion',100);
            $table->string('correo',100)->unique();
            $table->string('grupo_sanguineo',100);
            $table->string('nro_seguro',100)->unique();
            $table->string('observaciones',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
