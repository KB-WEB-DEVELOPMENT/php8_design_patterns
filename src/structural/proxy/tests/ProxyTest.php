<?php

declare(strict_types=1);

namespace php8_design_patterns\Structural\Proxy\Tests;

use php8_design_patterns\Structural\Proxy\FilesReader;
use php8_design_patterns\Structural\Proxy\CachedFilesReader;

use PHPUnit\Framework\TestCase;

class ProxyTest extends TestCase
{
	
	public function testIsFileLocal():void
	{
		
		$fr = new FilesReader(filename:'/test/ProxyTest.php');

		$isLocal = $fr->isLocalFile();
		
		$this->assertTrue($isLocal);
				
    }
	
	public function testIsReadableFile():void
	{
		$fr = new FilesReader(filename:'/test/ProxyTest.php');
	
		$isReadable = $fr->isReadable();
	
		$this->assertTrue($isReadable);
	}
	
	public function testCanGetFileInfos():void
	{
		$fr = new FilesReader(filename:'/www/htdocs/inc/lib.inc.php');
		
		$fileInfosArray = $fr->getFileInfos();
		
		$exp = [ 
			'dirname' => '/www/htdocs/inc',
			'basename' => 'lib.inc.php',
			'extension' => 'php',
			'filename' => 'lib.inc',
			'filesize' => 80
		]; 
			
		$this->assertSame($exp,$fileInfosArray);	
	
	}
	
	public function testCanCopyRemoteFile():void
	{
		
		$fr = new FilesReader(filename:'https://github.com/KB-WEB-DEVELOPMENT/travelpayouts-api-cheapest-tickets-finder/blob/master/results.php');
	
		// file results.php from above url copied to current directory 
		$res = $fr->copyRemoteFile();
		
		$this->assertTrue($res);
	
	}
	
	public function testCanGetLocalFileInfos():void
	{
		$cf = new CachedFilesReader(filename:'file2.php',filesReader:new FilesReader('file2.php'));
		
		$fileInfosArray = $cf->getFilesInfos();
		
		$exp = [ 
			'dirname' => 'directory path from root server to file2.php',
			'basename' => 'file2.php',
			'extension' => 'php',
			'filename' => 'file2',
			'filesize' => 10
		];		
	
		$this->assertSame($exp,$fileInfosArray);
	
	}
	
	public function testCanGetRemoteFileInfos():void
	{
	
		$cf = new CachedFilesReader(filename:'https://github.com/KB-WEB-DEVELOPMENT/travelpayouts-api-cheapest-tickets-finder/blob/master/results.php',filesReader:new FilesReader('https://github.com/KB-WEB-DEVELOPMENT/travelpayouts-api-cheapest-tickets-finder/blob/master/results.php'));
		
		$fileInfosArray = $cf->getFilesInfos();
		
		$exp = [ 
			'dirname' => 'directory path from root server to results.php',
			'basename' => 'results.php',
			'extension' => 'php',
			'filename' => 'results',
			'filesize' => 567
		];	
	
	        $this->assertSame($exp,$fileInfosArray);
	
	}	
	
}	
