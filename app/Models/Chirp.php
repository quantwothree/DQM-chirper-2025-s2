<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Chirp extends Model
{
    /** @use HasFactory<\Database\Factories\ChirpFactory> */
    use HasFactory;
    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'message',
    ];

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function userVotes(): HasOne
    {
        return $this->votes()
            ->one()
            ->where('user_id', auth()->id());
    }
}
