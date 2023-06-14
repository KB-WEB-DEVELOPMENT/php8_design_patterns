 <?php
declare(strict_types=1);

namespace php8_design_patterns\Structural\Composite\Tests;

use php8_design_patterns\Structural\Composite\Form;
use php8_design_patterns\Structural\Composite\LabelInputElement;
use php8_design_patterns\Structural\Composite\TextInputElement;
use php8_design_patterns\Structural\Composite\DateInputElement;

use PHPUnit\Framework\TestCase;

class CompositeTest extends TestCase
{
	public function testFormRendering():void
    {
		
		$form = new Form();
		
		$configLabelElement = ["for" => "formId5", "form" => "contactForm", "content" => "Contact infos:"];
		
		$form->addElement(element:new LabelInputElement(elementConfig: $configLabelElement));
				
		$configTextElement = ["id" => "css-x-9", "name" => "username", "value" => "Name"];
		
		$form->addElement(element:new TextInputElement(elementConfig: $configTextElement));
		
		$configDateElement = ["id" => "css-x-12", "name" => "DOB" ];

		$form->addElement(element:new DateInputElement(elementConfig: $configDateElement));

		$exp_form  = '<form><label for="formId5" form="contactForm">';
		$exp_form .= 'Contact infos:</label>';
		$exp_form .= '<input type="text" id="css-x-9" name="username" value="Name">';
		$exp_form .= '<input type="date" id="css-x-12" name="DOB">';
		$exp_form .= '<input type="submit" value="submit">';
		$exp_form .= '</form>';

		$this->assertSame($exp_form,$form->render());
	}
}
