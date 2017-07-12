@if ($offer->status == \App\Models\Offer::STATUS_VEHICLE_PHASE)
    <span class="label label-default">Derecho preferente para inversores de la participada</span>
@elseif ($offer->status == \App\Models\Offer::STATUS_CLUB_PHASE)
    <span class="label label-default">Derecho preferente para todo el club</span>
@else
    <span class="label label-default">{!! $offer->status !!}</span>
@endif
