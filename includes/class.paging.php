<?
class do_paging{
	var $cl_res_per_page = "";
	var $cl_sql = "";
	var $cl_sql_nolimit = "";
	var $cl_page_number = "";
	var $cl_tot_pages = "";
	var $cl_limit = "";
	var $cl_result_page = "";
	var $cl_result_nopage = "";
	var $cl_disp_paging = "";
	function setpage( $fn_sql, $fn_res_per_page, $fn_page_number )
	{
		$this->cl_sql = $fn_sql;
		$this->cl_sql_nolimit = $fn_sql;		
		$this->cl_res_per_page = $fn_res_per_page;
		$this->cl_page_number = $fn_page_number;
	}
	function getpage()
	{

				$this->fn_end_paging = $this->cl_res_per_page;
				
				if($this->cl_page_number == 1 or $this->cl_page_number == '') {$this->fn_start_paging = 0;$this->fn_page_number_disp = '1';}else {$this->fn_start_paging = $this->cl_res_per_page * ($this->cl_page_number - 1) ; $this->fn_page_number_disp = $this->cl_page_number;}
				
				$this->imp_paging = " LIMIT $this->fn_start_paging,$this->fn_end_paging";
				
				$this->cl_sql .= $this->imp_paging;
				//echo $this->cl_sql;
				$this->result_perform_paging = mysql_query($this->cl_sql) or die(mysql_error());
				//if($this->result_perform_paging)
					
				$this->result_perform_nopaging = mysql_query($this->cl_sql_nolimit) or die(mysql_error());
				if($this->result_perform_nopaging)	{
						if(mysql_num_rows($this->result_perform_nopaging)>0)		{
								$this->fn_num_pages = ceil(mysql_num_rows($this->result_perform_nopaging) / $this->cl_res_per_page);
								$this->display_paging = "Page ( $this->fn_page_number_disp ) of $this->fn_num_pages";
							}
					}

								
				$this->cl_tot_pages = $this->fn_num_pages;
				$this->cl_disp_paging = $this->display_paging;
				//$this->cl_limit = $this->imp_paging;
				$this->cl_result_page = $this->result_perform_paging;
				//return $this->display_paging;
				return $this->cl_result_page;
	}
	function getdisp_page()
		{
				return $this->cl_disp_paging;
		}
	function getnum_pages()
		{
				return $this->cl_tot_pages;
		}
}
?>