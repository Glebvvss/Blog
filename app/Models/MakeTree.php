<?php

namespace App\Models;

class MakeTree {
        
    private $nameSubNodes = 'children';
    private $parentColumn = 'parent_id';

    public function makeTree(array $data) : array {
        $indexingData = $this->indexArrayById($data);        

        $tree = [];        
        foreach ($indexingData as $id => &$node) {
            if ($node[$this->parentColumn] == 0) {
                $tree[$id] = &$node;
            } else {
                $indexingData[$node[$this->parentColumn]] [$this->nameSubNodes][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    private function indexArrayById(array $data) : array {
        $array = [];
        foreach( $data as $row ) {
            $array[$row['id']] = $row;
        }
        return $array;
    }

    protected function setNameSubnodes(string $nameSubNodes) {
        $this->nameSubNodes = $nameSubNodes;
        return $this;
    }

    protected function setParentColumn(string $parentColumn) {
        $this->parentColumn = $parentColumn;
        return $this;
    }

}
