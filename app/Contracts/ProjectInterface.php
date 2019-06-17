<?php

namespace App\Contracts;

interface ProjectInterface {

	/**
	 *  Get all projects
	 *
	 *	@param
	 *  @return
	 */
	public function all();

    /**
     *  Get all publicly available projects
     *
     *  @param
     *  @return
     */
    public function forPublic();

}