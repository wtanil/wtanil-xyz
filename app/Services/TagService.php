<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Contracts\TagInterface as Tag;

class TagService {

    protected $tag;

    /**
     *  Contructor
     *
     *  @param
     *  @return void
     */
    public function __construct(Tag $tag) {
        $this->tag = $tag;
    }

    /**
     *  Return all tags
     *
     *  @param
     *  @return 
     */
    public function all() {
        
    }




















}