<?php 

namespace App\Models;

/**
 * This class was created for comfortable working with tree structures and allow 
 * you find all children of selected node id
 */
class SearchChildrenOfNodes {

    private $childrenList = [];
    private $subnodeName = 'children';
    private $selectedNodeWithChildren = [];

    public function setSubnodeName(string $subnodeName) {
        $this->subnodeName = $subnodeName;
        return $this;
    }

    public function getChildrenNodesList(array $tree, int $idParentNode) : array {
        $this->selectNodeWithChildrenById($tree, $idParentNode);
        $this->addChildrenOfNodeToList($this->selectedNodeWithChildren);
        return $this->childrenList;
    }

    private function selectNodeWithChildrenById(array $tree, int $idParentNode) {
        foreach ( $tree as $node ) {
            if ( $node['id'] == $idParentNode ) {
                $adaptNode[] = $node;
                $this->selectedNodeWithChildren = $adaptNode;
                return;
            }
            if ( isset($node[$this->subnodeName]) ) {
                $this->selectNodeWithChildrenById($node[$this->subnodeName], $idParentNode);
            }
        }
    }

    private function addChildrenOfNodeToList(array $tree) {
        foreach( $tree as $nodes ) {
            if ( isset($nodes['children']) ) {                
                foreach ($nodes['children'] as $node) {
                    $this->childrenList[] = $node['id'];
                }
                $this->addChildrenOfNodeToList( $nodes[$this->subnodeName] );
            }
        }
    }

}