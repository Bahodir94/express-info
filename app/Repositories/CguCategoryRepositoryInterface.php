<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 21:57
 */

namespace App\Repositories;


interface CguCategoryRepositoryInterface
{
    /**
     * Get's a post by it's ID
     *
     * @param int
     */
    public function get($category_id);

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($category_id);

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($category_id, object $category_data);

    /**
     * Store a post
     *
     * @param array $post_data
     * @return mixed
     */
    public function store(object $category_data);
}