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
            $table->text('code')->unique();
            $table->text('designnumber')->nullable();
            $table->text('source_type')->nullable();
            $table->text('label')->nullable();
            $table->text('jenis')->nullable();

            $table->text('bom_id')->nullable();

            $table->text('product')->nullable();
            $table->text('sap')->nullable();
            $table->text('original')->nullable();
            $table->text('design')->nullable();
            $table->text('actcolor')->nullable();
            $table->text('statusorder')->nullable();

            // Front
            $table->text('f1')->nullable();
            $table->text('f2')->nullable();
            $table->text('f3')->nullable();
            $table->text('f4')->nullable();
            $table->text('f5')->nullable();
            $table->text('f6')->nullable();

            // Back
            $table->text('b1')->nullable();
            $table->text('b2')->nullable();
            $table->text('b3')->nullable();
            $table->text('b4')->nullable();
            $table->text('b5')->nullable();
            $table->text('b6')->nullable();

            // Packaging
            $table->text('finishingjob')->nullable();
            $table->text('acuanwarna')->nullable();
            $table->text('acuandiecut')->nullable();
            $table->text('packing')->nullable();

            $table->text('nops')->nullable();
            $table->text('boxname')->nullable();
            $table->text('boxspecs')->nullable();
            $table->text('boxsize')->nullable();

            $table->decimal('nwbox', 10, 2)->nullable();
            $table->decimal('nwpcs', 10, 2)->nullable();

            $table->text('estimasipackaging')->nullable();
            $table->text('ukrperbendel')->nullable();

            $table->decimal('boxdalampanjang', 10, 2)->nullable();
            $table->decimal('boxdalamlebar', 10, 2)->nullable();
            $table->decimal('boxdalamtinggi', 10, 2)->nullable();

            $table->decimal('boxluarpanjang', 10, 2)->nullable();
            $table->decimal('boxluarlebar', 10, 2)->nullable();
            $table->decimal('boxluartinggi', 10, 2)->nullable();

            $table->text('effective')->nullable();
            $table->date('preparedate')->nullable();

            $table->text('supplier')->nullable();
            $table->text('isi')->nullable();
            $table->text('isiboxsap')->nullable();
            $table->text('sapataubendel')->nullable();
            $table->text('susunan')->nullable();

            // Gambar
            $table->text('gambar1')->nullable();
            $table->text('gambar2')->nullable();
            $table->text('gambar3')->nullable();
            $table->text('gambar4')->nullable();
            $table->text('gambar5')->nullable();
            $table->text('gambar6')->nullable();
            $table->text('gambar7')->nullable();
            $table->text('gambar8')->nullable();
            $table->text('gambar9')->nullable();
            $table->text('gambar10')->nullable();

            $table->text('notepackaging')->nullable();

            // Layout
            $table->text('aplikasi')->nullable();
            $table->text('layout')->nullable();
            $table->text('up')->nullable();
            $table->text('sidea')->nullable();
            $table->text('sideb')->nullable();
            $table->text('upsidea')->nullable();
            $table->text('upsideb')->nullable();
            $table->text('ukrpresslayuot')->nullable();

            // Material
            $table->text('mat1')->nullable();
            $table->text('mat2')->nullable();
            $table->text('mat3')->nullable();

            $table->text('specsmat1')->nullable();
            $table->text('specsmat2')->nullable();
            $table->text('specsmat3')->nullable();

            // Artwork
            $table->text('as1')->nullable();
            $table->text('as2')->nullable();
            $table->text('as3')->nullable();

            $table->text('pisau')->nullable();
            $table->text('citto')->nullable();
            $table->text('emboss')->nullable();
            $table->text('hotprint')->nullable();

            $table->text('note1')->nullable();
            $table->text('note2')->nullable();
            $table->text('note3')->nullable();

            $table->longText('notedesignrequest')->nullable();

            $table->date('tanggalterima')->nullable();

            // Tambahan
            $table->text('filedesign')->nullable();
            $table->text('filelayout')->nullable();

            $table->text('statusdocket')->default('draft');

            $table->text('a')->nullable();
            $table->text('b')->nullable();
            $table->text('c')->nullable();
            $table->text('d')->nullable();
            $table->text('e')->nullable();
            $table->text('f')->nullable();
            $table->text('g')->nullable();
            $table->text('h')->nullable();
            $table->text('i')->nullable();
            $table->text('j')->nullable();

            $table->text('statusa')->nullable();
            $table->text('statusb')->nullable();
            $table->text('statusc')->nullable();
            $table->text('statusd')->nullable();
            $table->text('statuse')->nullable();
            $table->text('statusf')->nullable();
            $table->text('statusg')->nullable();
            $table->text('statush')->nullable();
            $table->text('statusi')->nullable();
            $table->text('statusj')->nullable();

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