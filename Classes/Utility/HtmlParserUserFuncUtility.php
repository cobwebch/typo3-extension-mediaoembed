<?php

namespace Sto\Mediaoembed\Utility;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "mediaoembed".              *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Utility class containing methods that can be called with the USER
 * content object.
 */
class HtmlParserUserFuncUtility
{
    /**
     * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface
     */
    protected $configurationManager;

    /**
     * Reads the "attributeValue" value from the given configuration
     * and if "stdWrap." is a non empty array the configuration below
     * and the attribute content will be passed to stdWrap.
     *
     * The context of stdWrap is the ContentObject renderer of the
     * OembedController.
     *
     * @param string|array $configuration
     * @param \TYPO3\CMS\Core\Html\HtmlParser $htmlParser
     * @return string
     */
    public function attributeStdWrap(
        $configuration,
        /** @noinspection PhpUnusedParameterInspection */
        $htmlParser
    ) {
        if (!is_array($configuration)) {
            return $configuration;
        }

        $content = $configuration['attributeValue'];

        if (isset($configuration['stdWrap.']) && is_array($configuration['stdWrap.'])
            && !empty($configuration['stdWrap.'])
        ) {
            $this->initialize();
            $content = $this->configurationManager->getContentObject()->stdWrap($content, $configuration['stdWrap.']);
        }

        return $content;
    }

    /**
     * Initializes required objects.
     */
    protected function initialize()
    {
        if (isset($this->configurationManager)) {
            return;
        }

        /** @var \TYPO3\CMS\Extbase\Object\ObjectManager $objectManager */
        $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        /** @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface $configurationManager */
        $this->configurationManager = $objectManager->get(
            'TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface'
        );
    }
}
