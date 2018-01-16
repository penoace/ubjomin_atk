<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexColumn
 *
 * @author wonk4rol
 */
Yii::import('zii.widgets.grid.CGridColumn');

class IndexColumn extends CGridColumn{
    
    public $sortable=false;
    
    public function init() {
        parent::init();
    }
    
    protected function renderDataCellContent($row, $data) {
        $pagination = $this->grid->dataProvider->getPagination();
        $index = $pagination->pageSize*$pagination->currentPage+$row+1;
        echo $index;
    }
}

?>
