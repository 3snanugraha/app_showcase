<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppShowcase extends Model
{
    use SoftDeletes;
    
    protected $table = 'app_showcase';

    protected $fillable = [
        'app_name',
        'app_description',
        'app_banner',
        'app_screenshots',
        'app_version',
        'app_package_name',
        'app_download_link',
        'internal_test_link',
        'app_min_android_version',
        'app_size',
        'is_active'
    ];

    protected $casts = [
        'app_screenshots' => 'array',
        'is_active' => 'boolean',
        'app_size' => 'decimal:2'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getAppBannerAttribute($value)
    {
        return $value;
    }

    public function getAppScreenshotsAttribute($value)
    {
        if (empty($value)) {
            return [];
        }
        
        $screenshots = is_array($value) ? $value : json_decode($value, true);
        return array_map(function($screenshot) {
            return $screenshot;
        }, $screenshots ?? []);
    }

    public function getRawAppBannerAttribute()
    {
        return $this->attributes['app_banner'];
    }

    public function getRawAppScreenshotsAttribute()
    {
        return $this->attributes['app_screenshots'];
    }

    public function testers()
    {
        return $this->hasMany(AppTester::class, 'app_id');
    }
}
