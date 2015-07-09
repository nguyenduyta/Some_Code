<?php

/**
 * Created by PhpStorm.
 * User: Ta
 * Date: 6/24/14
 * Time: 4:37 PM
 */
class pagination
{
    protected $_limit;
    protected $_totalRecord;
    protected $_start;
    protected $_totalPage;
    protected $_currentPage;
    protected $_link;

    function __construct($_currentPage, $_limit, $_start, $_totalRecord, $link)
    {
        $this->_currentPage = $_currentPage;
        $this->_limit = $_limit;
        $this->_start = $_start;
        $this->_totalPage = ceil($_totalRecord / $_limit);
        $this->_totalRecord = $_totalRecord;
        if ($this->_totalPage > 1) {
            if ($this->_currentPage > 1) {
                $prev = $this->_currentPage - 1;
                $this->_link .= "<a href='$link&page=$prev' class='page'>Prev</a>";
            }
            for ($i = 1; $i <= $this->_totalPage; $i++) {
                if ($i == $this->_currentPage) {
                    $this->_link .= "<a href='$link&page=$i' class='page current'>$i</a>";
                } else {
                    $this->_link .= "<a href='$link&page=$i' class='page'>$i</a>";
                }
            }
            if ($this->_currentPage < $this->_totalPage) {
                $next = $this->_currentPage + 1;
                $this->_link .= "<a href='$link&page=$next' class='page'>Next</a>";
            }
        }
    }

    public function getLink()
    {
        return $this->_link;
    }
}
