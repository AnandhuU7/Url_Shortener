<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'original_url', 'short_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function extractNameFromUrl()
    {
        $parsedUrl = parse_url($this->original_url);
        $host = $parsedUrl['host'] ?? '';
        $host = preg_replace('/^www\./i', '', $host);
        $name = $host ?: 'Unnamed';
    
        // $query = $parsedUrl['query'] ?? '';
        // parse_str($query, $queryParameters);
        
        // if (!empty($queryParameters['q'])) {
        //     $name = $queryParameters['q'];
        // }
    
        return $name;
    }
    
    
}
