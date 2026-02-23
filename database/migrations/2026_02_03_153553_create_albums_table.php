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
            Schema::create('albums', function (Blueprint $table) {
                $table->id();

                $table->string('titulo', 300);
                $table->string('artista', 300);
                $table->integer('anio');
                $table->string('genero', 300);
                $table->string('discografica', 300);
                $table->integer('numero_pistas')->nullable();
                $table->integer('duracion_total');
                $table->string('formato', 300)->nullable();
                $table->string('portada', 500)->nullable();

                $table->foreignId('user_id')
                    ->nullable()
                    ->constrained()
                    ->onDelete('cascade');

                $table->decimal('average_rating', 3, 2)->default(0);

                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('albums');
        }
    };
