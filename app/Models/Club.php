<?php

namespace App\Models;
use Carbon\Carbon;
// use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Club extends Model
{
    use HasFactory;

    protected $table = 'club';
    protected $fillable = [
        'nama',
        'slug',
        'no_tlp',
        'email',
        'alamat',
        'lokasi',
        'tahun_terbentuk',
        'sejarah',
        'logo',
        'background',
    ];

    public function getLogoAttribute($value)
    {
        if ($value) {
            return asset($value);
        } else {
            return asset('backend/assets/images/club/logo/default.png');
        }
    }
    public function getBackgroundAttribute($value)
    {
        if ($value) {
            return asset($value);
        } else {
            return asset('backend/assets/images/club/background/default.jpg');
        }
    }

    public function tahunTerbentuk(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->translatedFormat('d F Y')
        );
    }
}