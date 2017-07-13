<?php

namespace App\Services;

class FinService {

    public static function getPositionForOperations($operations, $number, $sellPrice)
    {
        $stocks = [];
        $total = 0;
        foreach ($operations as $key => $operation) {
            $total = $total + $operation->amount;
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

        $profitability = 0;
        $left = $number;
        foreach ($stocks as $key => $stock) {
            $amount = min($left, $stock['amount']);
            $left = $left - $amount;
            $operationPrice = $stock['stock_price'];
            $profit = $amount == 0 ? 0:($sellPrice / $operationPrice);

            $stocks[$key]['stock_amount'] = $amount;
            $stocks[$key]['buy_price'] = $amount * $operationPrice;
            $stocks[$key]['sell_price'] = $amount * $sellPrice;
            $stocks[$key]['profitability'] = $profit;

            $percentage = $amount / $number;
            $profitability = $profitability + $percentage * $profit;
        }

        return [
            'total_amount' => $total,
            'amount' => $number,
            'stock_price' => $sellPrice,
            'profitability' => $profitability,
            'total_price' => $total * $sellPrice,
            'stocks' => $stocks
        ];
    }

}
