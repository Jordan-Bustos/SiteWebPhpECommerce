<?php
	class FormManager
	{

		public static function beginForm($method, $action, $extraOptions="")
		{
			if ($extraOptions == null) $extraOptions = "";
			echo "\n";
			echo '<form method="'.$method.'" action="'.$action.'" accept-charset="UTF-8"
			'.$extraOptions.'>';
			echo "\n";
		}

		public static function endForm()
		{
			echo "</form>\n";
		}

		public static function addInput($labelText, $type, $name, $id, $value=null, $extraOptions="",
		$labelValue="")
		{
			if ($extraOptions == null) $extraOptions = "";
			$valueInput = ($value == null) ? '' : ' value="'.$value.'"';
			if ($type != "hidden") echo "<p>\n";
			if ($labelText != null && $labelText != "")
			{
				echo '<label for="'.$id.'">'.$labelText.' : </label>';
			}
			echo '<input type="'.$type.'" name="'.$name.'" id="'.$id.'"'.$valueInput.' '.$extraOptions.' />';
			echo $labelValue;
			if ($type != "hidden") echo "</p>\n";
		}

		public static function addTextInput($labelText, $name, $id, $value=NULL, $extraOptions="",
		$labelValue="")
		{
			self::addInput($labelText, "text", $name, $id, $value, $extraOptions, $labelValue);
		}
		
		public static function addPasswordInput($labelText, $name, $id, $value=NULL, $extraOptions="",
		$labelValue="")
		{
			self::addInput($labelText, "password", $name, $id, $value, $extraOptions, $labelValue);
		}

		public static function addDateInput($labelText, $name, $id, $value=NULL, $extraOptions="",
		$labelValue="")
		{
			self::addInput($labelText, "date", $name, $id, $value, $extraOptions, $labelValue);
		}

		public static function addFileInput($labelText, $name, $id, $extraOptions="", $labelValue="")
		{
			self::addInput($labelText, "file", $name, $id, NULL, $extraOptions, $labelValue);
		}

		public static function addHiddenInput($name, $id, $value=NULL)
		{
			self::addInput("", "hidden", $name, $id, $value);
		}

		public static function addSubmit($name, $id, $value=NULL, $extraOptions="")
		{
			self::addInput("", "submit", $name, $id, $value, $extraOptions);
		}

		public static function addTextarea($labelText, $name, $id, $value=NULL, $extraOptions="",
		$labelValue="")
		{
		
		}

		public static function addRadioInput($labelText, $name, $id, array $value, array $labelValue,
		$extraOptions="", $nbDefault=NULL)
		{
			
		}
	}
?>