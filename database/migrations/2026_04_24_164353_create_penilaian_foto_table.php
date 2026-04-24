<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('penilaian_foto', function (
Blueprint $table
) {

$table->id();

$table->unsignedBigInteger(
'penilaian_id'
);

$table->string(
'filename'
);

$table->timestamps();

$table->foreign(
'penilaian_id'
)->references(
'id'
)->on(
'penilaian'
)->onDelete(
'cascade'
);

});
}

public function down(): void
{
Schema::dropIfExists(
'penilaian_foto'
);
}
};