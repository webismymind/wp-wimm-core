<?php

namespace Wimm\Core;

use Wimm\Core\CustomPostType;

class CustomTaxonomy {

    protected $labelName;
    protected $labelSingularName;
    protected $labelMenuName;
    protected $labelAllItems;
    protected $labelParentItem;
    protected $labelParentItemColon;
    protected $labelNewItemName;
    protected $labelAddItem;
    protected $labelEditItem;
    protected $labelUpdateItem;
    protected $labelNewItem;
    protected $labelSeparateItemsWithCommas;
    protected $labelSearchItems;
    protected $labelAddRemoveItems;
    protected $labelChooseFromMostUsed;
    protected $rewriteSlug;
    protected $isRewriteWithFront;
    protected $isRewriteHierarchical;
    protected $isHierarchical;
    protected $isPublic;
    protected $isShowUi;
    protected $isShowAdminColumn;
    protected $isShowInNavMenus;
    protected $isShowTagCloud;
    protected $queryVar;

      /**
     * Register the taxonomy into WP
     */
    public function registerTaxonomy($postType) {
        
        \register_taxonomy($this->queryVar, $postType, array(
            'labels' => array(
                'name' => $this->labelName,
                'singular_name' => $this->labelSingularName,
                'menu_name' => $this->labelMenuName,
                'all_items' => $this->labelAllItems,
                'parent_item' => $this->labelParentItem,
                'parent_item_colon' => $this->labelParentItemColon,
                'new_item_name' => $this->labelNewItemName,
                'add_new_item' => $this->labelAddItem,
                'edit_item' => $this->labelEditItem,
                'update_item' => $this->labelUpdateItem,
                'separate_items_with_commas' => $this->labelSeparateItemsWithCommas,
                'search_items' => $this->labelSearchItems,
                'add_or_remove_items' => $this->labelAddItem,
                'choose_from_most_used' => $this->labelChooseFromMostUsed,
            ),
            'hierarchical' => $this->isHierarchical,
            'public' => $this->isPublic,
            'show_ui' => $this->isShowUi,
            'show_admin_column' => $this->isShowAdminColumn,
            'show_in_nav_menus' => $this->isShowInNavMenus,
            'show_tagcloud' => $this->isShowTagCloud,
            'query_var' => $this->queryVar,
            'rewrite' => array(
                'slug' => $this->rewriteSlug,
                'with_front' => $this->isRewriteWithFront,
                'hierarchical' => $this->isRewriteHierarchical,
            ),
        ));
    }



    public function getLabelName() {
        return $this->labelName;
    }

    public function getLabelSingularName() {
        return $this->labelSingularName;
    }

    public function getLabelMenuName() {
        return $this->labelMenuName;
    }

    public function getLabelAllItems() {
        return $this->labelAllItems;
    }

    public function getLabelParentItem() {
        return $this->labelParentItem;
    }

    public function getLabelParentItemColon() {
        return $this->labelParentItemColon;
    }

    public function getLabelNewItemName() {
        return $this->labelNewItemName;
    }

    public function getLabelAddItem() {
        return $this->labelAddItem;
    }

    public function getLabelEditItem() {
        return $this->labelEditItem;
    }

    public function getLabelUpdateItem() {
        return $this->labelUpdateItem;
    }

    public function getLabelNewItem() {
        return $this->labelNewItem;
    }

    public function getLabelSeparateItemsWithCommas() {
        return $this->labelSeparateItemsWithCommas;
    }

    public function getLabelSearchItems() {
        return $this->labelSearchItems;
    }

    public function getLabelAddRemoveItems() {
        return $this->labelAddRemoveItems;
    }

    public function getLabelChooseFromMostUsed() {
        return $this->labelChooseFromMostUsed;
    }

    public function getRewriteSlug() {
        return $this->rewriteSlug;
    }

    public function getIsRewriteWithFront() {
        return $this->isRewriteWithFront;
    }

    public function getIsRewriteHierarchical() {
        return $this->isRewriteHierarchical;
    }

