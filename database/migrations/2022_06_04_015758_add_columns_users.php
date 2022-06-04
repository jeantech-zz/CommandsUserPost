<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('address')->nullable();  
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('company')->nullable();                  
        });
    }

    public function down():void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('phone');
            $table->dropColumn('website');
            $table->dropColumn('company');
        });
    }
};
