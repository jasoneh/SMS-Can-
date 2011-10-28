<?php
/**
 * Featured Products on front page
 * @author Mathias Tervo
 *
 */

class FeaturedController extends AppController{

    var $name = 'Featured';

    var $helpers = array('Html', 'Session', );

    var $uses = array('Featured', );
    var $scaffold;

    function index(){
        $featured = $this->Featured->all();
        $this->set(compact('featured'));
    }
}