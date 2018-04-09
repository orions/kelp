<?php

namespace App\DTOFactory;

use App\DTO\PackagingDTO;
use App\Entity\Packaging;

/**
 * Class PackagingDTOFactory
 * @package App\DTOFactory
 */
class PackagingDTOFactory
{
    /**
     * @param Packaging|null $packaging
     * @return PackagingDTO
     */
    public function newInstance(Packaging $packaging = null): PackagingDTO
    {
        return new PackagingDTO($packaging);
    }
}
