<?php
//Overview page stats

function stats_box($title,$table,$select_part,$width="3", $where = false){
  $ci=& get_instance();
  if($where){
    $ci->db->where($where);
  }
  $ci->db->select($select_part);
  $ci->db->from($table);
  $query = $ci->db->get();
  $row = $query->row_array();

  $row_keys = array_keys($row);

  $box =array("box_title"=>$title, "box_count"=>$row[$row_keys[0]],"width"=>$width);
  return $box;
}


function single_series_chart($title,$table,$select_part,$group_part,$chart_type= "column",$y_axis_title="X Axis",$width="12",$where = false){
  $ci=& get_instance();
  if($where){
    $ci->db->where($where);
  }

  //echo $group_part;
  $chart = array();
  $chart["width"] = $width;
  $data = array();

  $ci->db->select($select_part);
  $ci->db->from($table);
  $ci->db->group_by($group_part);
  //$ci->db->order_by($category_field);
  $query = $ci->db->get();

  //echo $ci->db->last_query();

  foreach ($query->result_array() as $row)
  {
      $cat = $row[$group_part];
      $data["categories"][] = $cat;
  }

  $data_series_temp = array();

  foreach ($query->result_array() as $row)
  {

      $row_keys = array_keys($row);
      $cnt = $row[$row_keys[1]];
      $data_series_temp['name'] = "";
      $data_series_temp['data'][] = floatval($cnt);
  }




  $data["series"][] = $data_series_temp;

  //echo json_encode($data);


  $chart["title"] = $title;
  $chart["type"] = $chart_type;
  $chart["y_axis_title"] = $y_axis_title;
  $chart["categories"] = $data["categories"];
  $chart["series"] = $data["series"];
  return $chart;
}
