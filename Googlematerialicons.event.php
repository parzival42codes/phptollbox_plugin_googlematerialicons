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
        $scope['headerCMS']['font-src'][] = 'https://fonts.gstatic.com';
    }

    public static function setTemplateFunction($triggering, $object, &$scope): void
    {
        $template->setRegisteredFunctions('historyEditFormFooter',
            function ($content, $htmlTags, $templateObject) {
                /** @var ContainerExtensionTemplate $templateObject */

                if ($templateObject->getAssign('APP_SOURCE') === ApplicationAdministrationContentEdit_app::CONTENT_SOURCE_MAIN) {

                    /** @var ContainerExtensionTemplate $template */
                    $template = Container::get('ContainerExtensionTemplate');
                    $template->set($content);
                    $template->parse();

                    return $template->get();
                }
                else {
                    return '';
                }

            });
    }
}
