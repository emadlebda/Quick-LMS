<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class Course extends Model implements HasMedia {
    use SoftDeletes , InteractsWithMedia , HasFactory;

    public $table = 'courses';

    protected $appends = [
        'course_image' ,
    ];

    protected $dates = [
        'start_date' ,
        'created_at' ,
        'updated_at' ,
        'deleted_at' ,
    ];

    protected $fillable = [
        'title' ,
        'slug' ,
        'description' ,
        'price' ,
        'start_date' ,
        'is_published' ,
        'created_at' ,
        'updated_at' ,
        'deleted_at' ,
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('thumb')->fit('crop' , 50 , 50);
        $this->addMediaConversion('preview')->fit('crop' , 120 , 120);
    }

    public function courseLessons()
    {
        return $this->hasMany(Lesson::class , 'course_id' , 'id');
    }

    public function courseTests()
    {
        return $this->hasMany(Test::class , 'course_id' , 'id');
    }

    public function teachers()
    {
        return $this->belongsToMany(User::class , 'course_user');
    }

    public function students()
    {
        return $this->belongsToMany(User::class , 'course_student')
                    ->withTimestamps()
                    ->withPivot('rating');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('position');
    }

    public function publishedLessons()
    {
        return $this->hasMany(Lesson::class)
                    ->where('is_published' , '=' , 1)
                    ->orderBy('is_published');
    }

    public function getCourseImageAttribute()
    {
        $file = $this->getMedia('course_image')->last();

        if ($file) {
            $file->url = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview = $file->getUrl('preview');
        }

        return $file;
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ?
            Carbon::createFromFormat(config('panel.date_format') , $value)->format('Y-m-d')
            : null;
    }

    public function getRatingAttribute()
    {
        return number_format(DB::table('course_student')
                               ->where('course_id' , $this->attributes['id'])
                               ->average('rating'));
    }


    // teacher tenancy
    public function scopeOfTeacher($query)
    {
        if ( ! auth()->user()->is_admin)
            return $query->whereHas('teachers' , function ($q) {
                $q->where('user_id' , auth()->user()->id);
            });

        return $query;
    }
}
