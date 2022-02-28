<?php

namespace App\Resource;

use Hyperf\Resource\Json\ResourceCollection;

class PaginatorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'items' => $this->resource->items(),
            'total' => $this->resource->total(),
            'currentPage' => $this->resource->currentPage(),
            'pageSize' => $this->resource->perPage()
        ];
    }
}
