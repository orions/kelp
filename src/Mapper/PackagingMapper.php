<?php
/**
 * Created by PhpStorm.
 * User: b.tarall
 * Date: 26/03/2018
 * Time: 10:32
 */

namespace App\Mapper;

use App\DTOFilter\PackagingDTOFilter;
use App\Entity\Packaging;
use App\Repository\PackagingRepository;
use App\EntityFactory\PackagingEntityFactory;
use Symfony\Bridge\Doctrine\ManagerRegistry;

/**
 * Class PackagingMapper
 * @package App\Mapper
 */
class PackagingMapper
{
    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    /**
     * @var PackagingEntityFactory
     */
    protected $packagingFactory;

    /**
     * PackagingMapper constructor.
     * @param ManagerRegistry        $managerRegistry
     * @param PackagingEntityFactory $packagingFactory
     */
    public function __construct(ManagerRegistry $managerRegistry, PackagingEntityFactory $packagingFactory)
    {
        $this->managerRegistry  = $managerRegistry;
        $this->packagingFactory = $packagingFactory;
    }

    /**
     * @return PackagingRepository
     */
    protected function getRepository(): PackagingRepository
    {
        return $this->managerRegistry->getRepository(Packaging::class);
    }

    /**
     * @param PackagingDTOFilter $packagingDTO
     * @param                    $page
     * @param                    $maxPage
     * @return mixed
     */
    public function findAllByFilters(PackagingDTOFilter $packagingDTO, $page, $maxPage)
    {
        return $this->getRepository()->findAllByFilters($packagingDTO->text, $page, $maxPage);
    }
}
