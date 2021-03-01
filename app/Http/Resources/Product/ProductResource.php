<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount' => $this->discount,
            'totalPrice' => round((1 - ($this->discount / 100)) * $this->price,2),
            'raiting' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count(),2) : 'No raiting yet',
            'href' => [
                'review' => route('reviews.index', $this->id)
            ]
        ];
    }
}
