<?php

namespace App\Services\Modules\StockOpname;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\StockOpnameDTOs\NewStockOpnameDTO;

use App\Repositories\Modules\StockOpname\GetStockOpnameRepository;
use App\Repositories\Modules\StockOpname\AddStockOpnameRepository;

class AddStockOpnameService {
    public function __construct(
        private GetStockOpnameRepository $getStockOpnameRepository,
        private AddStockOpnameRepository $addStockOpnameRepository,
    )
    {}

    /**
     * Add Stock Opname
     * @param Request $request
     * @return NewStockOpnameDTO
     */
    public function addStockOpname(Request $request) {
        try {
            $newStockOpnameDTO = new NewStockOpnameDTO(
                date('Y-m-d H:i:s'),
                date('m'),
                date('Y'),
            );

            // if stock opname already exists
            if ($this->getStockOpnameRepository->getStockOpname($newStockOpnameDTO)) {
                throw new Exception('Stock Opname already exists');
            }

            $this->addStockOpnameRepository->addStockOpname($newStockOpnameDTO);

            return $newStockOpnameDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
