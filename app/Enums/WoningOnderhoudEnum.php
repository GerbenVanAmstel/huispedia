<?php

namespace App\Enums;

enum WoningOnderhoudEnum: string
{
    case Uitstekend = 'Uitstekend';
    case Goed = 'Goed';
    case Gemiddeld = 'Gemiddeld';
    case ToeAanOnderhoud = 'Toe aan onderhoud';
    case Slecht = 'Slecht';
}
