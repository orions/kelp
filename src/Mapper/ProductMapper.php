<?php
/**
 * Created by PhpStorm.
 * User: b.tarall
 * Date: 14/03/2018
 * Time: 10:11
 */

namespace App\Mapper;

use Doctrine\Common\Persistence\ObjectManager;

class ProductMapper
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var ProductFactory
     */
    protected $productFactory;

    /**
     * StorageMapper constructor.
     * @param ObjectManager  $objectManager
     * @param StorageFactory $storageFactory
     */
    public function __construct(ObjectManager $objectManager, ProductFactory $productFactory)
    {
        $this->objectManager  = $objectManager;
        $this->storageFactory = $storageFactory;
    }


}