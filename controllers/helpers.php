<?php

use hhc\DB\Hero;
use hhc\DB\HeroQuery;
use hhc\DB\User;
use hhc\DB\UserQuery;
use hhc\DB\UserVotes;
use hhc\DB\UserVotesQuery;

function getHeroNameFromAbbr($name) {
    $list = getAbbr();
    for ($i = 0; $i < sizeof($list); $i++) {
        if ($name == $list[$i]['abbr']) 
            return $list[$i]['name'];
    }
}

function getAbbr() {
    $heroes = HeroQuery::create()->find();
    $abbr = Array();
    foreach ($heroes as $hero) {
        if (strpos($hero->getName(), ' ')) {
            $ab = '';

            foreach (explode(' ', $hero->getName()) as $name)
                $ab .= strtolower($name[0]);

            $abbr[] = array(
                'name' => $hero->getName(),
                'abbr' => $ab
            );
        }
    }

    return $abbr;
}

function valid($name) {
    $heroes = HeroQuery::create()->find();

    foreach($heroes as $hero) {
        if (strtoupper(deslug($name)) == strtoupper($hero->getName()))
            return true;
    }

    return false;
}

function voted($user, $name, $counter) {
    // find if user exists
    $q = UserQuery::create()->filterById(getUserId($user))->find()->count();
    if ($q == 0) 
        return false;

    $q = UserVotesQuery::create()->filterByUserId(getUserId($user))->filterByHeroName(deslug($name))->filterByCounterName(deslug($counter))->find()->count();

    return $q == 0 ? false : true;
}

function registerVote($user, $name, $counter) {
    $vote = new UserVotes();
    $vote->setUserId(getUserId($user));
    $vote->setHeroName(deslug($name));
    $vote->setCounterName(deslug($counter));
    $vote->save();
}

function getUserId($user) {
    $q = UserQuery::create()->filterByUsername($user)->findOne();
    return $q->getId();
}

function isLoggedIn($user) {
    return $user == null ? false : true;
}

function slug($name) {
    return (strpos($name,' ') === true) ? str_replace(' ','+',$name) : str_replace('+','',$name);
}

function deslug($name) {
    return ucwords(strtolower(str_replace('+',' ',$name)));
}


?>
