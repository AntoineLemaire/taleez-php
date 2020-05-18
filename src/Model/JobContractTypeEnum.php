<?php

namespace Taleez\Model;

use CommerceGuys\Enum\AbstractEnum;

class JobContractTypeEnum extends AbstractEnum
{
    const CDI = 'CDI';
    const CDD = 'CDD';
    const INTERIM = 'INTERIM';
    const FREELANCE = 'FREELANCE';
    const INTERNSHIP = 'INTERNSHIP';
    const APPRENTICESHIP = 'APPRENTICESHIP';
    const STUDENT = 'STUDENT';
    const VIE = 'VIE';
    const FRANCHISE = 'FRANCHISE';
    const STATUTE = 'STATUTE';
    const INTERMITTENT = 'INTERMITTENT';
    const SEASON = 'SEASON';
    const OTHER = 'OTHER';
    const VOLUNTEER = 'VOLUNTEER';
    const PERMANENT = 'PERMANENT';
    const FIXEDTERM = 'FIXEDTERM';
}
