<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
      /**
       * Run the migrations.
       */
      public function up(): void
      {
            Schema::create('campaigns', function (Blueprint $table) {
                  $table->id();

                  $table->string('title');

                  $table->text('story');

                  $table->decimal('target_amount', 12, 2);

                  $table->decimal('raised_amount', 12, 2)
                        ->default(0);

                  $table->integer('donor_count')
                        ->default(0);

                  $table->integer('shares')
                        ->default(0);

                  $table->string('campaigner_name');

                  $table->string('campaigner_city');

                  $table->string('beneficiary_name');

                  $table->string('beneficiary_relation');

                  $table->string('hospital_name');

                  $table->string('category')
                        ->default('Medical');

                  $table->boolean('tax_benefits')
                        ->default(true);

                  $table->timestamps();
            });
      }

      /**
       * Reverse the migrations.
       */
      public function down(): void
      {
            Schema::dropIfExists('campaigns');
      }
};
