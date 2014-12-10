<?php
/**
 * The MetaModels extension allows the creation of multiple collections of custom items,
 * each with its own unique set of selectable attributes, with attribute extendability.
 * The Front-End modules allow you to build powerful listing and filtering of the
 * data in each collection.
 *
 * PHP version 5
 * @package     MetaModels
 * @subpackage  AttributeSelect
 * @author      Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author      Stefan heimes <stefan_heimes@hotmail.com>
 * @copyright   The MetaModels team.
 * @license     LGPL.
 * @filesource
 */

$GLOBALS['TL_EVENT_SUBSCRIBERS'][] = 'MetaModels\DcGeneral\Events\MetaModels\Select\BackendSubscriber';

$GLOBALS['TL_EVENTS'][\MetaModels\MetaModelsEvents::SUBSYSTEM_BOOT_BACKEND][] = function (
    MetaModels\Events\MetaModelsBootEvent $event
) {
    new MetaModels\DcGeneral\Events\Table\Attribute\Tags\Subscriber($event->getServiceContainer());
};

$GLOBALS['TL_EVENTS'][\MetaModels\Attribute\Events\CreateAttributeFactoryEvent::NAME][] = function (
    \MetaModels\Attribute\Events\CreateAttributeFactoryEvent $event
) {
    $factory = $event->getFactory();
    $factory->addTypeFactory(new MetaModels\Attribute\Tags\AttributeTypeFactory());
};
