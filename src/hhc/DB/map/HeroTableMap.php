<?php

namespace hhc\DB\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'hero' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.hhc.map
 */
class HeroTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'hhc.map.HeroTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('hero');
        $this->setPhpName('Hero');
        $this->setClassname('hhc\\DB\\Hero');
        $this->setPackage('hhc');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('hero_id', 'HeroID', 'INTEGER', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('team', 'Team', 'VARCHAR', true, 50, null);
        $this->addColumn('role', 'Role', 'VARCHAR', false, 200, null);
        $this->addColumn('attacktype', 'AttackType', 'VARCHAR', false, 100, null);
        $this->addColumn('attackrange', 'AttackRange', 'INTEGER', false, null, null);
        $this->addColumn('attackspeed', 'AttackSpeed', 'FLOAT', false, 4, null);
        $this->addColumn('hp', 'HP', 'INTEGER', false, null, null);
        $this->addColumn('mana', 'Mana', 'INTEGER', false, null, null);
        $this->addColumn('dmg', 'Dmg', 'VARCHAR', false, 20, null);
        $this->addColumn('dmgmin', 'DmgMin', 'INTEGER', false, null, null);
        $this->addColumn('dmgmax', 'DmgMax', 'INTEGER', false, null, null);
        $this->addColumn('armor', 'Armor', 'FLOAT', false, 4, null);
        $this->addColumn('magicarmor', 'MagicArmor', 'FLOAT', false, 4, null);
        $this->addColumn('stat', 'Stat', 'VARCHAR', true, 20, null);
        $this->addColumn('strength', 'Strength', 'INTEGER', false, null, null);
        $this->addColumn('strperlvl', 'Strperlvl', 'FLOAT', false, 4, null);
        $this->addColumn('agility', 'Agility', 'INTEGER', false, null, null);
        $this->addColumn('agiperlvl', 'Agiperlvl', 'FLOAT', false, 4, null);
        $this->addColumn('intelligence', 'Intelligence', 'INTEGER', false, null, null);
        $this->addColumn('intperlvl', 'Intperlvl', 'FLOAT', false, 4, null);
        $this->addColumn('hpregen', 'HpRegen', 'FLOAT', false, 4, null);
        $this->addColumn('manaregen', 'ManaRegen', 'FLOAT', false, 4, null);
        $this->addColumn('movespeed', 'MoveSpeed', 'INTEGER', false, null, null);
        $this->addColumn('difficulty', 'Difficulty', 'FLOAT', false, 3, null);
        $this->addColumn('slug', 'Slug', 'VARCHAR', false, 50, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Counter', 'hhc\\DB\\Counter', RelationMap::ONE_TO_MANY, array('id' => 'hid', ), null, null, 'Counters');
        $this->addRelation('CounterRelatedByCid', 'hhc\\DB\\Counter', RelationMap::ONE_TO_MANY, array('id' => 'cid', ), null, null, 'CountersRelatedByCid');
    } // buildRelations()

} // HeroTableMap
