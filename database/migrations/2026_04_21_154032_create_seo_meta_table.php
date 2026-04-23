<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('seo_meta', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();

            // Polymorphic relation
            $table->morphs('seoable');

            // Basic SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Open Graph
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_image_alt')->nullable();

            // Technical SEO
            $table->string('canonical_url')->nullable();
            $table->string('robots')->nullable();
            $table->string('focus_keyword')->nullable();

            // Schema (JSON-LD)
            $table->string('schema_type')->nullable();
            $table->json('schema_data')->nullable();

            // Sitemap
            $table->boolean('in_sitemap')->default(true);
            $table->float('sitemap_priority')->default(0.5);
            $table->string('change_frequency')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_meta');
    }
};
