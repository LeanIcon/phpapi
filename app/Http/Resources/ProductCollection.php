<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public $collects = ProductResource::class;
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'pagination' => [
                'size' => $this->perPage(),
                'total' => $this->total(),
                'current' => $this->currentPage(),
                'next' => $this->nextPageUrl(),
                'prev' => $this->previousPageUrl(),
                // customise your pagination here
                // https://laravel.com/docs/5.8/pagination#paginator-instance-methods
            ],
        ];
    }
}
