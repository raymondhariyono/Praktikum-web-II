<?php

namespace RectorPrefix202505\Illuminate\Contracts\Database\Eloquent;

use RectorPrefix202505\Illuminate\Database\Eloquent\Model;
interface SerializesCastableAttributes
{
    /**
     * Serialize the attribute when converting the model to an array.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array<string, mixed>  $attributes
     * @return mixed
     */
    public function serialize(Model $model, string $key, $value, array $attributes);
}
