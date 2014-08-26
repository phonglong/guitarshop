<?php
class Item extends CI_Model
{
	/*
	Determines if a given item_id is an item
	*/
	function exists($item_id)
	{
		$this->db->from('items');
		$this->db->where('item_id',$item_id);
		$query = $this->db->get();

		return ($query->num_rows()==1);
	}

	/*
	Returns all the items
	*/
	function get_all($limit=10000, $offset=0,$col='name',$order='asc')
	{
		$this->db->from('items');
		$this->db->where('deleted',0);
		$this->db->order_by($col, $order);
		$this->db->limit($limit);
		$this->db->offset($offset);
		return $this->db->get();
	}
	
	function account_number_exists($item_number)
	{
		$this->db->from('items');	
		$this->db->where('item_number',$item_number);
		$query = $this->db->get();
		
		return ($query->num_rows()==1);
	}
	
	function count_all()
	{
		$this->db->from('items');
		$this->db->where('deleted',0);
		return $this->db->count_all_results();
	}
	
	/*
	Gets information about a particular item
	*/
	function get_info($item_id)
	{
		$this->db->from('items');
		$this->db->where('id',$item_id);
		
		$query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			$item_obj=new stdClass();

			//Get all the fields from items table
			$fields = $this->db->list_fields('items');

			foreach ($fields as $field)
			{
				$item_obj->$field='';
			}

			return $item_obj;
		}
	}

	/*
	Get an item id given an item number
	*/
	function get_item_id($item_number)
	{
		$this->db->from('items');
		$this->db->where('item_number',$item_number);

		$query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->row()->item_id;
		}

		return false;
	}

	/*
	Gets information about multiple items
	*/
	function get_multiple_info($item_ids)
	{
		$this->db->from('items');
		$this->db->where_in('item_id',$item_ids);
		$this->db->order_by("item_id", "asc");
		return $this->db->get();
	}

	/*
	Inserts or updates a item
	*/
	function save(&$item_data,$item_id=false)
	{
		if (!$item_id or !$this->exists($item_id))
		{
			if($this->db->insert('items',$item_data))
			{
				$item_data['item_id']=$this->db->insert_id();
				return true;
			}
			return false;
		}

		$this->db->where('item_id', $item_id);
		return $this->db->update('items',$item_data);
	}

	/*
	Updates multiple items at once
	*/
	function update_multiple($item_data,$item_ids,$select_inventory=0)
	{
		if(!$select_inventory){
		$this->db->where_in('item_id',$item_ids);
		}
		return $this->db->update('items',$item_data);
	}

	/*
	Deletes one item
	*/
	function delete($item_id)
	{
		$this->db->where('item_id', $item_id);
		return $this->db->update('items', array('deleted' => 1));
	}

	/*
	Deletes a list of items
	*/
	function delete_list($item_ids,$select_inventory)
	{
		if(!$select_inventory){
		$this->db->where_in('item_id',$item_ids);
		}
		return $this->db->update('items', array('deleted' => 1));
 	}

 	/*
	Get search suggestions to find items
	*/
	function get_search_suggestions($search,$limit=25)
	{
		$suggestions = array();

		$this->db->from('items');
		$this->db->like('name', $search, $this->config->item('speed_up_search_queries') ? 'after' : 'both');
		$this->db->where('deleted',0);
		$this->db->order_by("name", "asc");
		$by_name = $this->db->get();
		foreach($by_name->result() as $row)
		{
			$suggestions[]=array('label' => $row->name);
		}

		$this->db->select('category');
		$this->db->from('items');
		$this->db->where('deleted',0);
		$this->db->distinct();
		$this->db->like('category', $search, $this->config->item('speed_up_search_queries') ? 'after' : 'both');
		$this->db->order_by("category", "asc");
		$by_category = $this->db->get();
		foreach($by_category->result() as $row)
		{
			$suggestions[]=array('label' => $row->category);
		}

		$this->db->from('items');
		$this->db->like('item_number', $search, $this->config->item('speed_up_search_queries') ? 'after' : 'both');
		$this->db->where('deleted',0);
		$this->db->order_by("item_number", "asc");
		$by_item_number = $this->db->get();
		foreach($by_item_number->result() as $row)
		{
			$suggestions[]=array('label' => $row->item_number);
		}
		
		$this->db->from('items');
		$this->db->like('location', $search, $this->config->item('speed_up_search_queries') ? 'after' : 'both');
		$this->db->where('deleted',0);
		$this->db->order_by("name", "asc");
		$by_name = $this->db->get();
		foreach($by_name->result() as $row)
		{
			$suggestions[]=array('label' => $row->location);
		}

		//only return $limit suggestions
		if(count($suggestions > $limit))
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;

	}

	function get_item_search_suggestions($search,$limit=25)
	{
		$suggestions = array();

		$this->db->from('items');
		$this->db->where('deleted',0);
		$this->db->like('name', $search, $this->config->item('speed_up_search_queries') ? 'after' : 'both');
		$this->db->order_by("name", "asc");
		$by_name = $this->db->get();
		foreach($by_name->result() as $row)
		{
			$suggestions[]=array('value' => $row->item_id, 'label' => $row->name);
		}

		$this->db->from('items');
		$this->db->where('deleted',0);
		$this->db->like('item_number', $search, $this->config->item('speed_up_search_queries') ? 'after' : 'both');
		$this->db->order_by("item_number", "asc");
		$by_item_number = $this->db->get();
		foreach($by_item_number->result() as $row)
		{
			$suggestions[]=array('value' => $row->item_id, 'label' => $row->item_number);
		}

		//only return $limit suggestions
		if(count($suggestions > $limit))
		{
			$suggestions = array_slice($suggestions, 0,$limit);
		}
		return $suggestions;

	}

	function get_category_suggestions($search)
	{
		$suggestions = array();
		$this->db->distinct();
		$this->db->select('category');
		$this->db->from('items');
		$this->db->like('category', $search, $this->config->item('speed_up_search_queries') ? 'after' : 'both');
		$this->db->where('deleted', 0);
		$this->db->order_by("category", "asc");
		$by_category = $this->db->get();
		foreach($by_category->result() as $row)
		{
			$suggestions[]=array('label' => $row->category);
		}

		return $suggestions;
	}

	/*
	Preform a search on items
	*/
	
	function search($search ,$cat=' ', $limit=20,$offset=0,$column='name',$orderby='asc')
	{
			if($cat) $cat_id = "and category = $cat "; 
            else $cat_id = '';
		if ($this->config->item('speed_up_search_queries'))
		{
			
			$query = "
			select *
			from (
			         (select *
			         from ".$this->db->dbprefix('items')."
			         where name like '".$this->db->escape_like_str($search)."%' and deleted = 0
			         order by `".$column."`)
					union
			         (select *
			         from ".$this->db->dbprefix('items')."
			         where item_number like '".$this->db->escape_like_str($search)."%' and deleted = 0
			         order by `".$column."`)
					union
			         (select *
			         from ".$this->db->dbprefix('items')."
			         where category like '".$this->db->escape_like_str($search)."%' and deleted = 0
			         order by `".$column."`)
			) as search_results
			order by `".$column."` limit ".$offset.','.$limit;
			return $this->db->query($query);
		}
		else
		{
		$str_search = str_replace( array('_', '@', '#', '$', '%') , ' ', $search );

			$search_terms_array=explode(" ", $this->db->escape_like_str($str_search));
	
			//to keep track of which search term of the array we're looking at now	
			$search_name_criteria_counter=0;
			$sql_search_name_criteria = '';
			//loop through array of search terms
			foreach ($search_terms_array as $x){
	
				$sql_search_name_criteria.=
				($search_name_criteria_counter > 0 ? " AND " : "").
				"name LIKE '%".$this->db->escape_like_str($x)."%'";
				
				$search_name_criteria_counter++;
			}
	
			$this->db->from('items');
			$this->db->where("((".
			$sql_search_name_criteria. ") or 
			item_number LIKE '%".$this->db->escape_like_str($search)."%' or 
			category LIKE '%".$this->db->escape_like_str($search)."%' or 
			location LIKE '%".$this->db->escape_like_str($search)."%') $cat_id and deleted=0");
			$this->db->order_by($column, $orderby);
			$this->db->limit($limit);
			$this->db->offset($offset);
			return $this->db->get();	
		}
	}

	function search_count_all($search,$cat='')
	{		if($cat) $cat_id = "and category = $cat "; 
            else $cat_id = '';
		if ($this->config->item('speed_up_search_queries'))
		{
			$query = "
			select *
			from (
			         (select *
			         from ".$this->db->dbprefix('items')."
			         where name like '".$this->db->escape_like_str($search)."%' and deleted = 0
			         order by `name` )
					union
			         (select *
			         from ".$this->db->dbprefix('items')."
			         where item_number like '".$this->db->escape_like_str($search)."%' and deleted = 0
			         order by `name`)
					union
			         (select *
			         from ".$this->db->dbprefix('items')."
			         where category like '".$this->db->escape_like_str($search)."%' and deleted = 0
			         order by `name` )
			) as search_results
			order by `name`";
			$result=$this->db->query($query);
			return $result->num_rows();
		}
		else
		{
			$this->db->from('items');
			$this->db->where("(name LIKE '%".$this->db->escape_like_str($search)."%' or 
			item_number LIKE '%".$this->db->escape_like_str($search)."%' or 
			category LIKE '%".$this->db->escape_like_str($search)."%' or 
			location LIKE '%".$this->db->escape_like_str($search)."%') $cat_id and deleted=0");
			$this->db->order_by("name", "asc");
			$result=$this->db->get();				
			return $result->num_rows();
		}
	}

	
	function get_categories()
	{
		$this->db->select('category');
		$this->db->from('items');
		$this->db->where('deleted',0);
		$this->db->distinct();
		$this->db->order_by("category", "asc");

		return $this->db->get();
	}

	function cleanup()
	{
		$item_data = array('item_number' => null);
		$this->db->where('deleted', 1);
		return $this->db->update('items',$item_data);
	}
	
	function get_item_category($id_cat,$start_date,$end_date){
		$this->db->select('trans_items');
		$this->db->distinct('trans_items');
		$this->db->where('trans_catid',$id_cat);
		$this->db->where('trans_date >= ',$start_date);
		$this->db->where('trans_date <= ',$end_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else return null;
	}
	function get_item_category_start_number($id_item,$start_date){
		$this->db->select_sum('trans_inventory');
		$this->db->where('trans_items',$id_item);
		$this->db->where('trans_date < ',$start_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->row();
		}
		else return null;
	}
	
	function get_item_category_start_money($id_item,$start_date){
		$this->db->where('trans_items',$id_item);
		$this->db->where('trans_date < ',$start_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else return null;
	}
	function get_item_category_end_number($id_item,$end_date){
		$this->db->select_sum('trans_inventory');
		$this->db->where('trans_items',$id_item);
		$this->db->where('trans_date > ',$end_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->row();
		}
		else return null;
	}
	function get_item_category_end_money($id_item,$end_date){
		$this->db->where('trans_items',$id_item);
		$this->db->where('trans_date > ',$end_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else return null;
	}
	function get_item_category_between_number_nhap($id_item,$start_date,$end_date){
		$this->db->select_sum('trans_inventory');
		$this->db->where('trans_items',$id_item);
		$this->db->where('trans_inventory >=',0);
		$this->db->where('trans_date >= ',$start_date);
		$this->db->where('trans_date <= ',$end_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->row();
		}
		else return null;
	}
	function get_item_category_between_number_xuat($id_item,$start_date,$end_date){
		$this->db->select_sum('trans_inventory');
		$this->db->where('trans_items',$id_item);
		$this->db->where('trans_inventory <',0);
		$this->db->where('trans_date >= ',$start_date);
		$this->db->where('trans_date <= ',$end_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->row();
		}
		else return null;
	}
	function get_item_category_between_money_nhap($id_item,$start_date,$end_date){
		$this->db->where('trans_items',$id_item);
		$this->db->where('trans_inventory >=',0);
		$this->db->where('trans_date >= ',$start_date);
		$this->db->where('trans_date <= ',$end_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else return null;
	}
	function get_item_category_between_money_xuat($id_item,$start_date,$end_date){
		$this->db->where('trans_items',$id_item);
		$this->db->where('trans_inventory <',0);
		$this->db->where('trans_date >= ',$start_date);
		$this->db->where('trans_date <= ',$end_date);
		$query = $this->db->get('inventory');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else return null;
	}
	function get_price_sale_item($sale_id){
		$this->db->select('(item_unit_price * quantity_purchased) as tienno');
		$this->db->where('sale_id',$sale_id);
		$query = $this->db->get('sales_items');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else return null;
	}
	function item_info($id_cat){
		$this->db->where('category',$id_cat);
		$this->db->where('deleted',0);
		$query = $this->db->get('items');
		if($query->num_rows()>0){
			return $query->result_array();
		}
		else return null;
	}
	function update_quantity_price($data)
	{
		$this->db->select('quantity');
		$this->db->update('items',$data); 
	}
}
?>
