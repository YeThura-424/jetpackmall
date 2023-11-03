<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Brand;
use App\Subcategory;
use App\Http\Resources\BrandResource;
use App\Http\Resources\SubcategoryResource;


class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $baseurl = URL('/');
        $photos = json_decode($this->photo);
        $photo = $baseurl . '/' . $photos[0];

        return [
            'item_id' => $this->id,
            'item_name' => $this->name,
            'item_photo' => $photo,
            'item_photos' => $photos,
            'item_codeno' => $this->codeno,
            'item_price' => $this->price,
            'item_discount' => $this->discount,
            'item_description' => $this->description,
            'item_brandid' => $this->brand_id,
            'brand' => new BrandResource(Brand::find($this->brand_id)),
            'item_subcategoryid' => $this->subcategory_id,
            'subcategory' => new SubcategoryResource(Subcategory::find($this->subcategory_id)),
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
        ];
    }
}
