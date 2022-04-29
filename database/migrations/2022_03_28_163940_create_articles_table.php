<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('title');
            $table->string('uri')->unique();
            $table->string('description');
            $table->text('content')->nullable();
            $table->string('cover');
            $table->string('video')->nullable();
            $table->integer('views');
            $table->string('type')->comment('[post, video]');
            $table->string('status')->comment('[active, draft, trash]');
            $table->date('opening_at')->comment('data do lançamento do artigo');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
