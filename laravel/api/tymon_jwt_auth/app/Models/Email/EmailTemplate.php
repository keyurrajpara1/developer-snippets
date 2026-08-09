<?php
namespace App\Models\Email;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use App\Models\Service\Service;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class EmailTemplate extends Model //implements HasMedia
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['email_key', 'email_title', 'email_subject', 'email_html'];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
}
