<?php

use App\Models\Click;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $model      = new Click();
        $connection = $model->getConnectionName();
        $table      = $model->getTableName();
        $tableCheck = Schema::connection($connection)->hasTable($table);

        if (!$tableCheck) {
            Schema::connection($connection)->create($table, function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->bigIncrements('id');
                $table->string('ip')->index();
                $table->string('country')->nullable();
                $table->string('referer')->nullable();
                $table->string('referer_host')->nullable()->index();
                $table->text('user_agent')->nullable();
                $table->unsignedBigInteger('link_id')->unsigned()->index();
                $table->foreign('link_id')->references('id')->on('links')->onDelete('cascade');
                $table->timestamps();
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
        $model      = new Click();
        $connection = $model->getConnectionName();
        $table      = $model->getTableName();
        Schema::connection($connection)->dropIfExists($table);
    }
}
