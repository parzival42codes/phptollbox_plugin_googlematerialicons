<?php

class PluginGooglematerialicons_event extends Base
{
    public static function insertFontLoad(): void
    {
        // https://fonts.google.com/icons

        ContainerExtensionTemplateParseInsertPositions::insert('/ContainerIndexPage/Template/Positions/Head',
                                                               '<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">');
    }

    public static function setHeader($triggering, $object, &$scope): void
    {
        $scope['headerCMS']['style-src'][] = 'https://fonts.googleapis.com/icon?family=Material+Icons';
    }
}
