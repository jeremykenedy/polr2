<?php

use App\Models\Link;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $model      = new Link();
        $connection = $model->getConnectionName();
        $table      = $model->getTableName();
        $tableCheck = Schema::connection($connection)->hasTable($table);

        if (!$tableCheck) {
            Schema::connection($connection)->create($table, function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->string('short_url')->unique();
                $table->longText('long_url');
                $table->string('ip');
                $table->string('creator');
                $table->integer('clicks')->default(0);
                $table->string('secret_key');
                $table->boolean('is_disabled')->default(0);
                $table->boolean('is_custom')->default(0);
                $table->boolean('is_api')->default(0);
                $table->string('long_url_hash', 10)->index('links_long_url_index')->nullable();
                $table->timestamps();
                $table->index(['created_at', 'creator', 'is_api'], 'api_quota_index');
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $model      = new Link();
        $connection = $model->getConnectionName();
        $table      = $model->getTableName();
        Schema::connection($connection)->dropIfExists($table);
    }
}
