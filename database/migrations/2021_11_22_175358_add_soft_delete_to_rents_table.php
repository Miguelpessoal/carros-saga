<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteToRentsTable extends Migration
{
    public function up()
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('rents', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
