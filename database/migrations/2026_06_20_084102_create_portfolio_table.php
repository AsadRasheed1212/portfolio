<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('works', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->string('category')->default('Web');
            $t->text('description')->nullable();
            $t->string('thumbnail')->nullable();
            $t->string('url')->nullable();
            $t->json('tech_stack')->nullable();
            $t->boolean('featured')->default(false);
            $t->timestamps();
        });

        Schema::create('services', function (Blueprint $t) {
            $t->id();
            $t->string('title');
            $t->text('description');
            $t->string('icon')->nullable();
            $t->integer('sort_order')->default(0);
            $t->timestamps();
        });

        Schema::create('credentials', function (Blueprint $t) {
            $t->id();
            $t->string('type');
            $t->string('title');
            $t->string('organization');
            $t->string('year');
            $t->text('description')->nullable();
            $t->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('email');
            $t->string('subject')->nullable();
            $t->text('message');
            $t->boolean('read')->default(false);
            $t->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('works');
        Schema::dropIfExists('services');
        Schema::dropIfExists('credentials');
        Schema::dropIfExists('contact_messages');
    }
};