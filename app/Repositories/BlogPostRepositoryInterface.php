<?php
namespace App\Repositories;


interface BlogPostRepositoryInterface
{
    /**

     *
     * @param int
     */
    public function get($post_id);

    /**

     *
     * @return mixed
     */
    public function all();

    /**
     *
     * @param int
     */
    public function delete($post_id);

    /**

     *
     * @param int
    $site_data     */
    public function update($post_id, object $post_data);


    /**

     *
     * @param object $post_data
     * @return mixed
     */
    public function store(object $post_data);
}