<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipProductCreator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table){
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
            ;
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table){
            $table->dropColumn('creator_id');
        });
    }
}
