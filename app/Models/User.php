<?php

namespace App\Models;

use App\Models\UsersDetail;
use Modules\SPP\Entities\PaymentSpp;
use App\Notifications\ForgotPassword;
use Modules\SPP\Entities\BankAccount;
use Modules\PPDB\Entities\BerkasMurid;
use Spatie\Permission\Traits\HasRoles;
use Modules\PPDB\Entities\DataOrangTua;
use Illuminate\Notifications\Notifiable;
use Modules\Perpustakaan\Entities\Member;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles,SoftDeletes;
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ForgotPassword($token, $this->email));
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userDetail()
    {
        return $this->belongsTo(UsersDetail::class,'id','user_id');
    }

    public function muridDetail()
    {
        return $this->belongsTo(dataMurid::class, 'id','user_id');
    }

    public function dataOrtu()
    {
        return $this->belongsTo(DataOrangTua::class,'id','user_id');
    }

    public function berkas()
    {
        return $this->belongsTo(BerkasMurid::class,'id','user_id');
    }

    public function member()
    {
      return $this->hasOne(Member::class,'user_id');
    }

    public function payment()
    {
      return $this->hasOne(PaymentSpp::class,'user_id');
    }

    public function bank()
    {
      return $this->hasOne(BankAccount::class,'user_id');
    }
    public function banks()
    {
      return $this->hasMany(BankAccount::class,'user_id');
    }

    public function setting()
    {
        return $this->hasOne(Setting::class);
    }
}