    public function getIsHierarchical() {
        return $this->isHierarchical;
    }

    public function getIsPublic() {
        return $this->isPublic;
    }

    public function getIsShowUi() {
        return $this->isShowUi;
    }

    public function getIsShowAdminColumn() {
        return $this->isShowAdminColumn;
    }

    public function getIsShowInNavMenus() {
        return $this->isShowInNavMenus;
    }

    public function getIsShowTagCloud() {
        return $this->isShowTagCloud;
    }

    public function getQueryVar() {
        return $this->queryVar;
    }

    public function setLabelName($labelName) {
        $this->labelName = $labelName;
        return $this;
    }

    public function setLabelSingularName($labelSingularName) {
        $this->labelSingularName = $labelSingularName;
        return $this;
    }

    public function setLabelMenuName($labelMenuName) {
        $this->labelMenuName = $labelMenuName;
        return $this;
    }

    public function setLabelAllItems($labelAllItems) {
        $this->labelAllItems = $labelAllItems;
        return $this;
    }

    public function setLabelParentItem($labelParentItem) {
        $this->labelParentItem = $labelParentItem;
        return $this;
    }

    public function setLabelParentItemColon($labelParentItemColon) {
        $this->labelParentItemColon = $labelParentItemColon;
        return $this;
    }

    public function setLabelNewItemName($labelNewItemName) {
        $this->labelNewItemName = $labelNewItemName;
        return $this;
    }

    public function setLabelAddItem($labelAddItem) {
        $this->labelAddItem = $labelAddItem;
        return $this;
    }

    public function setLabelEditItem($labelEditItem) {
        $this->labelEditItem = $labelEditItem;
        return $this;
    }

    public function setLabelUpdateItem($labelUpdateItem) {
        $this->labelUpdateItem = $labelUpdateItem;
        return $this;
    }

    public function setLabelNewItem($labelNewItem) {
        $this->labelNewItem = $labelNewItem;
        return $this;
    }

    public function setLabelSeparateItemsWithCommas($labelSeparateItemsWithCommas) {
        $this->labelSeparateItemsWithCommas = $labelSeparateItemsWithCommas;
        return $this;
    }

    public function setLabelSearchItems($labelSearchItems) {
        $this->labelSearchItems = $labelSearchItems;
        return $this;
    }

    public function setLabelAddRemoveItems($labelAddRemoveItems) {
        $this->labelAddRemoveItems = $labelAddRemoveItems;
        return $this;
    }

    public function setLabelChooseFromMostUsed($labelChooseFromMostUsed) {
        $this->labelChooseFromMostUsed = $labelChooseFromMostUsed;
        return $this;
    }

    public function setRewriteSlug($rewriteSlug) {
        $this->rewriteSlug = $rewriteSlug;
        return $this;
    }

    public function setIsRewriteWithFront($isRewriteWithFront) {
        $this->isRewriteWithFront = $isRewriteWithFront;
        return $this;
    }

    public function setIsRewriteHierarchical($isRewriteHierarchical) {
        $this->isRewriteHierarchical = $isRewriteHierarchical;
        return $this;
    }

    public function setIsHierarchical($isHierarchical) {
        $this->isHierarchical = $isHierarchical;
        return $this;
    }

    public function setIsPublic($isPublic) {
        $this->isPublic = $isPublic;
        return $this;
    }

    public function setIsShowUi($isShowUi) {
        $this->isShowUi = $isShowUi;
        return $this;
    }

    public function setIsShowAdminColumn($isShowAdminColumn) {
        $this->isShowAdminColumn = $isShowAdminColumn;
        return $this;
    }

    public function setIsShowInNavMenus($isShowInNavMenus) {
        $this->isShowInNavMenus = $isShowInNavMenus;
        return $this;
    }

    public function setIsShowTagCloud($isShowTagCloud) {
        $this->isShowTagCloud = $isShowTagCloud;
        return $this;
    }

    public function setQueryVar($queryVar) {
        $this->queryVar = $queryVar;
        return $this;
    }

}
