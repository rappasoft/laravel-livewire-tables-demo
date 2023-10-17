<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained();
            $table->foreign('address_group_id')->references('id')->on('address_groups')->constrained();
        });
        
        Schema::table('address_groups', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities')->constrained();
        });
        
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained();
        });

        Schema::table('tag_user', function (Blueprint $table) {
            $table->foreign('tag_id')->references('id')->on('tags')->constrained();
            $table->foreign('user_id')->references('id')->on('users')->constrained();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('users')->constrained();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('address_groups', function (Blueprint $table) {
            $table->dropForeign('city_id');
        });
        
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('address_group_id');
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });

        Schema::table('tag_user', function (Blueprint $table) {
            $table->dropForeign('tag_id');
            $table->dropForeign('user_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('parent_id');
        });
        
        Schema::table('topicables', function (Blueprint $table) {
            $table->dropForeign('topic_id');
        });

    }
};
