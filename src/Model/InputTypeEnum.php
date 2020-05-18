<?php

namespace Taleez\Model;

use CommerceGuys\Enum\AbstractEnum;

class InputTypeEnum extends AbstractEnum
{
    const CHECKBOX = 'CHECKBOX';
    const RADIO = 'RADIO';
    const INPUT = 'INPUT';
    const NUMBER = 'NUMBER';
    const DATE = 'DATE';
    const TEXTAREA = 'TEXTAREA';
    const SELECT = 'SELECT';
    const SELECTMUL = 'SELECTMUL';
    const STAR = 'STAR';
    const DOC = 'DOC';
}
