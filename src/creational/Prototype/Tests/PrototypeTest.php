<?php
declare(strict_types=1);

namespace php8_design_patterns\Creational\Prototype\Tests;

use php8_design_patterns\Creational\Prototype\TextareaHtmlElementPrototype;
use php8_design_patterns\Creational\Prototype\SelectHtmlElementPrototype;

use PHPUnit\Framework\TestCase;

class PrototypeTest extends TestCase
{
	
	public function testcanCreatePrototypes():void
	{
		$prototype1 = new TextareaHtmlElementPrototype(elementId:"elemtId1",elementName:"contactForm");
		$prototype2 = new SelectHtmlElementPrototype(elementId:"elemtId2",elementName:"registerForm");
		
		$this->assertInstanceOf(TextareaHtmlElementPrototype::class,$prototype1);
		$this->assertInstanceOf(SelectHtmlElementPrototype::class,$prototype2);		
	}

	public function testcanClonePrototypes():void
	{
		$prototype1 = new TextareaHtmlElementPrototype(elementId:"elemtId1",elementName:"contactForm");
		
		$cloned1 = cloned $prototype1; 
		
		$prototype2 = new SelectHtmlElementPrototype(elementId:"elemtId2",elementName:"registerForm");
		
		$cloned2 = cloned $prototype2;
		
		$this->assertInstanceOf(TextareaHtmlElementPrototype::class,$cloned1);
		$this->assertInstanceOf(SelectHtmlElementPrototype::class,$cloned2);		
	}
	
	public function testcanCustomizePrototypes():void
	{
	
		$elementConfig1 = [
			"autofocus" => true,
			"cols" => 400,
			"dirname" => "dir.test",
			"disabled" => false,
			"maxlength" => 350,
			"placeholder" => "enter something ...",
			"readonly" => false,
			"required" => true,
			"rows" => 460,
			"wrap" => "soft",		
		];
								 
		$prototype1 = new TextareaHtmlElementPrototype(elementId:"elemtId1",elementName:"contactForm",elementConfig:$elementConfig1);
		
		$htmlCode1 = $prototype1->getElementHtmlCode();
		
		$expCode1 = '<textarea id="elemtId1" name="contactForm" autofocus required rows="460" cols="400" wrap="soft" placeholder="enter something ..." maxlength="350" dirname="dir.test"></textarea>';
		
		$elementConfig2 = [
			"autofocus" => true,
			"disabled" => false,
                        "mutipled" => true,
			"required" => true,
			"size" => 450,
                        "valueName-value"  => [ 
			        "1000" => "Audi",
				"2000" => "BMW",
				"3000" => "Mercedes",
		         ]	  
		 ];
				
		$prototype2 = new SelectHtmlElementPrototype(elementId:"elemtId2",elementName:"GuestForm",elementConfig:$elementConfig2);
		
		$htmlCode2 = $prototype2->getElementHtmlCode();
		
		$expCode2 = '<select name="GuestForm" id="elemtId2" autofocus mutiple required size="450"><option value="1000">Audi</option><option value="2000">BMW</option><option value="3000">Mercedes</option></select>"';
		
		$this->assertSame($expCode1,$htmlCode1);
		$this->assertSame($expCode2,$htmlCode2);		
	}
}
