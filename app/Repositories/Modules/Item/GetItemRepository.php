<?php

namespace App\Repositories\Modules\Item;

use Exception;

use App\DTO\ItemDTOs\ItemInfoDTO;
use App\Models\Modules\Item;

class GetItemRepository {
    /**
     * Get item
     * @param int $id
     * @return ItemInfoDTO
     */
    public function getItem(int $id) {
        try {
            $item = Item::find($id);

            if ($item->jenis_item == 'frame') {
                $item = $item
                    ->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->join('vendors', 'items.vendor_id', '=', 'vendors.id')
                    ->join('categories', 'items.categories_id', '=', 'categories.id')
                    ->join('colors', 'items.frame_color_id', '=', 'colors.id')
                    ->select(
                        'items.*',
                        'brands.nama_brand',
                        'vendors.nama_vendor',
                        'categories.nama_kategori',
                        'colors.color_name',
                    )
                    ->first();

            } else if ($item->jenis_item == 'lensa') {
                $item = $item
                    ->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->join('vendors', 'items.vendor_id', '=', 'vendors.id')
                    ->join('categories', 'items.categories_id', '=', 'categories.id')
                    ->join('indices', 'items.lensa_index_id', '=', 'indices.id')
                    ->select(
                        'items.*',
                        'brands.nama_brand',
                        'vendors.nama_vendor',
                        'categories.nama_kategori',
                        'indices.value',
                    )
                    ->first();
            } else if ($item->jenis_item == 'aksesoris') {
                $item = $item
                    ->join('brands', 'items.brand_id', '=', 'brands.id')
                    ->join('vendors', 'items.vendor_id', '=', 'vendors.id')
                    ->join('categories', 'items.categories_id', '=', 'categories.id')
                    ->select(
                        'items.*',
                        'brands.nama_brand',
                        'vendors.nama_vendor',
                        'categories.nama_kategori',
                    )
                    ->first();
            }

            $itemDTO = new ItemInfoDTO(
                $item->id,
                $item->jenis_item,
                $item->kode_item,
                $item->deskripsi,
                $item->stok,
                $item->harga_beli,
                $item->harga_jual,
                $item->diskon,
                $item->qr_path,
                $item->deleteable,

                // Frame
                $item->frame_sku_vendor,
                $item->frame_sub_kategori,
                $item->frame_kode,

                // Lens
                $item->lensa_jenis_produk,
                $item->lensa_jenis_lensa,

                // Accessory
                $item->aksesoris_nama_item,

                // Foreign Keys
                // BRAND //
                $item->brand_id,
                $item->nama_brand,

                // VENDOR //
                $item->vendor_id,
                $item->nama_vendor,

                // CATEGORY //
                $item->category_id,
                $item->nama_kategori,

                // FRAME //
                $item->frame_color_id,
                $item->color_name,

                // LENS //
                $item->lensa_index_id,
                $item->value,
            );

            $itemDTO = $itemDTO->toArray();

            return $itemDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
