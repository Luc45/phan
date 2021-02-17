<?php

declare(strict_types=1);

namespace Phan\Language\Element;

use Phan\Analysis\AssignmentVisitor;
use Phan\CodeBase;
use Phan\Language\Context;
use Phan\Language\FileRef;
use Phan\Language\UnionType;

/**
 * This class represents a global variable in a local scope, allowing to partially
 * proxy write reference to the global object.
 */
class GlobalVariable extends Variable
{

    use ElementProxyTrait;

    public function getName() : string {
        return $this->element->getName();
    }

    public function setUnionType(UnionType $type): void
    {
        $this->type = $type;
        $this->element->setUnionType($type->eraseRealTypeSetRecursively());
    }

}
