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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();

            // 1. Mã vận đơn
            $table->string('tracking_number')->unique();

            // 2. Các bên liên quan
            $table->foreignId('sender_id')->constrained('senders');
            $table->foreignId('receiver_id')->constrained('receivers');
            $table->foreignId('driver_id')->nullable()->constrained('drivers');

            // 3. Địa điểm giao nhận
            $table->string('pickup_location')->nullable();
            $table->decimal('pickup_latitude', 10, 7)->nullable();
            $table->decimal('pickup_longitude', 10, 7)->nullable();

            $table->string('delivery_location')->nullable();
            $table->decimal('delivery_latitude', 10, 7)->nullable();
            $table->decimal('delivery_longitude', 10, 7)->nullable();

            // 4. Thời gian giao nhận
            $table->dateTime('pickup_date')->nullable();
            $table->dateTime('expected_delivery_date')->nullable();
            $table->dateTime('actual_delivery_date')->nullable();

            // 5. Thông tin thêm
            $table->text('notes')->nullable();

            // 6. Phí vận chuyển
            $table->decimal('shipping_cost', 10, 2)->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
