<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsGui\Communication\Form\DataProvider;

use Generated\Shared\Transfer\CmsGlossaryAttributesTransfer;
use Generated\Shared\Transfer\CmsGlossaryTransfer;
use Spryker\Zed\CmsGui\Communication\Form\Glossary\CmsGlossaryAttributesFormType;
use Spryker\Zed\CmsGui\Communication\Form\Glossary\CmsGlossaryFormType;
use Spryker\Zed\CmsGui\Dependency\Facade\CmsGuiToCmsInterface;

class CmsGlossaryFormTypeDataProvider
{

    const TYPE_GLOSSARY_NEW = 'New glossary';
    const TYPE_GLOSSARY_FIND = 'Find glossary by key';
    const TYPE_AUTO_GLOSSARY = 'Auto';
    const TYPE_FULLTEXT_SEARCH = 'Find glossary by value';

    /**
     * @var \Generated\Shared\Transfer\CmsGlossaryTransfer
     */
    protected $cmsGlossaryTransfer;

    /**
     * @var \Spryker\Zed\CmsGui\Dependency\Facade\CmsGuiToCmsInterface
     */
    protected $cmsFacade;

    /**
     * @param \Spryker\Zed\CmsGui\Dependency\Facade\CmsGuiToCmsInterface $cmsFacade
     */
    public function __construct(CmsGuiToCmsInterface $cmsFacade)
    {
        $this->cmsFacade = $cmsFacade;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return [
            'data_class' => CmsGlossaryTransfer::class,
            CmsGlossaryFormType::OPTION_DATA_CLASS_ATTRIBUTES => CmsGlossaryAttributesTransfer::class,
        ];
    }

    /**
     * @param int $idCmsPage
     *
     * @return \Generated\Shared\Transfer\CmsGlossaryTransfer
     */
    public function getData($idCmsPage)
    {
        return $this->cmsFacade->findPageGlossaryAttributes($idCmsPage);
    }

}
