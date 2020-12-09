<?php
function publish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'1\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}
function unpublish_action($xcrud)
{
    if ($xcrud->get('primary'))
    {
        $db = Xcrud_db::get_instance();
        $query = 'UPDATE base_fields SET `bool` = b\'0\' WHERE id = ' . (int)$xcrud->get('primary');
        $db->query($query);
    }
}

function exception_example($postdata, $primary, $xcrud)
{
    // get random field from $postdata
    $postdata_prepared = array_keys($postdata->to_array());
    shuffle($postdata_prepared);
    $random_field = array_shift($postdata_prepared);
    // set error message
    $xcrud->set_exception($random_field, 'This is a test error', 'error');
}

function test_column_callback($value, $fieldname, $primary, $row, $xcrud)
{
    return $value . ' - nice!';
}

function after_upload_example($field, $file_name, $file_path, $params, $xcrud)
{
    $ext = trim(strtolower(strrchr($file_name, '.')), '.');
    if ($ext != 'pdf' && $field == 'uploads.simple_upload')
    {
        unlink($file_path);
        $xcrud->set_exception('simple_upload', 'This is not PDF', 'error');
    }
}

function movetop($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != 0)
            {
                array_splice($result, $key - 1, 0, array($item));
                unset($result[$key + 1]);
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}
function movebottom($xcrud)
{
    if ($xcrud->get('primary') !== false)
    {
        $primary = (int)$xcrud->get('primary');
        $db = Xcrud_db::get_instance();
        $query = 'SELECT `officeCode` FROM `offices` ORDER BY `ordering`,`officeCode`';
        $db->query($query);
        $result = $db->result();
        $count = count($result);

        $sort = array();
        foreach ($result as $key => $item)
        {
            if ($item['officeCode'] == $primary && $key != $count - 1)
            {
                unset($result[$key]);
                array_splice($result, $key + 1, 0, array($item));
                break;
            }
        }

        foreach ($result as $key => $item)
        {
            $query = 'UPDATE `offices` SET `ordering` = ' . $key . ' WHERE officeCode = ' . $item['officeCode'];
            $db->query($query);
        }
    }
}

function show_description($value, $fieldname, $primary_key, $row, $xcrud)
{
    $result = '';
    if ($value == '1')
    {
        $result = '<i class="fa fa-check" />' . 'OK';
    }
    elseif ($value == '2')
    {
        $result = '<i class="fa fa-circle-o" />' . 'Pending';
    }
    return $result;
}

function custom_field($value, $fieldname, $primary_key, $row, $xcrud)
{
    return '<input type="text" readonly class="xcrud-input" name="' . $xcrud->fieldname_encode($fieldname) . '" value="' . $value .
        '" />';
}
function unset_val($postdata)
{
    $postdata->del('Paid');
}

function format_phone($new_phone)
{
    $new_phone = preg_replace("/[^0-9]/", "", $new_phone);

    if (strlen($new_phone) == 7)
        return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $new_phone);
    elseif (strlen($new_phone) == 10)
        return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $new_phone);
    else
        return $new_phone;
}

function before_list_example($list, $xcrud)
{
    var_dump($list);
}

function after_update_test($pd, $pm, $xc)
{
    $xc->search = 0;
}

// function after_upload_test($field, &$filename, $file_path, $upload_config, $this)
// {
//     $filename = 'bla-bla-bla';
// }


function my_meta_tags($value, $fieldname, $primary_key, $row, $xcrud)
{

    $limited_word = word_limiter(htmlspecialchars($value),6);
   return $limited_word;
}

function product_insert($postdata, $xcrud){

        $meta_tags = '<title>{name} | Xtreme Lashes Hong Kong</title>
        <meta name="description" content="{description}"/>
        <meta name="robots" content="noodp"/>
        <link rel="canonical" href="{site_url}product/{slug}" />
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="article" />
        <meta property="og:title" content="{name} | Xtreme Lashes Hong Kong" />
        <meta property="og:description" content="{description}" />
        <meta property="og:url" content="{site_url}product/{slug}" />
        <meta property="og:site_name" content="Xtreme Lashes Hong Kong" />
        <meta property="og:image" content="{site_url}uploads/{thumbnail}" />
        <meta property="og:image:width" content="328" />
        <meta property="og:image:height" content="328" />
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:description" content="{description}" />
        <meta name="twitter:title" content="{name} | Xtreme Lashes Hong Kong" />
        <meta name="twitter:image" content="{site_url}uploads/{thumbnail}" />';
        
      $meta_tags_cn = '<title>{name_cn} | Xtreme Lashes Hong Kong</title>
      <meta name="description" content="{description_cn}"/>
      <meta name="robots" content="noodp"/>
      <link rel="canonical" href="{site_url}product/{slug}" />
      <meta property="og:locale" content="en_US" />
      <meta property="og:type" content="article" />
      <meta property="og:title" content="{name_cn} | Xtreme Lashes Hong Kong" />
      <meta property="og:description" content="{description_cn}" />
      <meta property="og:url" content="{site_url}product/{slug}" />
      <meta property="og:site_name" content="Xtreme Lashes Hong Kong" />
      <meta property="og:image" content="{site_url}uploads/{thumbnail}" />
      <meta property="og:image:width" content="328" />
      <meta property="og:image:height" content="328" />
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:description" content="{description_cn}" />
      <meta name="twitter:title" content="{name_cn} | Xtreme Lashes Hong Kong" />
      <meta name="twitter:image" content="{site_url}uploads/{thumbnail}" />';


        $slug = url_title($postdata->get('name'), 'dash', true);
        $db = Xcrud_db::get_instance();
        $query = "INSERT INTO `products`(name,name_cn,quantity,price,description,description_cn,details,details_cn,thumbnail,slug,meta_tags,meta_tags_cn)
         VALUES ('".$postdata->get('name')."','".$postdata->get('name_cn')."','".$postdata->get('quantity')."','".$postdata->get('price')."','".$postdata->get('description')."','".$postdata->get('description_cn')."','".$postdata->get('details')."','".$postdata->get('details_cn')."','".$postdata->get('thumbnail')."','".$slug."','".$meta_tags."','".$meta_tags_cn."')";
        $db->query($query);
}

function check_hours($postdata, $xcrud){
    $open_at = $postdata->get('open_at');
    $close_at = $postdata->get('close_at');
    $arr = array('09:00 AM','10:00 AM','11:00 AM','12:00 PM','01:00 PM','02:00 PM','03:00 PM','04:00 PM','05:00 PM','06:00 PM','07:00 PM','08:00 PM','09:00 PM');
    $open_at = array_search($open_at, $arr);
    $close_at = array_search($close_at, $arr);

    if($close_at<=$open_at){
        $xcrud->set_exception('close_at','Close time should be greater than open time!');
    }
}

function check_hours_update($postdata, $primary ,$xcrud){
    $open_at = $postdata->get('open_at');
    $close_at = $postdata->get('close_at');
    $arr = array('09:00 AM','10:00 AM','11:00 AM','12:00 PM','01:00 PM','02:00 PM','03:00 PM','04:00 PM','05:00 PM','06:00 PM','07:00 PM','08:00 PM','09:00 PM');
    $open_at = array_search($open_at, $arr);
    $close_at = array_search($close_at, $arr);

    if($close_at<=$open_at){
        $xcrud->set_exception('close_at','Close time should be greater than open time!');
    }
}
