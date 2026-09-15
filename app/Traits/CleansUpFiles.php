<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

trait CleansUpFiles
{
    /**
     * Get the file fields for the model.
     * 
     * @return array
     */
    abstract public function getFileFields(): array;

    protected static function bootCleansUpFiles()
    {
        static::updating(function (Model $model) {
            foreach ($model->getFileFields() as $field) {
                if ($model->isDirty($field)) {
                    $oldFile = $model->getOriginal($field);
                    if ($oldFile) {
                        if (is_array($oldFile)) {
                            $newFiles = is_array($model->getAttribute($field)) ? $model->getAttribute($field) : [];
                            $deletedFiles = array_diff($oldFile, $newFiles);
                            foreach ($deletedFiles as $f) {
                                if ($f && is_string($f) && Storage::disk('public')->exists($f)) {
                                    Storage::disk('public')->delete($f);
                                }
                            }
                        } elseif (is_string($oldFile) && Storage::disk('public')->exists($oldFile)) {
                            Storage::disk('public')->delete($oldFile);
                        }
                    }
                }
            }
        });

        static::deleted(function (Model $model) {
            foreach ($model->getFileFields() as $field) {
                $file = $model->getAttribute($field);
                if ($file) {
                    if (is_array($file)) {
                        foreach ($file as $f) {
                            if ($f && is_string($f) && Storage::disk('public')->exists($f)) {
                                Storage::disk('public')->delete($f);
                            }
                        }
                    } elseif (is_string($file) && Storage::disk('public')->exists($file)) {
                        Storage::disk('public')->delete($file);
                    }
                }
            }
        });
    }
}
