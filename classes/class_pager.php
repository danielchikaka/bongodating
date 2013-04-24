<?php  
/** 
    This is the basic class used :
    to incorporate paging for the search results 
**/
    class buildNav // [Class : Controls all Functions for Prev/Next Nav Generation]
    {
        var $limit, $execute, $query;
        function execute($query) // [Function : mySQL Query Execution]
        {
            !isset($_GET[$this->offset]) ? $GLOBALS[$this->offset] = 0 : $GLOBALS[$this->offset] = $_GET[$this->offset];
            $this->sql_result = mysql_query($query);
            $this->total_result = mysql_num_rows($this->sql_result);
            if(isset($this->limit))
            {
                $query .= " LIMIT " . $GLOBALS[$this->offset] . ", $this->limit";
                $this->sql_result = mysql_query($query);
                $this->num_pages = ceil($this->total_result/$this->limit);
            }
        }

        function show_num_pages($frew = '', $rew = '', $ffwd = '', $fwd = '', $separator = '|', $objClass = '') // [Function : Generates Prev/Next Links]
        {
            $current_pg = $GLOBALS[$this->offset]/$this->limit+1;
            if ($current_pg > 5)
            {
                $fgp = $current_pg - 5 > 0 ? $current_pg - 5 : 1;
                $egp = $current_pg+4;
                if ($egp > $this->num_pages)
                {
                    $egp = $this->num_pages;
                    $fgp = $this->num_pages - 9 > 0 ? $this->num_pages  - 9 : 1;
                }
            }
            else {
                $fgp = 1;
                $egp = $this->num_pages >= 10 ? 10 : $this->num_pages;
            }

            if($this->num_pages > 1) {
                // searching for http_get_vars
                foreach ($GLOBALS[_GET] as $_get_name => $_get_value) {
                    if ($_get_name != $this->offset) {
                        $this->_get_vars .= "&$_get_name=$_get_value";
                    }
                }
                $this->successivo = $GLOBALS[$this->offset] + $this->limit;
                $this->precedente = $GLOBALS[$this->offset] - $this->limit;
                $this->theClass = $objClass;
                if (!empty($rew)) {
                    $return .= ($GLOBALS[$this->offset] > 0) ? "[<a href=\"$GLOBALS[PHP_SELF]?$this->offset=0$this->_get_vars\" $this->theClass>$frew</a>] <a href=\"$GLOBALS[PHP_SELF]?$this->offset=$this->precedente$this->_get_vars\" $this->theClass>$rew</a> $separator " : "[$frew] $rew $separator ";
                }

                // showing pages
                if ($this->show_pages_number || !isset($this->show_pages_number))
                {
                    for($this->a = $fgp; $this->a <= $egp; $this->a++)
                    {
                        $this->theNext = ($this->a-1)*$this->limit;
                        $_ss_k = floor($this->theNext/26);
                        if ($this->theNext != $GLOBALS[$this->offset])
                        {
                            $return .= " <a href=\"$GLOBALS[PHP_SELF]?$this->offset=$this->theNext$this->_get_vars\" $this->theClass><b class='tdb'> ";
                            if ($this->number_type == 'alpha')
                            {
                                 if($_ss_k>0)
                                 {
                                    $theLink = chr(64 + ($_ss_k));
                                    for($b = 0; $b < $_ss_k; $b++)
                                    {
                                       $theLink .= chr(64 + ($this->theNext%26)+1);
                                    }
                                    $return .= $theLink;
                                 } else {
                                 $return .= chr(64 + ($this->a));
                                 }
                            } else {
                                $return .= $this->a;
                            }
                            $return .= " </b></a> ";
                        } else {
                            if ($this->number_type == 'alpha')
                            {
                                 if($_ss_k>0)
                                 {
                                    $theLink = chr(64 + ($_ss_k));
                                    for($b = 0; $b < $_ss_k; $b++)
                                    {
                                       $theLink .= chr(64 + ($this->theNext%26)+1);
                                    }
                                    $return .= $theLink;
                                 } else {
                                 $return .= chr(64 + ($this->a));
                                 }
                            } else {
                                $return .= "<b class='tdrb'> ".$this->a." </b>";
                            }
                            $return .= ($this->a < $this->num_pages) ? " $separator " : " ";
                        }
                    }
                    $this->theNext = $GLOBALS[$this->offset] + $this->limit;
                    if (!empty($fwd)) {
                        $offset_end = ($this->num_pages-1)*$this->limit;
                        $return .= ($GLOBALS[$this->offset] + $this->limit < $this->total_result) ? "$separator <a href=\"$GLOBALS[PHP_SELF]?$this->offset=$this->successivo$this->_get_vars\" $this->theClass>$fwd</a> [<a href=\"$GLOBALS[PHP_SELF]?$this->offset=$offset_end$this->_get_vars\" $this->theClass>$ffwd</a>]" : "$separator $fwd [$ffwd]";
                    }
                }
            }
            return $return;
        }

        function show_info() // [Function : Showing the Information for the Offset]
        {
           if($GLOBALS[$this->offset] >= $this->total_result || $GLOBALS[$this->offset] < 0) return false;
            $return .=  "[ Total Results -> " . $this->total_result . " ]";
            $_from = $GLOBALS[$this->offset] + 1;
            $GLOBALS[$this->offset] + $this->limit >= $this->total_result ? $_to = $this->total_result : $_to = $GLOBALS[$this->offset] + $this->limit;
            $return .= "&nbsp;&nbsp;[ Showing Results from " . $_from . " to " . $_to . " ]<br>";
            return $return;
        }
    }

   class Pager  
   {  
       function getPagerData($numHits, $limit, $page)  
       {  
           $numHits  = (int) $numHits;  
           $limit    = max((int) $limit, 1);  
           $page     = (int) $page;  
           $numPages = ceil($numHits / $limit);  

           $page = max($page, 1);  
           $page = min($page, $numPages);  

           $offset = ($page - 1) * $limit;  

           $ret = new stdClass;  

           $ret->offset   = $offset;  
           $ret->limit    = $limit;  
           $ret->numPages = $numPages;  
           $ret->page     = $page;  

           return $ret;  
       }  
   }  
?>