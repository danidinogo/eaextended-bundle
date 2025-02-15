<?php

namespace Danidinogo\Bundle\EaExtendedBundle\Field;

use EasyCorp\Bundle\EasyAdminBundle\Config\Asset;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;
use Symfony\Contracts\Translation\TranslatableInterface;

use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;

use Symfony\Component\Asset\Package;


final class ExtendedTextEditorField implements FieldInterface
{
    use FieldTrait;

    public const OPTION_NUM_OF_ROWS = 'numOfRows';
    public const OPTION_TRIX_EDITOR_CONFIG = 'trixEditorConfig';

    /**
     * @param TranslatableInterface|string|false|null $label
     */
    public static function new(string $propertyName, $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setTemplateName('crud/field/text_editor')
            ->setFormType(TextEditorType::class)
            ->addCssClass('asdasdsa.css')
            ->addCssFiles('/bundles/eaextended/extended-field-text-editor.css')
            ->addJsFiles('/bundles/eaextended/extended-field-text-editor.js')
            ->setDefaultColumns('col-md-9 col-xxl-7')
            ->setCustomOption(self::OPTION_NUM_OF_ROWS, null)
            ->setCustomOption(self::OPTION_TRIX_EDITOR_CONFIG, null);
    }

    public function setNumOfRows(int $rows): self
    {
        if ($rows < 1) {
            throw new \InvalidArgumentException(sprintf('The argument of the "%s()" method must be 1 or higher (%d given).', __METHOD__, $rows));
        }

        $this->setCustomOption(self::OPTION_NUM_OF_ROWS, $rows);

        return $this;
    }

    public function setTrixEditorConfig(array $config): self
    {
        $this->setCustomOption(self::OPTION_TRIX_EDITOR_CONFIG, $config);

        return $this;
    }
}
