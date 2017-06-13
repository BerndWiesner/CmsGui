<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsGui\Communication\Tabs;

use Generated\Shared\Transfer\CmsBlockGlossaryTransfer;
use Generated\Shared\Transfer\CmsGlossaryTransfer;
use Generated\Shared\Transfer\TabItemTransfer;
use Generated\Shared\Transfer\TabsViewTransfer;
use Spryker\Zed\Gui\Communication\Tabs\AbstractTabs;

class CmsBlockGlossaryTabs extends AbstractTabs
{

    /**
     * @var \Generated\Shared\Transfer\CmsGlossaryTransfer $cmsGlossaryTransfer
     */
    protected $glossaryTransfer;

    /**
     * @param CmsBlockGlossaryTransfer $glossaryTransfer
     */
    public function __construct(CmsBlockGlossaryTransfer $glossaryTransfer)
    {
        $this->glossaryTransfer = $glossaryTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\TabsViewTransfer $tabsViewTransfer
     *
     * @return \Generated\Shared\Transfer\TabsViewTransfer
     */
    protected function build(TabsViewTransfer $tabsViewTransfer)
    {
         $this->createPlaceHolderTabs($tabsViewTransfer)
            ->setFooter($tabsViewTransfer);

         return $tabsViewTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\TabsViewTransfer $tabsViewTransfer
     *
     * @return $this
     */
    protected function createPlaceHolderTabs(TabsViewTransfer $tabsViewTransfer)
    {
        foreach ($this->glossaryTransfer->getGlossaryPlaceholders() as $glossaryPlaceholderTransfer) {
            $tabItemTransfer = new TabItemTransfer();
            $tabItemTransfer->setName($glossaryPlaceholderTransfer->getPlaceholder());
            $tabItemTransfer->setTemplate('@CmsGui/_partial/glossary/tab-cms-block-placeholder.twig');
            $tabItemTransfer->setTitle(ucfirst($glossaryPlaceholderTransfer->getPlaceholder()));
            $tabsViewTransfer->addTab($tabItemTransfer);
        }

        return $this;
    }

    /**
     * @param \Generated\Shared\Transfer\TabsViewTransfer $tabsViewTransfer
     *
     * @return $this
     */
    protected function setFooter(TabsViewTransfer $tabsViewTransfer)
    {
        $tabsViewTransfer->setFooterTemplate('@CmsGui/_template/_form-submit.twig')
            ->setIsNavigable(true);

        return $this;
    }

}