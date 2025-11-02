<?php

namespace TypiCMS\Translatable\Test\TestSupport;

use Illuminate\Database\Eloquent\Model;
use TypiCMS\Translatable\HasTranslations;

class TestModel extends Model
{
    use HasTranslations;

    protected $table = 'test_models';

    protected $guarded = [];
    public $timestamps = false;

    public $translatable = ['name', 'other_field', 'field_with_mutator'];

    public function setFieldWithMutatorAttribute($value)
    {
        $this->attributes['field_with_mutator'] = $value;
    }
}
