<?php

namespace Taleez\Model;

use CommerceGuys\Enum\AbstractEnum;

class RecruiterRoleEnum extends AbstractEnum
{
    const ADMIN = 'ADMIN';
    const RECRUITER = 'RECRUITER';
    const MANAGER = 'MANAGER';
    const CONTRIBUTOR = 'CONTRIBUTOR';
    const READER = 'READER';
}
