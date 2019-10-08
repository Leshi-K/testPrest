<?php
class Students extends ObjectModel
{

	public static $definition = array(
	  'table' => 'students',
	  'primary' => 'id_student',
	  'multilang' => true,
	  'fields' => array(
	    'id_student'   => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
	    'date_born'    => array('type' => self::TYPE_DATE, 'validate' => 'isDate'),
	    'average_mark' => array('type' => self::TYPE_INT),
	    'active'       => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),

	    // Language fields
	    'name'         => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 300),
	  ),
	);

	public function getAllStudents() {
    	$allStudents = array();

        $sql = new DbQuery();
        $sql->select('`name`');
        $sql->from('students');
        $result = Db::getInstance()->executeS($sql);

        foreach ($result as $row) {
        	$allStudents[] = $row['name'];
        }

        return $allStudents;
    }

    public function getBestStudent() {

        $sql = new DbQuery();
        $sql->select('`name`');
        $sql->from('students');
        $sql->orderBy('average_mark DESC');
        $sql->limit('1'); // В принципе, таких учеников может быть несколько, но в задании написано найти одного
        $result = Db::getInstance()->executeS($sql);

        return $result[0]['name'];
    }

    public function getMaxAverageMark() {

        $sql = new DbQuery();
        $sql->select('MAX(`average_mark`)');
        $sql->from('students');
        $result = Db::getInstance()->executeS($sql);

        return $result[0]['average_mark'];
    }
}