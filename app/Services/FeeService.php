<?php

namespace App\Services;
use App\User;
use App\Models\Fund;

class FeeService {

    public static function getFeeForInvestorAndProfit(User $seller, Fund $fund, $profitAmount, $profitability)
    {
        $percentageProfit = $profitability*100-100;
        $fee = $fund->fees()
            ->where('from', '<=', $percentageProfit)
            ->orderBy('from', 'desc')
            ->first();

        if (!$fee) return [
            'amount' => 0,
            'explanation' => 'No commision'
        ];

        $percentage = $fee->percentage;
        $preFee = $profitAmount * $percentage/100;

        if ($fee->min && $fee->min > $preFee) {
            return [
                'amount' => $fee->min,
                'explanation' => 'Min ' . $fee->min
            ];
        } else {
            return [
                'amount' => $preFee,
                'explanation' => $fee->percentage . '%'
            ];
        }
    }
}
