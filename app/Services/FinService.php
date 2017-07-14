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
        $totalBuyPrice = 0;
        $left = $number;
        foreach ($stocks as $key => $stock) {
            $amount = min($left, $stock['amount']);
            $left = $left - $amount;
            $operationPrice = $stock['stock_price'];
            $profit = $amount == 0 ? 0:($sellPrice / $operationPrice);
            $buyPrice = $amount * $operationPrice;
            $totalBuyPrice = $totalBuyPrice + $buyPrice;
            $stocks[$key]['stock_amount'] = $amount;
            $stocks[$key]['buy_price'] = $buyPrice;
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
            'total_buy_price' => $totalBuyPrice,
            'total_price' => $number * $sellPrice,
            'stocks' => $stocks
        ];
    }

    public static function getResumeForPosition($position)
    {
        $amount = $position['total_price'];
        $totalBuyPrice = $position['total_buy_price'];
        $profit = $amount - $totalBuyPrice;
        $fee = $profit * 0.17;
        $vat = $fee * 0.21;

        return [
            'amount' => $amount,
            'total_buy_price' => $totalBuyPrice,
            'profit' => $profit,
            'fee' => $fee,
            'vat' => $vat,
            'total_amount' => $amount - $fee - $vat
        ];
    }

}
