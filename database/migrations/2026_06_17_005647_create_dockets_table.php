<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dockets', function (Blueprint $table) {
            $table->id();

            // Header
            $table->string('code')->unique();
            $table->string('designnumber')->nullable();
            $table->string('source_type')->nullable();
            $table->string('label')->nullable();
            $table->string('jenis')->nullable();

            $table->string('bom_id')->nullable();

            $table->string('product')->nullable();
            $table->string('sap')->nullable();
            $table->string('original')->nullable();
            $table->string('design')->nullable();
            $table->string('actcolor')->nullable();
            $table->string('statusorder')->nullable();

            // Front
            $table->string('f1',20)->nullable();
            $table->string('f2',20)->nullable();
            $table->string('f3',20)->nullable();
            $table->string('f4',20)->nullable();
            $table->string('f5',20)->nullable();
            $table->string('f6',20)->nullable();

            // Back
            $table->string('b1',20)->nullable();
            $table->string('b2',20)->nullable();
            $table->string('b3',20)->nullable();
            $table->string('b4',20)->nullable();
            $table->string('b5',20)->nullable();
            $table->string('b6',20)->nullable();

            // Packaging
            $table->text('finishingjob')->nullable();
            $table->text('acuanwarna')->nullable();
            $table->text('acuandiecut')->nullable();
            $table->text('packing')->nullable();

            $table->string('nops')->nullable();
            $table->string('boxname')->nullable();
            $table->string('boxspecs')->nullable();
            $table->string('boxsize')->nullable();

            $table->decimal('nwbox', 10, 2)->nullable();
            $table->decimal('nwpcs', 10, 2)->nullable();

            $table->string('estimasipackaging')->nullable();
            $table->string('ukrperbendel')->nullable();

            $table->decimal('boxdalampanjang', 10, 2)->nullable();
            $table->decimal('boxdalamlebar', 10, 2)->nullable();
            $table->decimal('boxdalamtinggi', 10, 2)->nullable();

            $table->decimal('boxluarpanjang', 10, 2)->nullable();
            $table->decimal('boxluarlebar', 10, 2)->nullable();
            $table->decimal('boxluartinggi', 10, 2)->nullable();

            $table->string('effective')->nullable();
            $table->date('preparedate')->nullable();

            $table->string('supplier')->nullable();
            $table->string('isi')->nullable();
            $table->string('isiboxsap')->nullable();
            $table->string('sapataubendel')->nullable();
            $table->string('susunan')->nullable();

            // Gambar
            $table->string('gambar1',50)->nullable();
            $table->string('gambar2',50)->nullable();
            $table->string('gambar3',50)->nullable();
            $table->string('gambar4',50)->nullable();
            $table->string('gambar5',50)->nullable();
            $table->string('gambar6',50)->nullable();
            $table->string('gambar7',50)->nullable();
            $table->string('gambar8',50)->nullable();
            $table->string('gambar9',50)->nullable();
            $table->string('gambar10',50)->nullable();

            $table->text('notepackaging')->nullable();

            // Layout
            $table->string('aplikasi')->nullable();
            $table->string('layout')->nullable();
            $table->string('up')->nullable();
            $table->string('sidea')->nullable();
            $table->string('sideb')->nullable();
            $table->string('upsidea')->nullable();
            $table->string('upsideb')->nullable();
            $table->string('ukrpresslayuot')->nullable();

            // Material
            $table->string('mat1')->nullable();
            $table->string('mat2')->nullable();
            $table->string('mat3')->nullable();

            $table->string('specsmat1')->nullable();
            $table->string('specsmat2')->nullable();
            $table->string('specsmat3')->nullable();

            // Artwork
            $table->string('as1')->nullable();
            $table->string('as2')->nullable();
            $table->string('as3')->nullable();

            $table->string('pisau')->nullable();
            $table->string('citto')->nullable();
            $table->string('emboss')->nullable();
            $table->string('hotprint')->nullable();

            $table->text('note1')->nullable();
            $table->text('note2')->nullable();
            $table->text('note3')->nullable();

            $table->longText('notedesignrequest')->nullable();

            $table->date('tanggalterima')->nullable();

            // Tambahan
            $table->string('filedesign')->nullable();
            $table->string('filelayout')->nullable();

            $table->string('statusdocket')->default('draft');

            $table->string('a',20)->nullable();
            $table->string('b',20)->nullable();
            $table->string('c',20)->nullable();
            $table->string('d',20)->nullable();
            $table->string('e',20)->nullable();
            $table->string('f',20)->nullable();
            $table->string('g',20)->nullable();
            $table->string('h',20)->nullable();
            $table->string('i',20)->nullable();
            $table->string('j',20)->nullable();

            $table->string('statusa',20)->nullable();
            $table->string('statusb',20)->nullable();
            $table->string('statusc',20)->nullable();
            $table->string('statusd',20)->nullable();
            $table->string('statuse',20)->nullable();
            $table->string('statusf',20)->nullable();
            $table->string('statusg',20)->nullable();
            $table->string('statush',20)->nullable();
            $table->string('statusi',20)->nullable();
            $table->string('statusj',20)->nullable();

            $table->longText('feedback')->nullable();
            $table->longText('feedback_history')->nullable();

            $table->unsignedBigInteger('edited_by')->nullable();
            $table->timestamp('edited_at')->nullable();

            $table->timestamps();

            // Optional FK
            // $table->foreign('bom_id')->references('id')->on('boms');
            // $table->foreign('edited_by')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dockets');
    }
};