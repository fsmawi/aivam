<?php

class Aivam_Util {

    static function trueValue($str) {
        return ($str == '0')?'':$str;
    }

    static function processException($eid, $logId=null) {

        $update = Model_Update::find($eid);
        $conditions = unserialize($update->conditions);
        $changes = unserialize($update->changes);

        $condition_set = "1=1";
        foreach ($conditions as $key=>$value) {
            $condition_set .= " AND $key = '".$value."'";
        }

        if(!is_null($logId)) {
            $condition_set .= " AND log_id = $logId";
        }

        $change_set = "";
        foreach ($changes as $key=>$value) {
            $change_set .= " $key = '".$value."',";
        }
        $change_set .= " status = 'ok',";

        $change_set = rtrim($change_set, ",");

        $query = "UPDATE `items` SET ".$change_set." WHERE ".$condition_set;

       DB::query($query)->execute();

    }

    static function processAllExceptions() {

        $updates = Model_Update::find('all');
        foreach ($updates as $value) {
            processException($value->id);
        }
    }

    static function processAllChanges($logId, $status = 'ko') {
        $where = array();
        if($status != 'ko') {
            $where = array(
                array('status', 'ok')
            );
        }else{
            $where = array(
                array('status', 'ko')
            );
        }

        $champs = Model_Champ::find('all', array(
            'where' => $where
        ));

        foreach ($champs as $champ) {

            $result = DB::update('items')
                ->value($champ->champ, $champ->val_final)
                ->where($champ->champ, '=', $champ->val_init)
                ->and_where('log_id', $logId)
                ->execute();

            //real ok is after updating all item from the start
            $champ->status = 'ok';
            $champ->save();

        }
    }
}

