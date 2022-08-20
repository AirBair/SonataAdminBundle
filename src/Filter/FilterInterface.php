<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\AdminBundle\Filter;

use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Filter\Model\FilterData;

/**
 * @author Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * @method array getFormOptions();
 */
interface FilterInterface
{
    public const CONDITION_OR = 'OR';

    public const CONDITION_AND = 'AND';

    public function apply(ProxyQueryInterface $query, FilterData $filterData): void;

    /**
     * @throws \LogicException if the filter is not initialized
     */
    public function getName(): string;

    /**
     * @throws \LogicException if the filter is not initialized
     */
    public function getFormName(): string;

    /**
     * Returns the label to use for the current field.
     * Use null to fallback to the default label and false to hide the label.
     *
     * @return string|false|null
     */
    public function getLabel();

    /**
     * @param string|false|null $label
     */
    public function setLabel($label): void;

    /**
     * @return array<string, mixed>
     */
    public function getDefaultOptions(): array;

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array;

    /**
     * @param mixed $default
     *
     * @return mixed
     */
    public function getOption(string $name, $default = null);

    /**
     * @param mixed $value
     */
    public function setOption(string $name, $value): void;

    /**
     * @param array<string, mixed> $options
     */
    public function initialize(string $name, array $options = []): void;

    /**
     * @throws \RuntimeException if the `field_name` option is not set
     */
    public function getFieldName(): string;

    /**
     * @return array<array<string, mixed>> array of mappings
     */
    public function getParentAssociationMappings(): array;

    /**
     * @return array<string, mixed> field mapping
     *
     * @throws \RuntimeException if the `field_mapping` option is not set
     */
    public function getFieldMapping(): array;

    /**
     * @return array<string, mixed> association mapping
     *
     * @throws \RuntimeException if the `association_mapping` option is not set
     */
    public function getAssociationMapping(): array;

    /**
     * @return array<string, mixed>
     */
    public function getFieldOptions(): array;

    /**
     * @param mixed $default
     *
     * @return mixed
     */
    public function getFieldOption(string $name, $default = null);

    /**
     * @param mixed $value
     */
    public function setFieldOption(string $name, $value): void;

    public function getFieldType(): string;

    /**
     * NEXT_MAJOR: Remove this method.
     *
     * @deprecated since sonata-project/admin-bundle version 4.15 use getFormOptions() instead.
     *
     * Returns the main widget used to render the filter.
     *
     * @return array{string, array<string, mixed>}
     */
    public function getRenderSettings(): array;

    /**
     * Returns true if filter is active.
     */
    public function isActive(): bool;

    /**
     * Set the condition to use with the left side of the query : OR or AND.
     */
    public function setCondition(string $condition): void;

    public function getCondition(): ?string;

    public function getTranslationDomain(): ?string;
}
