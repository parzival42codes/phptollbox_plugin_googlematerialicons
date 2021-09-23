<?php

class PluginGooglematerialicons_event extends Base
{
    public static function insertFontLoad(): void
    {
        // https://fonts.google.com/icons

        // <CMS function=""></CMS>
        // <span class="material-icons-outlined">favorite</span>

        ContainerExtensionTemplateParseInsertPositions::insert('/ContainerIndexPage/Template/Positions/Head',
                                                               '<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">');
    }

    public static function setHeader($triggering, $object, &$scope): void
    {
        $scope['headerCMS']['style-src'][] = 'https://fonts.googleapis.com';
        $scope['headerCMS']['font-src'][]  = 'https://fonts.gstatic.com';
    }

    public static function setTemplateFunction($triggering, $object, &$scope): void
    {
        ContainerExtensionTemplateParseInsertFunction::insert('googlematerialicons',
            function ($parameter) {
                return '<span class="material-icons ' . ($parameter['class'] ?? '') . '">' . ($parameter['icon'] ?? '') . '</span>';
            });
    }
}
