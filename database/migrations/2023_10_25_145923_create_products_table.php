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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('short_description');
            $table->longText('description');
            $table->integer('view_counts')->default(0);
            $table->integer('is_featured_product')->nullable();
            $table->string('slug');
            $table->string('weight')->nullable();
            $table->string('serving_size')->nullable();
            $table->float('score')->nullable();
            $table->string('origin')->nullable();
            $table->string('main_ingredient')->nullable();
            $table->text('thumbnail')->nullable();
            $table->text('ingredient_image')->nullable();
            $table->bigInteger('brand_id');
            $table->string('price');
            $table->integer('status')->default(1)->comment('0: Ẩn, 2: Hiển thị');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
