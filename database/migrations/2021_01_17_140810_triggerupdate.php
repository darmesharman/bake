<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Triggerupdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER board_update AFTER INSERT ON `boards` FOR EACH ROW
            BEGIN
                INSERT INTO `updates`(`new_id`, `type`, `value`, `created_at`) VALUES (NEW.id, NEW.type, 3, NOW());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_after_main_insert`');
    }
}
