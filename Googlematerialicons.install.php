<?php declare(strict_types=1);


class PluginGooglematerialicons_install extends ContainerFactoryModulInstall_abstract
{

    public function install(): void
    {
        $this->setEvent('/ContainerIndexPage/Template/Positions',
                        'PluginGooglematerialicons_event',
                        'insertFontLoad');

        $this->setEvent('/Core/Index/Header',
                        'PluginGooglematerialicons_event',
                        'setHeader');
    }

    public function uninstall(): void
    {
        $this->removeStdEntities();
    }

    public function activate(): void
    {
    }

    public function deactivate(): void
    {
        $this->removeStdEntitiesDeactivate();
    }


}
