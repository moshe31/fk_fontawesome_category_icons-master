<?php

class FaIcons extends DAO {

    private static $instance;

    public static function newInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __construct(){
        parent::__construct();
        $this->setTableName('fa_category_icons');
        $this->setPrimaryKey('fa_pk_i_id');
        $this->setFields(array('fa_pk_i_id', 'fa_icon', 'fa_color'));

    }

    /**
     * @param array 
     */

    public function fa_addCategoryIcons($data){
        foreach($data as $row){
            $result = $this->findByPrimaryKey($row['fa_pk_i_id']);
            if($result) {
                $this->updateByPrimaryKey(array('fa_icon' => $row['fa_icon'], 'fa_color' => $row['fa_color']), $row['fa_pk_i_id']);
            } else {
                $this->insert($row); 

            }
                
        }
    
    }

    /**
     * @param $id
     * @return array
     */

    public function fa_getIconById($id){
         return $this->findByPrimaryKey($id);

    }

    //import db table / install
    public function import($file){
        $path = osc_plugin_resource($file);
        $sql  = file_get_contents($path);
        
        if( !$this->dao->importSQL($sql) ) {
            throw new Exception( __('Error importing the database structure', 'fk_category_icons') );
        }
    }

    //Drop tables / uninstall
    public function drop_db_table(){
        $this->dao->query( 'DROP TABLE ' . $this->getTableName() );
    }
    
    
}
?>