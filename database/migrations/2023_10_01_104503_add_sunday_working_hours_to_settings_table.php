<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSundayWorkingHoursToSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('sunday_from')->nullable()->after('updated_at');
            $table->string('sunday_to')->nullable()->after('sunday_from');
        });
    }

    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['sunday_from', 'sunday_to']);
        });
    }
}
