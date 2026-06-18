<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dockets', function (Blueprint $table) {
            $table->id(); //1
            $table->text('code')->unique();//2
            $table->text('product')->nullable();//3
            $table->text('qty')->nullable();//4
            $table->text('designnumber')->nullable();//5
            $table->text('source_type')->nullable();//6
            $table->text('label')->nullable();//7
            $table->text('jenis')->nullable();//8
            $table->text('bom_id')->nullable();//9
            $table->text('sap')->nullable();//10
            $table->text('original')->nullable();//11
            $table->text('design')->nullable();//12
            $table->text('actcolor')->nullable();//13
            $table->text('statusorder')->nullable();//14
            $table->text('f1')->nullable();//15
            $table->text('f2')->nullable();//16
            $table->text('f3')->nullable();//17
            $table->text('f4')->nullable();//18
            $table->text('f5')->nullable();//19
            $table->text('f6')->nullable();//20
            $table->text('f7')->nullable();//21
            $table->text('f8')->nullable();//22
            $table->text('b1')->nullable();//23
            $table->text('b2')->nullable();//24
            $table->text('b3')->nullable();//25
            $table->text('b4')->nullable();//26
            $table->text('b5')->nullable();//27
            $table->text('b6')->nullable();//28
            $table->text('b7')->nullable();//29
            $table->text('b8')->nullable();//30
            $table->text('finishingjob')->nullable();//31
            $table->text('acuanwarna')->nullable();//32
            $table->text('acuandiecut')->nullable();//33
            $table->text('packing')->nullable();//34
            $table->text('nops')->nullable();//35
            $table->text('boxname')->nullable();//36
            $table->text('boxspecs')->nullable();//37
            $table->text('boxsize')->nullable();//38
            $table->text('nwbox')->nullable();//39
            $table->text('nwpcs')->nullable();//40
            $table->text('estimasipackaging')->nullable();//41
            $table->text('ukperbendel')->nullable();//42
            $table->text('boxdalampanjang')->nullable();//43
            $table->text('boxdalamlebar')->nullable();//44
            $table->text('boxdalamtinggi')->nullable();//45
            $table->text('boxluarpanjang')->nullable();//46
            $table->text('boxluarlebar')->nullable();//47
            $table->text('boxluartinggi')->nullable();//48
            $table->text('effective')->nullable();//49
            $table->text('preparedate')->nullable();//50
            $table->text('supplier')->nullable();//51
            $table->text('isi')->nullable();//52
            $table->text('isiboxsap')->nullable();//53
            $table->text('sapataubendel')->nullable();//54
            $table->text('susunan')->nullable();//55
            $table->text('gambar1')->nullable();//56
            $table->text('gambar2')->nullable();//57
            $table->text('gambar3')->nullable();//58
            $table->text('gambar4')->nullable();//59
            $table->text('gambar5')->nullable();//60
            $table->text('gambar6')->nullable();//61
            $table->text('gambar7')->nullable();//62
            $table->text('gambar8')->nullable();//63
            $table->text('gambar9')->nullable();//64
            $table->text('gambar10')->nullable();//65
            $table->text('notepackaging')->nullable();//66
            $table->text('aplikasi')->nullable();//67
            $table->text('layout')->nullable();//68
            $table->text('up')->nullable();//69
            $table->text('sidea')->nullable();//70
            $table->text('sideb')->nullable();//71
            $table->text('upsidea')->nullable();//72
            $table->text('upsideb')->nullable();//73
            $table->text('ukapresslayuot')->nullable();//74
            $table->text('mat1')->nullable();//75
            $table->text('mat2')->nullable();//76
            $table->text('mat3')->nullable();//77
            $table->text('specsmat1')->nullable();//78
            $table->text('specsmat2')->nullable();//79
            $table->text('specsmat3')->nullable();//80
            $table->text('as1')->nullable();//81
            $table->text('as2')->nullable();//82
            $table->text('as3')->nullable();//83
            $table->text('pisau')->nullable();//84
            $table->text('citto')->nullable();//85
            $table->text('emboss')->nullable();//86
            $table->text('hotprint')->nullable();//87
            $table->text('note1')->nullable();//88
            $table->text('note2')->nullable();//89
            $table->text('note3')->nullable();//90
            $table->text('notedesignrequest')->nullable();//91
            $table->text('tanggalterima')->nullable();//92
            $table->text('filedesign')->nullable();//93
            $table->text('filelayout')->nullable();//94
            $table->text('statuslayout')->default('draft');//95
            $table->text('statusdocket')->default('draft');//96
            $table->text('a')->nullable();//97
            $table->text('b')->nullable();//98
            $table->text('c')->nullable();//99
            $table->text('d')->nullable();//100
            $table->text('e')->nullable();//101
            $table->text('f')->nullable();//102
            $table->text('g')->nullable();//103
            $table->text('h')->nullable();//104
            $table->text('i')->nullable();//105
            $table->text('j')->nullable();//105
            $table->text('filea')->nullable();//106
            $table->text('fileb')->nullable();//107
            $table->text('filec')->nullable();//108
            $table->text('filed')->nullable();//109
            $table->text('filee')->nullable();//110
            $table->text('filef')->nullable();//111
            $table->text('fileg')->nullable();//112
            $table->text('fileh')->nullable();//113
            $table->text('filei')->nullable();//114
            $table->text('filej')->nullable();//115
            $table->text('statusa')->nullable();//116
            $table->text('statusb')->nullable();//117
            $table->text('statusc')->nullable();//118
            $table->text('statusd')->nullable();//119
            $table->text('statuse')->nullable();//120
            $table->text('statusf')->nullable();//121
            $table->text('statusg')->nullable();//122
            $table->text('statush')->nullable();//123
            $table->text('statusi')->nullable();//124
            $table->text('statusj')->nullable();//125
            $table->text('feedback')->nullable();//126
            $table->text('feedback_history')->nullable();//127
            $table->text('edited_by')->nullable();//128
            $table->timestamp('edited_at')->nullable();//129
            $table->timestamps(); //130-131 + 1 = 132

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