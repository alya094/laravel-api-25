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
        Schema::table('products', function (Blueprint $table) {
            $table->string('code')->nullable()->after('name');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->nullable()->after('name');
            $table->integer('stock')->nullable()->after('price');
            $table->foreignId('product_category_id')->nullable()->constrained('categori_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('code');
        });

        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropForeign(['product_category_id']);
            $table->dropColumn(['price', 'stock', 'product_category_id']);
        });
    }
};
