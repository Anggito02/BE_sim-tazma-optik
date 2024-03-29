<?php

namespace App\Services\Employee;

use Exception;
use Illuminate\Http\Request;

use App\Repositories\Employee\GetAllEmployeeRepository;

class GetAllEmployeeService {
    public function __construct(
        private GetAllEmployeeRepository $employeeRepository
    ) {}

    /**
     * Get all employees
     * @param Request $request
     */
    public function getAllEmployees(Request $request) {
        try {
            // Validate request
            $request->validate([
                'page' => 'required|gt:0',
                'limit' => 'required|gt:0',
            ]);

            $userDTOs = $this->employeeRepository->getAllEmployees($request->page, $request->limit);

            $userArrays = [];

            foreach ($userDTOs as $user) {
                array_push($userArrays, $user->toArray());
            }

            // TODO: getting all user photo

            return $userArrays;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
