<?php

namespace App\Libs;

class SearchEngine{

    private $searchModels = [];
    private $searchKey = null;

    public function registerModel($model){
        $this->searchModels[] = $model;
    }

    public function getRegisteredModels(){
        return $this->searchModels;
    }

    public function getSearchKey(){
        return $this->searchKey;
    }

    public function executeSearch($search_key){

        $this->clearResults();
        $this->searchKey = $search_key;

        foreach($this->searchModels as $model){
            if(method_exists($model,'search')){
                $this->searchModels[$model] = $model::search($this->getSearchKey());
            }
        }
    }

    public function getResultsFor($model){
        if(!array_key_exists($model,$this->searchModels)){
            return collect();
        }
        return $this->searchModels[$model];
    }

    public function clearResults(){
        $this->searchKey = null;
        foreach($this->searchModels as $key){
            if(array_key_exists((string) $key,$this->searchModels)){
                $this->searchModels[$key] = [];
            }
        }
    }

}