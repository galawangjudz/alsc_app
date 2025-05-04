<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Lot.php';
require_once __DIR__ . '/../models/House.php';
require_once __DIR__ . '/../models/Fence.php';
require_once __DIR__ . '/../models/AdditionalCost.php';
require_once __DIR__ . '/../models/ActivityLog.php';
class Dashboard extends Controller
{
    public function index()
    {
        AuthMiddleware::handle();
    
        // Get the total counts of lots, houses, fences, and additional costs
        $totalUsers = User::count(); // Replace with your method for counting users
        $totalLots = Lot::count(); // Assuming you have a count method for Lot
        $totalHouses = House::count(); // Assuming you have a count method for House
        $totalFences = Fence::count(); // Assuming you have a count method for Fence
        $totalAddCosts = AdditionalCost::count(); // Assuming you have a count method for AdditionalCost
    
        // Classify lots based on status and associated entities
        $lots = Lot::all(); // Assuming Lot::all() gets all the lots
        $classifiedLots = [
            'Available' => [
                'total' => 0,
                'withHouse' => 0,
                'withFence' => 0,
                'withAddCost' => 0
            ],
            'Sold' => [
                'total' => 0,
                'withHouse' => 0,
                'withFence' => 0,
                'withAddCost' => 0
            ],
            'On Hold' => [
                'total' => 0,
                'withHouse' => 0,
                'withFence' => 0,
                'withAddCost' => 0
            ],
        ];
    
        foreach ($lots as $lot) {
            $lotStatus = $lot->status; // Assuming you have a `status` field
            $hasHouse = House::findByLot($lot->id) ? true : false;
            $hasFence = Fence::findByLot($lot->id) ? true : false;
            $hasAddCost = AdditionalCost::findByLot($lot->id) ? true : false;
    
            if ($lotStatus === 'Available') {
                $classifiedLots['Available']['total']++;
                if ($hasHouse) $classifiedLots['Available']['withHouse']++;
                if ($hasFence) $classifiedLots['Available']['withFence']++;
                if ($hasAddCost) $classifiedLots['Available']['withAddCost']++;
            } elseif ($lotStatus === 'Sold') {
                $classifiedLots['Sold']['total']++;
                if ($hasHouse) $classifiedLots['Sold']['withHouse']++;
                if ($hasFence) $classifiedLots['Sold']['withFence']++;
                if ($hasAddCost) $classifiedLots['Sold']['withAddCost']++;
            } elseif ($lotStatus === 'On Hold') {
                $classifiedLots['On Hold']['total']++;
                if ($hasHouse) $classifiedLots['On Hold']['withHouse']++;
                if ($hasFence) $classifiedLots['On Hold']['withFence']++;
                if ($hasAddCost) $classifiedLots['On Hold']['withAddCost']++;
            }
        }
    
        // Get recent activity logs
        $activityLogs = ActivityLog::recent_logs(); // Replace with your actual method to fetch activity logs
    
        // Pass data to view
        return $this->view('dashboard/index', compact('totalUsers', 'totalLots', 'totalHouses', 'totalFences', 'totalAddCosts', 'classifiedLots', 'activityLogs'));
    }
    

}
