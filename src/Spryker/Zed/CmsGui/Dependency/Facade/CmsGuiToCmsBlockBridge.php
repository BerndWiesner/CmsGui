<?php


namespace Spryker\Zed\CmsGui\Dependency\Facade;


use Generated\Shared\Transfer\CmsBlockTransfer;
use Spryker\Zed\CmsBlock\Business\CmsBlockFacadeInterface;

class CmsGuiToCmsBlockBridge implements CmsGuiToCmsBlockInterface
{
    /**
     * @var CmsBlockFacadeInterface
     */
    protected $cmsBlockFacade;

    public function __construct($cmsBlockFacade)
    {
        $this->cmsBlockFacade = $cmsBlockFacade;
    }

    /**
     * @param int $idCmsBlock
     *
     * @return CmsBlockTransfer|null
     */
    public function findCmsBlockId($idCmsBlock)
    {
        return $this->cmsBlockFacade->findCmsBlockById($idCmsBlock);
    }

    /**
     * @param int $idCmsBlock
     *
     * @return void
     */
    public function activateById($idCmsBlock)
    {
        $this->cmsBlockFacade->activateById($idCmsBlock);
    }

    /**
     * @param int $idCmsBlock
     *
     * @return void
     *
     */
    public function deactivateById($idCmsBlock)
    {
        $this->cmsBlockFacade->deactivateById($idCmsBlock);
    }

    /**
     * @param CmsBlockTransfer $cmsBlockTransfer
     *
     * @return CmsBlockTransfer
     */
    public function updateCmsBlock(CmsBlockTransfer $cmsBlockTransfer)
    {
        return $this->cmsBlockFacade->updateCmsBlock($cmsBlockTransfer);
    }
}