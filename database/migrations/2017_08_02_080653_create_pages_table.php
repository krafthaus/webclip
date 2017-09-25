<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('website_id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('slug');
            $table->boolean('is_folder')->default(false);
            $table->unsignedInteger('_lft');
            $table->unsignedInteger('_rgt');
            $table->timestamps();

            $table->foreign('website_id')
                ->references('id')->on('websites')
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references('id')->on('pages')
                ->onDelete('set null');

            $table->index('uuid');

            $table->unique('uuid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
