<?php

use App\Models\Link;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLinksTable extends Migration
{
    /**
     * Run the migrations.
     * MySQL only statement
     * DB::statement("UPDATE links SET long_url_hash = crc32(long_url);");
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
            DB::table($table)->select(['id', 'long_url_hash', 'long_url'])
                ->orderBy('created_at', 'asc')
                ->chunk(100, function($links, $table) {
                    foreach ($links as $link) {
                        DB::table($table)
                            ->where('id', $link->id)
                            ->update([
                                'long_url_hash' => sprintf('%u', crc32($link->long_url))
                            ]);
                    }
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
        //
    }
}
