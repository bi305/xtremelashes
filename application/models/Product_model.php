<?php
class Product_Model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
// Count all record of table "contact_info" in database.
	public function record_count() {
		return $this->db->count_all("products");
	}

// Fetch data according to per_page limit.
	public function fetch_data($limit, $id) {
		$this->db->limit($limit, ($id-1)*$limit);

		$query = $this->db->get("products");
// print_r($this->db->last_query());
// die();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {

				$data[] = $row;
			}

			return $data;
		}

		return false;
	}


	public function getProduct($slug){
		$product = $this->db->select('*')->where('slug',$slug)->from('products')->get()->row_array();
		$product['images'] = $this->db->select('*')->where('product_id',$product['id'])->from('product_images')->get()->result_array();
		return $product;
	}


	public function similar($slug){
		if($this->session->userdata('site_lang')=='cn'){
			$products = $this->db->select('slug,thumbnail,name_cn')->order_by('rand()')->where_not_in('slug', array($slug))->limit(5)->from('products')->get()->result_array();
		}else{
			$products = $this->db->select('slug,thumbnail,name')->order_by('rand()')->where_not_in('slug', array($slug))->limit(5)->from('products')->get()->result_array();
		}
		

		return $products;
	}

	public function get_meta_pages($id){

		$page = $this->db->select('*')->from('pages')->where('id',$id)->get()->row();

		if($this->session->userdata('site_lang')=='cn'){
			$row =  $this->db->select('meta_tags_cn as tags, page_title_cn as title')->from('pages')->where('id',$id)->get()->row();
			$row->tags = str_replace("{site_url}",site_url(),$row->tags);
			$row->tags = str_replace("{slug}",$page->slug,$row->tags);

			return $row;

		}else{
			$row =  $this->db->select('meta_tags as tags, page_title as title')->from('pages')->where('id',$id)->get()->row();
			$row->tags = str_replace("{site_url}",site_url(),$row->tags);
			$row->tags = str_replace("{slug}",$page->slug,$row->tags);
			return $row;
		}

	}

	public function get_meta_products($slug){

		$product = $this->db->select('*')->from('products')->where('slug',$slug)->get()->row();


		if($this->session->userdata('site_lang')=='cn'){
			$row = $this->db->select('meta_tags_cn as tags, name_cn as title')->from('products')->where('slug',$slug)->get()->row();

			$row->tags = str_replace("{description_cn}",strip_tags($product->description_cn),$row->tags);
			$row->tags = str_replace("{slug}",$product->slug,$row->tags);
			$row->tags = str_replace("{name_cn}",strip_tags($product->name_cn),$row->tags);
			$row->tags = str_replace("{thumbnail}",$product->thumbnail,$row->tags);
			$row->tags = str_replace("{site_url}",site_url(),$row->tags);

			return $row;
		}
		else{
			$row = $this->db->select('meta_tags as tags, name as title')->from('products')->where('slug',$slug)->get()->row();
			$row->tags = str_replace("{description}",strip_tags($product->description),$row->tags);
			$row->tags = str_replace("{slug}",$product->slug,$row->tags);
			$row->tags = str_replace("{name}",strip_tags($product->name),$row->tags);
			$row->tags = str_replace("{thumbnail}",$product->thumbnail,$row->tags);
			$row->tags = str_replace("{site_url}",site_url(),$row->tags);

			return $row;

		}
	}

}