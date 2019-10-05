<?php

namespace App\Models;

use App\Models\Components\Image;
use App\Models\Components\Slug;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class HandbookCategory extends Model
{
    use NodeTrait;
    use Image;
    use Slug;

    protected $fillable = [
        'ru_title', 'en_title', 'uz_title', 'ru_slug', 'en_slug', 'uz_slug', 'parent_id',
        'meta_title', 'meta_description', 'meta_keywords', 'template'
    ];

    const UPLOAD_DIRECTORY = 'uploads/handbook_categories_images/';

    /**
     * Children categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function categories()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->orderBy('position', 'asc');
    }

    /**
     * Check if category has children
    */
    public function hasCategories()
    {
        return isset($this->categories[0]);
    }

    /**
     * Parent category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parentCategory()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }

    /**
     * Check if category has parent category
     *
     * @return boolean
    */
    public function hasParentCategory()
    {
        return $this->parentCategory !== null;
    }

    /**
     * Category's handbooks
     *
     * @return mixed
    */
    public function companies()
    {
        return $this->hasMany(Company::class, 'category_id', 'id')->orderBy('position', 'asc');
    }

    /**
     * Check if category has handbooks
     *
     * @return boolean
    */
    public function hasCompanies()
    {
        return isset($this->companies[0]);
    }

    /**
     * Get type of need for this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function needType()
    {
        return $this->hasOne(NeedType::class, 'id', 'need_id');
    }

    /**
     * Category's services
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }

    /**
     * Menu item for thi category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menus()
    {
        return $this->belongsToMany(MenuItem::class, 'categories_menus', 'category_id', 'menu_id');
    }

    /**
     * CGU Files for this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cguFiles()
    {
        return $this->hasMany(CguCatalog::class, 'handbook_category_id', 'id');
    }

    /**
     * Check if category has CGU file
     *
     * @return boolean
     */
    public function hasCguFiles()
    {
        return $this->cguFiles()->count() > 0;
    }

    /**
     * Override delete method to delete image too
     *
     * @return void
     * @throws \Exception
     */
    public function delete()
    {
        $this->removeImage();
        parent::delete();
    }

    /**
     * Get cleand title
     *
     * @return string
     */
    public function getTitle($defaultTemplate = false)
    {
        return $defaultTemplate ? strip_tags($this->ru_title).' в Ташкенте' : strip_tags($this->ru_title);
    }

    /**
     * Get descendants companies count
     *
     * @return int
    */
    public function getAllCompaniesCount()
    {
        $companyCount = $this->companies()->count();
        foreach ($this->descendants as $child)
            $companyCount += $child->companies()->count();
        return $companyCount;
    }

    /**
     * Get all descendants companies
     *
     * @return array
    */
    public function getAllCompaniesFromDescendingCategories()
    {
        $categories = $this->descendants()->pluck('id');
        $categories[] = $this->getKey();

        return Company::whereIn('category_id', $categories)->get();
    }

    /**
     * Get all ancestors slugs as url param
     *
     * @return string
    */
    public function getAncestorsSlugs()
    {
        $slugs = $this->ancestors()->pluck('ru_slug');
        $slugs[] = $this->ru_slug;
        return implode("/", $slugs->toArray());
    }

    /**
     * Create category's meta information as parsable string
     *
     * @return string
    */
    public function createMetaInformation()
    {
        return "id=$this->id&ru_title=$this->ru_title&en_title=$this->en_title&uz_title=$this->uz_title
        &ru_slug=$this->ru_slug&en_slug=$this->en_slug
        &parent_id=$this->parent_id
        &meta_title=$this->meta_title&meta_description=$this->meta_description&meta_keywords=$this->meta_keywords
        &template=$this->template";
    }
}
