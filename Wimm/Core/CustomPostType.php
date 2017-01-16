<?php

namespace Wimm\Core;

/**
 * Represents a custom post type
 */
class CustomPostType {

    protected $name;
    protected $nameLabel;
    protected $singularNameLabel;
    protected $menuNameLabel;
    protected $parentItemColonLabel;
    protected $allItemsLabel;
    protected $viewItemsLabel;
    protected $addNewItemLabel;
    protected $addNewLabel;
    protected $editItemLabel;
    protected $updateItemLabel;
    protected $searchItemLabel;
    protected $notFoundLabel;
    protected $notFoundInTrashLabel;
    protected $slugRewrite;
    protected $isWithFrontRewrite;
    protected $isPagesRewrite;
    protected $isFeedRewrite;
    protected $label;
    protected $description;
    protected $supports;
    protected $taxonomies;
    protected $isHierarchical;
    protected $isPublic;
    protected $isShowUi;
    protected $isShowInMenu;
    protected $isShowInNavMenu;
    protected $isShowInAdminBar;
    protected $menuPosition;
    protected $menuIcon;
    protected $isCanExport;
    protected $isHasArchive;
    protected $isExcludeFromSearch;
    protected $isPubliclyQueryable;
    protected $capabilityType;
    public static $SUPPORT_TITLE = 'title';
    public static $SUPPORT_COMMENTS = 'comments';
    public static $SUPPORT_CUSTOMFIELD = 'custom-field';
    public static $SUPPORT_EDITOR = 'editor';
    public static $SUPPORT_THUMBNAIL = 'thumbnail';
    public static $SUPPORT_EXCERPT = 'excerpt';
    public static $SUPPORT_REVISIONS = 'revisions';
    public static $CAPABILITY_PAGE = 'page';

