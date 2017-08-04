<?php

namespace App\Services;
use App\User;
use App\Models\Fund;

class FinService {

    public static function getPositionForOperations($operations, $number, $sellPrice)
    {
        $stocks = MarketplaceService::getActualPositionAtVehicle($operations);
        return self::getPositionForStocks($stocks, $number, $sellPrice);
    }

    public static function getPositionForStocks($stocks, $sellingAmount, $sellingStockPrice)
    {
        $profitability = 0;
        $totalBuyPrice = 0;
        $left = $sellingAmount;
        $stockWithProfitability = collect();

        foreach ($stocks as $key => $stock) {
            $amount = min($left, $stock['amount']);
            $left = $left - $amount;
            $operationPrice = $stock['stock_price'];
            $profit = $amount == 0 ? 0:($sellingStockPrice / $operationPrice);
            $buyPrice = $amount * $operationPrice;
            $totalBuyPrice = $totalBuyPrice + $buyPrice;

            $stockWithProfitability->push([
                'amount' => $stock['amount'],
                'stock_price' => $operationPrice,
                'stock_amount' => $amount,
                'buy_price' => $buyPrice,
                'sell_price' => $amount * $sellingStockPrice,
                'profitability' => $profit
            ]);

            $percentage = $amount / $sellingAmount;
            $profitability = $profitability + $percentage * $profit;
        }

        return [
            'total_amount' => $stocks->sum('amount'),
            'amount' => $sellingAmount,
            'stock_price' => $sellingStockPrice,
            'profitability' => $profitability,
            'total_buy_price' => $totalBuyPrice,
            'total_price' => $sellingAmount * $sellingStockPrice,
            'stocks' => $stockWithProfitability
        ];
    }

    public static function getResumeForPosition(User $seller, Fund $fund, $position)
    {
        $amount = $position['total_price'];
        $totalBuyPrice = $position['total_buy_price'];
        $profit = $amount - $totalBuyPrice;
        $fee = FeeService::getFeeForInvestorAndProfit($seller, $fund, $profit, $position['profitability']);
        $feeAmount = $fee['amount'];
        $vat = $feeAmount * 0.21;

        $exitFee = $fee['amount'] + $vat;
        $buyFee = self::getBuyFee($amount);
        $managementFee = 100;
        $notaryFee = 250;

        return [
            'amount' => $amount,
            'total_buy_price' => $totalBuyPrice,
            'profit' => $profit,
            'fee' => $fee,
            'vat' => $vat,
            'total_amount' => $amount - $feeAmount - $vat,
            'buy_fee' => $buyFee,
            'exit_fee' => $exitFee,
            'managementFee' => $managementFee,
            'notaryFee' => $notaryFee,
            'total_profit' => $buyFee + $exitFee - $managementFee - $notaryFee
        ];
    }

    public static function getBuyFee($amount)
    {
        $fee = $amount * 0.04;
        return max(500, $fee * 0.21);
    }

}
