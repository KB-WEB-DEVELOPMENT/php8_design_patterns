<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Prototype;

class TextareaHtmlElementPrototype extends HtmlElementPrototype
{
	
	public function __construct(
        public string $elementId,
        public string $elementName, 
		public array $elementConfig,
	) {}

	public function __clone();

	public function getElementId(): string
	{
		return $this->elementId;
	}

	public function getElementName(): string
	{
		return $this->elementName;
	}
	
	public function getElementHtmlCode(): string
	{
		  
		  if (isset($this->elementConfig)) {
			  
			   $autofocus = $this->elementConfig["autofocus "]  == true ? "autofocus" : null;
			   $cols = (is_int($this->elementConfig["cols"]) && $this->$elementConfig["cols"] > 0) ? $this->elementConfig["cols"] : 50; 
			   $dirname = (strlen($this->elementConfig["dirname"]) > 4 && str_contains($this->elementConfig["dirname"],'.dir'))  ? $this->elementConfig["dirname"] : null;
			   $disabled = $this->elementConfig["disabled"] == true ? "disabled" : null;
			   $maxlength = (is_int($this->elementConfig["maxlength"]) && $this->elementConfig["maxlength"] > 0) ? $this->elementConfig["maxlength"] : null;
			   $placeholder = is_string($this->elementConfig["placeholder"]) ? $this->elementConfig["placeholder"] : "";
			   $readonly = $this->elementConfig["readonly"] == true ? "readonly" : null;
			   $required = $this->elementConfig["required"] == true ? "required" : null;
			   $rows = (is_int($this->elementConfig["rows"]) && $this->elementConfig["rows"] > 0) ? $this->elementConfig["rows"] : 50;			  
			   $wrap = in_array($this->elementConfig["wrap"],array("soft","hard")) ? $this->elementConfig["wrap"] : null; 
		  
		      $htmlCode = '<textarea id="' . $this->elementId . '" name="' . $this->elementName . '" ';
		      $htmlCode .= '&nbsp;'.$autofocus;
              $htmlCode .= '&nbsp;'.$disabled;
			  $htmlCode .= '&nbsp;'.$readonly;
			  $htmlCode .= '&nbsp;'.$required;			  
			  $htmlCode .= '&nbsp;rows="' . $rows . '"';
			  $htmlCode .= '&nbsp;cols="' . $cols . '"';
			  
			  $htmlCode  .= !empty($wrap) ? '&nbsp;wrap="' . $wrap .  '"'  : null;   
			  $htmlCode  .= !empty($placeholder) ? '&nbsp;placeholder="' . $placeholder .  '"'  : null;
			  $htmlCode  .= !empty($maxlength) ? '&nbsp;maxlength="' . $maxlength .  '"'  : null;
			  $htmlCode  .= !empty($dirname) ? '&nbsp;dirname="' . $dirname .  '"'  : null;
			  
			  $htmlCode .= '>YOUR CONTENT HERE</textarea>';
			  
			  return $htmlCode; 
			  
		  } else {
			  
			 $htmlCode = '<textarea id="' . $this->elementId . '" name="' . $this->elementName . '" rows="50" cols="50">YOUR CONTENT HERE</textarea>'; 	  
  
			 return $htmlCode; 
		  }		
	}
}
