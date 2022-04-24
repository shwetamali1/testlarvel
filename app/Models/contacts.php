<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    use HasFactory;

    public function up()
{
    Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('lastname');
        $table->string('phone');
        $table->timestamps();
    });
}
}
