<?php

declare(strict_types=1);

namespace php8_design_patterns\Creational\Prototype;

class SelectHtmlElementPrototype extends HtmlElementPrototype
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
			  	  			  
			  $autofocus = $this->elementConfig["autofocus"]  == true ? "autofocus" : null;	
			  $disabled =  $this->elementConfig["disabled"]  == true ? "disabled" : null;	 	 	
			  $multiple =  $this->elementConfig["multiple"]  == true ? "mutiple" : null;	 		  	
              $required = $this->elementConfig["required"]  == true ? "required" : null;	 
              $size = (is_int($this->elementConfig["size"]) && $this->elementConfig["rows"] > 0) ? $this->elementConfig["size"] : 50;
			  
			  $htmlCode = '<select name="' . $this->elementName . '" id="' . $this->elementId . '"';
			  
			  $htmlCode .= '&nbsp;'.$autofocus;
              $htmlCode .= '&nbsp;'.$disabled;
			  $htmlCode .= '&nbsp;'.$mutiple;
			  $htmlCode .= '&nbsp;'.$required;			  
			  $htmlCode .= '&nbsp;size="' . $size . '">';
			  			  
			  foreach($this->elementConfig["valueName-value"] as $k => $v)  {

				$htmlCode .= '<option value="' . $k . '">' . $v . '</option';

			  }		
			  
			  $htmlCode .= '</select>';
			  
			  return $htmlCode; 
			  
		  } else {
			  
			 $htmlCode = '<select name="' . $this->elementName . '" id="' . $this->elementId . '">';
             $htmlCode .= '<option value="valueName1">Value1</option>';
			 $htmlCode .= '<option value="valueName2">Value2</option>';
			 $htmlCode .= '<option value="valueName3">Value3</option>';
             $htmlCode .= '</select>';
  
			 return $htmlCode; 
		  }			
	}

}
