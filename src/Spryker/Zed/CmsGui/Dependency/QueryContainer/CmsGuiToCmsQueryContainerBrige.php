<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsGui\Dependency\QueryContainer;

use Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface;

class CmsGuiToCmsQueryContainerBrige implements CmsGuiToCmsQueryContainerInterface
{

    /**
     * @var CmsQueryContainerInterface
     */
    protected $cmsQueryContainer;

    /**
     * @param \Spryker\Zed\Cms\Persistence\CmsQueryContainerInterface $cmsQueryContainer
     */
    public function __construct($cmsQueryContainer)
    {
        $this->cmsQueryContainer = $cmsQueryContainer;
    }

    /**
     * @return \Orm\Zed\Cms\Persistence\SpyCmsTemplateQuery
     */
    public function queryTemplates()
    {
        return $this->cmsQueryContainer->queryTemplates();
    }

    /**
     * @param int $idPage
     *
     * @return \Orm\Zed\Cms\Persistence\SpyCmsBlockQuery
     */
    public function queryBlockByIdPage($idPage)
    {
        return $this->cmsQueryContainer->queryBlockByIdPage($idPage);
    }

    /**
     * @param int $idPage
     *
     * @return \Orm\Zed\Cms\Persistence\SpyCmsPageQuery
     */
    public function queryPageWithTemplatesAndUrlByIdPage($idPage)
    {
        return $this->cmsQueryContainer->queryPageWithTemplatesAndUrlByIdPage($idPage);
    }

    /**
     * @param int $idPage
     * @param int $idLocale
     *
     * @return \Orm\Zed\Cms\Persistence\SpyCmsGlossaryKeyMappingQuery
     */
    public function queryGlossaryKeyMappingsWithKeyByPageId($idPage, $idLocale)
    {
        return $this->cmsQueryContainer->queryGlossaryKeyMappingsWithKeyByPageId($idPage, $idLocale);
    }

}
