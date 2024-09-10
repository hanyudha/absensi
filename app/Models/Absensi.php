<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;

    protected $primaryKey = 'AbsensiID';
    protected $fillable = ['UserID', 'Hari', 'Tanggal', 'WaktuMasuk', 'WaktuKeluar', 'Keterangan'];

    public function user()
{
    return $this->belongsTo(User::class, 'UserID', 'UserID');
}

    // Fungsi untuk menentukan keterangan absensi (Terlambat atau Hadir)
    public function setKeteranganOtomatis()
    {
        $waktuMasuk = Carbon::parse($this->WaktuMasuk);
        if ($waktuMasuk->gt(Carbon::createFromTime(8, 0))) {
            $this->Keterangan = 'Terlambat';
        } else {
            $this->Keterangan = 'Hadir';
        }
        $this->save();
    }

    // Fungsi untuk mengatur waktu masuk otomatis
    public function setWaktuMasukOtomatis()
    {
        $this->WaktuMasuk = Carbon::now();
        $this->setKeteranganOtomatis(); // Set keterangan otomatis setelah waktu masuk
    }

    // Fungsi untuk mengatur waktu keluar otomatis
    public function setWaktuKeluarOtomatis()
    {
        $this->WaktuKeluar = Carbon::now();
        $this->save();
    }

    // Fungsi untuk mengatur status tombol absen
    public function statusTombolAbsenMasuk()
    {
        $waktuSekarang = Carbon::now();
        if ($waktuSekarang->gt(Carbon::createFromTime(8, 0, 0))) {
            return [
                'disabled' => false,
                'class' => 'btn btn-danger',  // Keterangan terlambat
                'message' => 'Terlambat'
            ];
        } else {
            return [
                'disabled' => false,
                'class' => 'btn btn-success', // Keterangan hadir
                'message' => 'Hadir'
            ];
        }
    }

    public function statusTombolAbsenKeluar()
    {
        $waktuSekarang = Carbon::now();
        if ($waktuSekarang->lt(Carbon::createFromTime(16, 0, 0))) {
            return [
                'disabled' => true,
                'class' => 'btn btn-danger',  // Keterangan belum saatnya
                'message' => 'Belum saatnya melakukan absen pulang'
            ];
        } else {
            return [
                'disabled' => false,
                'class' => 'btn btn-primary', // Absen keluar bisa dilakukan
                'message' => 'Absen Keluar'
            ];
        }
    }
}
