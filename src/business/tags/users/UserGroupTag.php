<?php

class UserGroupTag extends Tag
{
	function __call($method, $args)
	{
		return $this->name($method);
	}

	public function __toString()
	{
		return $this->name();
	}

	public function name()
	{
		return $this->_val->name;
	}

	public function description()
	{
		return $this->_val->description;
	}

	public function users()
	{
		$groups = Blocks::app()->membership->getUsersByGroupId($this->_val->id);
		return new UsersTag($groups);
	}
}
