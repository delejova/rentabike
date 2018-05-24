<?php

namespace App\Presenters;

use Nette;
use App\Model;
use Nette\Application\BadRequestException;
use Nette\Application\UI\Presenter;

/**
 * Zakladny presenter pre vsetky presentery, ktore od neho dedia.
 */
abstract class BasePresenter extends Presenter
{
    
        /**
         * Vola sa vzdy na zaciatku.
         * DOKONCIT - aby vzdy hodilo na login, z kazdeho presenteru, ak nie je pouzivatel prihlaseny.
         */
        protected function startup()
        {
                parent::startup();
                            
        }
    
        /** Vola sa pred vykreslenim kazdeho presenteru  a dava spolocne premenne do celeho layoutu webu. */
        protected function beforeRender()
        {
                parent::beforeRender();
                $this->template->admin = $this->getUser()->isInRole('admin');                       // kontrolny vypis pre rolu admin
                $this->template->employee = $this->getUser()->isInRole('employee');                 // kontrolny vypis pre rolu employee
                $this->template->facility = $this->getUser()->isInRole('facility');                 // kontrolny vypis pre rolu facility
                $this->template->receptionist = $this->getUser()->isInRole('receptionist');         // kontrolny vypis pre rolu recepcna
        }
    
}
