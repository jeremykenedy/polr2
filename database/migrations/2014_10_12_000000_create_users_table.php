<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $model      = new User();
        $connection = $model->getConnectionName();
        $table      = $model->getTableName();
        $tableCheck = Schema::connection($connection)->hasTable($table);

        if (!$tableCheck) {
            Schema::connection($connection)->create($table, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('username');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->text('ip');
                $table->string('recovery_key');
                $table->string('role');
                $table->string('active');
                $table->string('api_key')->nullable();
                $table->boolean('api_active')->default(0);
                $table->string('api_quota')->default(60);
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
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
        $model      = new User();
        $connection = $model->getConnectionName();
        $table      = $model->getTableName();

        Schema::connection($connection)->dropIfExists($table);
    }
}
