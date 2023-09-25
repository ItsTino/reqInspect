<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivedRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['method', 'headers', 'body', 'query_params', 'ip_address', 'user_agent', 'timestamp'];


    /**
     * Get the session that owns the received request.
     */
    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
