<?php

namespace App\Services;
use Carbon\Carbon;
use App\User;
use App\Models\Fund;

class MarketplaceService {

    public static function getFinalBids(User $seller, Fund $fund, $operations, $sharesSellingAmount, $bids)
    {
        $bidsOrdered = $bids->sortByDesc('stock_price');
        $finalBids = collect();
        for ($index=0; $index < $bidsOrdered->count(); $index++) {
            $bid = $bidsOrdered[$index];
            $price = $bid->stock_price;
            $amount = $bid->amount - $finalBids->sum('amount');

            $stocks = self::getActualPositionAtVehicle($operations, $amount);
            $position = FinService::getPositionForStocks($stocks, $amount, $price);
            $resume = FinService::getResumeForPosition($seller, $fund, $position);

            $finalBids->push([
                'amount' => $amount,
                'bid' => $bid,
                'stocks' => $stocks,
                'position' => $position,
                'resume' => $resume
            ]);

            $sellOperation = new \App\Models\Operation;
            $sellOperation->amount = -1 * $amount;
            $sellOperation->completed_at = Carbon::now();
            $operations->push($sellOperation);
        }

        return $finalBids;
    }

    public static function getActualPositionAtVehicle($operations)
    {
        $stocks = [];
        $sortedOperations = $operations->sortBy('completed_at');

        foreach ($sortedOperations as $key => $operation) {
            if ($operation->amount > 0) {
                $stocks[] = [
                    'amount' => $operation->amount,
                    'stock_price' => $operation->stock_price
                ];
            } else {
                $toRemove = $operation->amount * -1;
                while($toRemove > 0) {
                    $remainingShares = $stocks[0]['amount'];
                    $canRemove = min($toRemove, $remainingShares);
                    if ($canRemove == $remainingShares) {
                        array_shift($stocks);
                    } else {
                        $stocks[0]['amount'] = $remainingShares - $canRemove;
                    }
                    $toRemove = $toRemove - $canRemove;
                }
            }
        }
        return collect($stocks);
    }

    public static function getOfferSharesDetails($operations, $sellingSharesAmount)
    {
        $stocks = self::getActualPositionAtVehicle($operations);
        $stocksSorted = $stocks->sortByDesc('stock_price');

        $finalStock = collect();
        for ($index=0; $index < $stocksSorted->count() && $sellingSharesAmount > 0; $index++) {
            $stock = $stocksSorted[$index];
            $remainingAtThisPrice = min($stock['amount'], $sellingSharesAmount);
            $finalStock->push([
                'amount' => $remainingAtThisPrice,
                'stock_price' => $stock['stock_price']
            ]);
            $sellingSharesAmount = $sellingSharesAmount - $remainingAtThisPrice;
        }

        return $finalStock;

    }
}