    /**
     * Register the post type into WP
     */
    public function registerPostType() {
        \register_post_type($this->name, array(
            'label' => $this->nameLabel,
            'description' => $this->description,
            array(
                'name' => $this->nameLabel,
                'singular_name' => $this->singularNameLabel,
                'menu_name' => $this->menuNameLabel,
                'parent_item_colon' => $this->parentItemColonLabel,
                'all_items' => $this->allItemsLabel,
                'view_item' => $this->viewItemsLabel,
                'add_new_item' => $this->addNewItemLabel,
                'add_new' => $this->addNewLabel,
                'edit_item' => $this->editItemLabel,
                'update_item' => $this->updateItemLabel,
                'search_items' => $this->searchItemLabel,
                'not_found' => $this->notFoundLabel,
                'not_found_in_trash' => $this->notFoundInTrashLabel,
            ),
            'supports' => $this->supports,
            'taxonomies' => $this->taxonomies,
            'hierarchical' => $this->isHierarchical,
            'public' => $this->isPublic,
            'show_ui' => $this->isShowUi,
            'show_in_menu' => $this->isShowInMenu,
            'show_in_nav_menus' => $this->isShowInNavMenu,
            'show_in_admin_bar' => $this->isShowInAdminBar,
            'menu_position' => $this->menuPosition,
            'menu_icon' => $this->menuIcon,
            'can_export' => $this->isCanExport,
            'has_archive' => $this->isHasArchive,
            'exclude_from_search' => $this->isExcludeFromSearch,
            'publicly_queryable' => $this->isPubliclyQueryable,
            'rewrite' => array(
                'slug' => $this->slugRewrite,
                'with_front' => $this->isWithFrontRewrite,
                'pages' => $this->isPagesRewrite,
                'feeds' => $this->isFeedRewrite,
            ),
            'capability_type' => $this->capabilityType,
                )
        );
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getNameLabel() {
        return $this->nameLabel;
    }

    public function getSingularNameLabel() {
        return $this->singularNameLabel;
    }

    public function getMenuNameLabel() {
        return $this->menuNameLabel;
    }

    public function getParentItemColonLabel() {
        return $this->parentItemColonLabel;
    }

    public function getAllItemsLabel() {
        return $this->allItemsLabel;
    }

    public function getViewItemsLabel() {
        return $this->viewItemsLabel;
    }

    public function getAddNewItemLabel() {
        return $this->addNewItemLabel;
    }

    public function getAddNewLabel() {
        return $this->addNewLabel;
    }

    public function getEditItemLabel() {
        return $this->editItemLabel;
    }

    public function getUpdateItemLabel() {
        return $this->updateItemLabel;
    }

    public function getSearchItemLabel() {
        return $this->searchItemLabel;
    }

    public function getNotFoundLabel() {
        return $this->notFoundLabel;
    }

    public function getNotFoundInTrashLabel() {
        return $this->notFoundInTrashLabel;
    }

    public function getSlugRewrite() {
        return $this->slugRewrite;
    }

    public function getIsWithFrontRewrite() {
        return $this->isWithFrontRewrite;
    }

    public function getIsPagesRewrite() {
        return $this->isPagesRewrite;
    }

    public function getIsFeedRewrite() {
        return $this->isFeedRewrite;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getSupports() {
        return $this->supports;
    }

    public function getTaxonomies() {
        return $this->taxonomies;
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

    public function getIsShowInMenu() {
        return $this->isShowInMenu;
    }

    public function getIsShowInNavMenu() {
        return $this->isShowInNavMenu;
    }

    public function getIsShowInAdminBar() {
        return $this->isShowInAdminBar;
    }

    public function getMenuPosition() {
        return $this->menuPosition;
    }

    public function getMenuIcon() {
        return $this->menuIcon;
    }

    public function getIsCanExport() {
        return $this->isCanExport;
    }

    public function getIsHasArchive() {
        return $this->isHasArchive;
    }

    public function getIsExcludeFromSearch() {
        return $this->isExcludeFromSearch;
    }

    public function getIsPubliclyQueryable() {
        return $this->isPubliclyQueryable;
    }

    public function getCapabilityType() {
        return $this->capabilityType;
    }

    public function setNameLabel($nameLabel) {
        $this->nameLabel = $nameLabel;
        return $this;
    }

    public function setSingularNameLabel($singularNameLabel) {
        $this->singularNameLabel = $singularNameLabel;
        return $this;
    }

    public function setMenuNameLabel($menuNameLabel) {
        $this->menuNameLabel = $menuNameLabel;
        return $this;
    }

    public function setParentItemColonLabel($parentItemColonLabel) {
        $this->parentItemColonLabel = $parentItemColonLabel;
        return $this;
    }

    public function setAllItemsLabel($allItemsLabel) {
        $this->allItemsLabel = $allItemsLabel;
        return $this;
    }

    public function setViewItemsLabel($viewItemsLabel) {
        $this->viewItemsLabel = $viewItemsLabel;
        return $this;
    }

    public function setAddNewItemLabel($addNewItemLabel) {
        $this->addNewItemLabel = $addNewItemLabel;
        return $this;
    }

    public function setAddNewLabel($addNewLabel) {
        $this->addNewLabel = $addNewLabel;
        return $this;
    }

    public function setEditItemLabel($editItemLabel) {
        $this->editItemLabel = $editItemLabel;
        return $this;
    }

    public function setUpdateItemLabel($updateItemLabel) {
        $this->updateItemLabel = $updateItemLabel;
        return $this;
    }

    public function setSearchItemLabel($searchItemLabel) {
        $this->searchItemLabel = $searchItemLabel;
        return $this;
    }

    public function setNotFoundLabel($notFoundLabel) {
        $this->notFoundLabel = $notFoundLabel;
        return $this;
    }

    public function setNotFoundInTrashLabel($notFoundInTrashLabel) {
        $this->notFoundInTrashLabel = $notFoundInTrashLabel;
        return $this;
    }

    public function setSlugRewrite($slugRewrite) {
        $this->slugRewrite = $slugRewrite;
        return $this;
    }

    public function setIsWithFrontRewrite($isWithFrontRewrite) {
        $this->isWithFrontRewrite = $isWithFrontRewrite;
        return $this;
    }

    public function setIsPagesRewrite($isPagesRewrite) {
        $this->isPagesRewrite = $isPagesRewrite;
        return $this;
    }

    public function setIsFeedRewrite($isFeedRewrite) {
        $this->isFeedRewrite = $isFeedRewrite;
        return $this;
    }

    public function setLabel($label) {
        $this->label = $label;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setSupports($supports) {
        $this->supports = $supports;
        return $this;
    }

    public function setTaxonomies($taxonomies) {
        $this->taxonomies = $taxonomies;
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

    public function setIsShowInMenu($isShowInMenu) {
        $this->isShowInMenu = $isShowInMenu;
        return $this;
    }

    public function setIsShowInNavMenu($isShowInNavMenu) {
        $this->isShowInNavMenu = $isShowInNavMenu;
        return $this;
    }

    public function setIsShowInAdminBar($isShowInAdminBar) {
        $this->isShowInAdminBar = $isShowInAdminBar;
        return $this;
    }

    public function setMenuPosition($menuPosition) {
        $this->menuPosition = $menuPosition;
        return $this;
    }

    public function setMenuIcon($menuIcon) {
        $this->menuIcon = $menuIcon;
        return $this;
    }

    public function setIsCanExport($isCanExport) {
        $this->isCanExport = $isCanExport;
        return $this;
    }

    public function setIsHasArchive($isHasArchive) {
        $this->isHasArchive = $isHasArchive;
        return $this;
    }

    public function setIsExcludeFromSearch($isExcludeFromSearch) {
        $this->isExcludeFromSearch = $isExcludeFromSearch;
        return $this;
    }

    public function setIsPubliclyQueryable($isPubliclyQueryable) {
        $this->isPubliclyQueryable = $isPubliclyQueryable;
        return $this;
    }

    public function setCapabilityType($capabilityType) {
        $this->capabilityType = $capabilityType;
        return $this;
    }

}
