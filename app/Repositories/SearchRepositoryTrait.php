<?php


namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * This is the searching function with paginate repository trait.
 *
 * @author J.W
 */
trait SearchRepositoryTrait
{
    /**
     * The paginated links generated by the paginate method.
     *
     * @var string
     */
    protected $searchpaginateLinks;

    /**
     * Get a paginated list of the models.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function search($search_term,$key_value='')
    {
        $model = $this->model;
        
        if(isset($search_term['orwhere'])){
            $paginator = $model::where($search_term['where'])->orwhere($search_term['orwhere'])->orderBy($model::$order, $model::$sort)->paginate($model::$paginate, $model::$index);
        }else{
            $paginator = $model::where($search_term['where'])->orderBy($model::$order, $model::$sort)->paginate($model::$paginate, $model::$index);
        }
             
        if (!$this->isSearchPageInRange($paginator) && !$this->isSearchFirstPage($paginator)) {
            throw new NotFoundHttpException();
        }

        if (count($paginator)) {
            $paginator->setPath('/customers/search/'.$key_value);
            $this->searchpaginateLinks = $paginator->render();
        }

        return $paginator;
    }

    /**
     * Is this current page in range?
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $paginator
     *
     * @return bool
     */
    protected function isSearchPageInRange(LengthAwarePaginator $paginator)
    {
        return ($paginator->currentPage() <= ceil($paginator->lastItem() / $paginator->perPage()));
    }

    /**
     * Is the current page the first page?
     *
     * @param \Illuminate\Pagination\LengthAwarePaginator $paginator
     *
     * @return bool
     */
    protected function isSearchFirstPage(LengthAwarePaginator $paginator)
    {
        return ($paginator->currentPage() === 1);
    }

    /**
     * Get the paginated links.
     *
     * @return string
     */
    public function searchlinks()
    {
        return $this->searchpaginateLinks;
    }
}
