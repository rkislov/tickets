<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 10.04.18
 * Time: 11:41
 */

namespace App;
use Ramsey\Uuid\Uuid;

trait UuidTrait
{
    /**
     * The "booting" method of the model.
     */
    protected static function boot()
    {
        parent::boot();
        /**
         * Attach to the 'creating' Model Event to provide a UUID
         * for the `id` field (provided by $model->getKeyName()).
         */
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = $model->generateNewUuid();
            return true;
        });
    }
    /**
     * Get a new version 4 (random) UUID.
     *
     * @return \Ramsey\Uuid\Uuid
     */
    public function generateNewUuid()
    {
        return Uuid::uuid4();
    }

}