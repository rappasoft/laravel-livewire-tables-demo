<?php

namespace App\Traits\Tables;

trait DemoCoreHelper {

    use DemoSearchHelper;

    public function bootDemoCoreHelper()
    {
        $this->setConfigurableAreas([
            'before-tools' => 'livewire.tables.before-tools.table-controls',
        ]);
        
    }

    public function refreshWindow()
    {
        $this->js('window.location.reload()'); 
    }

}
