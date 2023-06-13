<?php

namespace App\Enums;

enum WoningTypeEnum: string
{
    case Appartement = 'Appartement';
    case Tussenwoning = 'Tussenwoning';
    case Hoekwoning = 'Hoekwoning';
    case TweeOnderEenKapwoning = 'Twee-onder-een-kapwoning';
    case Vrijstaandewoning = 'Vrijstaande woning';
}
