<?php

namespace App\Traits;

use App\Support\HtmlSanitizer;
use Illuminate\Database\Eloquent\Model;

trait SanitizesHtml
{
    /**
     * Get the HTML fields for the model that need sanitization.
     * 
     * @return array
     */
    abstract public function getHtmlFields(): array;

    protected static function bootSanitizesHtml()
    {
        static::saving(function (Model $model) {
            foreach ($model->getHtmlFields() as $field) {
                if ($model->isDirty($field) && !empty($model->getAttribute($field))) {
                    $model->setAttribute($field, HtmlSanitizer::clean($model->getAttribute($field)));
                }
            }
        });
    }
}
